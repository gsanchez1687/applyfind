<?php

class RegistrationController extends Controller
{
	public $defaultAction = 'registration';
	
	/**
	 * Declares class-based actions.
	 */
	public function actions()
	{
		return array(
			'captcha'=>Yii::app()->getModule('user')->captchaParams,
		);
	}
	/**
	 * Registration user
	 */
	public function actionRegistration() {
        Profile::$regMode = true;
        $model = new RegistrationForm;
        $profile=new Profile;

        // ajax validator
        if(isset($_POST['ajax']) && $_POST['ajax']==='registration-form')
        {
            echo UActiveForm::validate(array($model,$profile));
            Yii::app()->end();
        }

            if(isset($_POST['RegistrationForm'])) {
                $model->attributes=$_POST['RegistrationForm'];
                $profile->attributes=((isset($_POST['Profile'])?$_POST['Profile']:array()));
                if($model->validate()&&$profile->validate())
                {
                    $soucePassword = $model->password;
                    $model->activkey=UserModule::encrypting(microtime().$model->password);
                    $model->password=UserModule::encrypting($model->password);
                    $model->verifyPassword=UserModule::encrypting($model->verifyPassword);
                    $model->superuser=0;
                    $model->status=((Yii::app()->controller->module->activeAfterRegister)?User::STATUS_ACTIVE:User::STATUS_NOACTIVE);

                    if ($model->save()) {
                        
                        $mailer = Yii::createComponent('application.extensions.mailer.phpmailer', true);
                        $mailer->AddAddress('gsanchez@thefactoryhka.com');
                        $mailer->From = 'noreply@thefactoryhka.com';
                        $mailer->FromName = 'The Factory HKA Colombia'; // Nombre del que envia
                        $mailer->WordWrap = 50; // Largo de las lineas
                        $mailer->IsHTML(true); // Podemos incluir tags html
                        $mailer->Subject = "[Extranet-Colombia] Registro de Nuevo Usuario";
                        $mailer->Body = '<div style="text-align: left;  padding: 30px;">
                                        <div style="font-size: 25px; font-weight: bold; margin-bottom: 30px;">Registrant information</div>
                                        <div style="background-color: #f6f6f6; text-align: left; padding: 30px;line-height: 35px;">
                                        <b style="width: 180px;">NOMBRE </b>: <span style="text-transform: capitalize;">' . $model->username . '</span> <br/>
                                        <b style="width: 180px;">NUMERO DE TELEFONO </b> : ' . $model->phone . '<br/>
                                        <b style="width: 180px;">DIRECCION </b>:<span style="text-transform: capitalize;"> ' . $model->address . '</span><br/>
                                        <b style="width: 180px;">CORREO </b>: ' . $model->email . '<br/>
                                        </div>
                                        <div style="font-size: 18px; font-weight: bold;">NO RESPONDER A ESTE CORREO.</div>
                                        </div>
                                        </div>';
                        $mailer->IsSMTP(); // vamos a conectarnos a un servidor SMTP
                        $mailer->SMTPAuth = true; // usaremos autenticacion
                        $mailer->Username = "noreply@thefactoryhka.com"; // usuario
                        $mailer->Password = ".noreply.tfhka"; // contraseña
                        $mailer->Mailer = "smtp";
                        $mailer->Host = "ssl://mail.thefactoryhka.com";
                        $mailer->Port = 465;
                        $mailer->SMTPAuth = true;        
                        
                        $profile->user_id=$model->id;
                        $profile->save();
                        
                        if (Yii::app()->controller->module->sendActivationMail) {
                            $activation_url = $this->createAbsoluteUrl('/user/activation/activation',array("activkey" => $model->activkey, "email" => $model->email));
                            UserModule::sendMail($model->email,UserModule::t("You registered from {site_name}",array('{site_name}'=>Yii::app()->name)),UserModule::t("Please activate you account go to {activation_url}",array('{activation_url}'=>$activation_url)));
                        }
                        

                        if ((Yii::app()->controller->module->loginNotActiv||(Yii::app()->controller->module->activeAfterRegister&&Yii::app()->controller->module->sendActivationMail==false))&&Yii::app()->controller->module->autoLogin) {
                                $identity=new UserIdentity($model->username,$soucePassword);
                                $identity->authenticate();
                                Yii::app()->user->login($identity,0);
                                $this->redirect(Yii::app()->controller->module->returnUrl);
                        } else {
                            if (!Yii::app()->controller->module->activeAfterRegister&&!Yii::app()->controller->module->sendActivationMail) {
                                Yii::app()->user->setFlash('registration',UserModule::t("Gracias por su inscripción. Póngase en contacto con administrador para activar su cuenta."));
                            } elseif(Yii::app()->controller->module->activeAfterRegister&&Yii::app()->controller->module->sendActivationMail==false) {
                                Yii::app()->user->setFlash('registration',UserModule::t("Thank you for your registration. Please {{login}}.",array('{{login}}'=>CHtml::link(UserModule::t('Login'),Yii::app()->controller->module->loginUrl))));
                            } elseif(Yii::app()->controller->module->loginNotActiv) {
                                Yii::app()->user->setFlash('registration',UserModule::t("Thank you for your registration. Please check your email or login."));
                            } else {
                                Yii::app()->user->setFlash('registration',UserModule::t("Thank you for your registration. Please check your email."));
                            }
                            $this->refresh();
                        }
                    }
                } else $profile->validate();
            }
            $this->render('/user/registration',array('model'=>$model,'profile'=>$profile));
       
	}
}