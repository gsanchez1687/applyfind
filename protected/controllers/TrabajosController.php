<?php

class TrabajosController extends Controller
{
	/**
	 * @var string the default layout for the views. Defaults to '//layouts/column2', meaning
	 * using two-column layout. See 'protected/views/layouts/column2.php'.
	 */
	public $layout='//layouts/column2';

	/**
	 * @return array action filters
	 */
	public function filters()
	{
		return array(
			'accessControl', // perform access control for CRUD operations
			//'postOnly + delete', // we only allow deletion via POST request
		);
	}

	/**
	 * Specifies the access control rules.
	 * This method is used by the 'accessControl' filter.
	 * @return array access control rules
	 */
	public function accessRules()
	{
		return array(
			array('allow',  // allow all users to perform 'index' and 'view' actions
				'actions'=>array('index','view','updateActive'),
				'users'=>array('*'),
			),
			array('allow', // allow authenticated user to perform 'create' and 'update' actions
				'actions'=>array('create','update'),
				'users'=>array('@'),
			),
			array('allow', // allow admin user to perform 'admin' and 'delete' actions
				'actions'=>array('admin','delete'),
				'users'=>array('@'),
			),
			array('deny',  // deny all users
				'users'=>array('*'),
			),
		);
	}

	/**
	 * Displays a particular model.
	 * @param integer $id the ID of the model to be displayed
	 */
	public function actionView($id)
	{
               $Postulates = new Postulates(); 
               
                if (isset($_POST['Postulates'])) {                 
                        $Postulates->attributes=$_POST['Postulates'];  
                
                        $file = CUploadedFile::getInstance($Postulates, "file");                          
                        $extension = end(explode(".", $file->name));                    
                        $name = $Postulates->nombre;
                        $name = str_replace("_", " ", $name);
                        $file->saveAs(Yii::getPathOfAlias("webroot") . "/uploads/" . $name . "." . $extension);
                           
                        $Postulates->nombre = CHtml::encode($_POST['Postulates']['nombre']);
                        $Postulates->apellido = CHtml::encode($_POST['Postulates']['apellido']);
                        $Postulates->telefono_personal = CHtml::encode($_POST['Postulates']['telefono_personal']);
                        $Postulates->email = CHtml::encode($_POST['Postulates']['email']);        
                        $Postulates->file = $name . "." . $extension;
                        $Postulates->date = date("Y-m-d H:i:s"); 
                      
                  
                        if($Postulates->save()){
                                Yii::app()->user->setFlash('contact','Su postulacion fue enviada con exito');
                                $Trabajopostulante = new TrabajoPostulantes();
                                
                                $id_real = Trabajos::model()->findByAttributes(array('slug'=>$id));                               
                                $Trabajopostulante->postulante_id = $Postulates->id;
                                $Trabajopostulante->trabajo_id = $id_real['id'];
                                $Trabajopostulante->save();
                                
                        }                
                    
                }/*fin de trabajo*/
               
                
		$this->render('view',array(
			'model'=>$this->loadModelSlug($id),
                        'postulante'=>$Postulates,
		));
	}

	/**
	 * Creates a new model.
	 * If creation is successful, the browser will be redirected to the 'view' page.
	 */
	public function actionCreate()
	{
		$model=new Trabajos;

		// Uncomment the following line if AJAX validation is needed
		// $this->performAjaxValidation($model);

		if(isset($_POST['Trabajos']))
		{
			$model->attributes=$_POST['Trabajos'];    
                        
                        $model->fecha_contratacion = date("Y-m-d");
			if($model->save())
				$this->redirect(array("trabajos/admin"));
		}

		$this->render('create',array(
			'model'=>$model,
		));
	}

	/**
	 * Updates a particular model.
	 * If update is successful, the browser will be redirected to the 'view' page.
	 * @param integer $id the ID of the model to be updated
	 */
	public function actionUpdate($id)
	{
		$model=$this->loadModel($id);

		// Uncomment the following line if AJAX validation is needed
		// $this->performAjaxValidation($model);

		if(isset($_POST['Trabajos']))
		{
			$model->attributes=$_POST['Trabajos'];       
                        $model->fecha_contratacion = date("Y-m-d");
			if($model->save())
				$this->redirect(array("trabajos/admin"));
		}

		$this->render('update',array(
			'model'=>$model,
		));
	}

	/**
	 * Deletes a particular model.
	 * If deletion is successful, the browser will be redirected to the 'admin' page.
	 * @param integer $id the ID of the model to be deleted
	 */
	public function actionDelete($id)
	{
		$this->loadModel($id)->delete();

		// if AJAX request (triggered by deletion via admin grid view), we should not redirect the browser
		if(!isset($_GET['ajax']))
			$this->redirect(isset($_POST['returnUrl']) ? $_POST['returnUrl'] : array('admin'));
	}

	/**
	 * Lists all models.
	 */
	public function actionIndex()
	{
		$model=new Trabajos('search');               
                
                $model->unsetAttributes(); 
                
                if(isset($_GET['Trabajos']))
                    $model->attributes=$_GET['Trabajos'];
                
                $this->render('index',array('dataProvider'=>$model->search2(),'model'=>$model)); 
	}

	/**
	 * Manages all models.
	 */
	public function actionAdmin()
	{
		$model=new Trabajos('search');
		$model->unsetAttributes();  // clear any default values
		if(isset($_GET['Trabajos']))
			$model->attributes=$_GET['Trabajos'];

		$this->render('admin',array(
			'model'=>$model,
		));
	}

	/**
	 * Returns the data model based on the primary key given in the GET variable.
	 * If the data model is not found, an HTTP exception will be raised.
	 * @param integer $id the ID of the model to be loaded
	 * @return Trabajos the loaded model
	 * @throws CHttpException
	 */
	public function loadModel($id)
	{
		$model=Trabajos::model()->findByPk($id);
		if($model===null)
			throw new CHttpException(404,'The requested page does not exist.');
		return $model;
	}
        
        public function loadModelSlug($slug)
            {
                $model = Trabajos::model()->findByAttributes(array('slug'=>$slug));
                if($model===null)
                    throw new CHttpException(404,'The requested page does not exist.');
                return $model;
            }


	/**
	 * Performs the AJAX validation.
	 * @param Trabajos $model the model to be validated
	 */
	protected function performAjaxValidation($model)
	{
		if(isset($_POST['ajax']) && $_POST['ajax']==='trabajos-form')
		{
			echo CActiveForm::validate($model);
			Yii::app()->end();
		}
	}
        
        public function actionUpdateActive($it = NULL, $s = NULL) {
       
        $model = $this->loadModel($it);
        if ($s == 1) {
            $model->activo = 1;          
        } elseif ($s == 0) {
            $model->activo = 0;           
        }
        if ($model->validate()) {
           $model->save();
        }
    }
}
