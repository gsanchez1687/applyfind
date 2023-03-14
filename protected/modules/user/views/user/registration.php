<?php $this->pageTitle=Yii::app()->name . ' - '.UserModule::t("Registration");
$this->breadcrumbs=array(
	UserModule::t("Registro"),
);
?>

<h1 class="robotothin text-primary"><?php echo UserModule::t("Registro"); ?></h1>

<?php if(Yii::app()->user->hasFlash('registration')): ?>
<div class="success">
<?php echo Yii::app()->user->getFlash('registration'); ?>
</div>
<?php else: ?>

<div class="form card card-register">
<?php $form=$this->beginWidget('UActiveForm', array(
	'id'=>'registration-form',
	'enableAjaxValidation'=>true,
	'disableAjaxValidationAttributes'=>array('RegistrationForm_verifyCode'),
	'clientOptions'=>array(
		'validateOnSubmit'=>true,
	),
	'htmlOptions' => array('enctype'=>'multipart/form-data'),
)); ?>

	<p class="note"><?php echo UserModule::t('Fields with <span class="required">*</span> are required.'); ?></p>
	
	<?php echo $form->errorSummary(array($model,$profile)); ?>
        <div class="row">
            <div class="col-md-6">
                        <div class="row">
                <?php echo $form->labelEx($model,'username'); ?>
                <?php echo $form->textField($model,'username',array('class'=>'form-control')); ?>
                <?php echo $form->error($model,'username'); ?>
                </div>

                <div class="row">
                <?php echo $form->labelEx($model,'password'); ?>
                <?php echo $form->passwordField($model,'password',array('class'=>'form-control')); ?>
                <?php echo $form->error($model,'password'); ?>
                <p class="hint">
                <?php echo UserModule::t("Longitud mínima de la contraseña 4 carácteres."); ?>
                </p>
                </div>

                <div class="row">
                <?php echo $form->labelEx($model,'verifyPassword'); ?>
                <?php echo $form->passwordField($model,'verifyPassword',array('class'=>'form-control')); ?>
                <?php echo $form->error($model,'verifyPassword'); ?>
                </div>

                <div class="row">
                <?php echo $form->labelEx($model,'email'); ?>
                <?php echo $form->textField($model,'email',array('class'=>'form-control')); ?>
                <?php echo $form->error($model,'email'); ?>
                </div>
                <div class="row">
                <?php echo $form->labelEx($model,'phone'); ?>
                <?php echo $form->textField($model,'phone',array('class'=>'form-control')); ?>
                <?php echo $form->error($model,'phone'); ?>
                </div>
                
                <div class="row">
                <?php echo $form->labelEx($model,'dirección'); ?>
                <?php echo $form->textField($model,'address',array('class'=>'form-control')); ?>
                <?php echo $form->error($model,'address'); ?>
                </div>

                 <?php 
                       $profileFields=Profile::getFields();
                       
                        if ($profileFields) {
                           foreach($profileFields as $field) {
                                ?>
                                <div class="row">
                                        <?php echo $form->labelEx($profile,$field->varname); ?>
                                        <?php 
                                        if ($widgetEdit = $field->widgetEdit($profile)) {
                                                echo $widgetEdit;
                                        } elseif ($field->range) {
                                                echo $form->dropDownList($profile,$field->varname,Profile::range($field->range));
                                        } elseif ($field->field_type=="TEXT") {
                                                echo$form->textArea($profile,$field->varname,array('rows'=>6, 'cols'=>50,'class'=>'form-control'));
                                        } else {
                                                echo $form->textField($profile,$field->varname,array('size'=>60,'class'=>'form-control','maxlength'=>(($field->field_size)?$field->field_size:255)));
                                        }
                                         ?>
                                        <?php echo $form->error($profile,$field->varname); ?>
                                </div>	
                                                <?php
                            }
                        }
                         ?>
                <?php if (UserModule::doCaptcha('registration')): ?>
                <div class="row">
                        <?php echo $form->labelEx($model,'verifyCode'); ?>

                        <?php $this->widget('CCaptcha'); ?>
                        <?php echo $form->textField($model,'verifyCode'); ?>
                        <?php echo $form->error($model,'verifyCode'); ?>

                        <p class="hint"><?php echo UserModule::t("Por favor, introduzca las letras que se muestran en la imagen de arriba.Las letras no distinguen entre mayúsculas y minúsculas."); ?>
                        
                </div>
                <?php endif; ?>
                    </div>
        </div>
	
	
	<div class="btn-group">
                <?php echo CHtml::Button('Regresar',array('class'=>'btn btn-primary','onclick'=>'history.back(-1)')); ?>
		<?php echo CHtml::submitButton(UserModule::t("Register"),array('class'=>'btn btn-primary')); ?>
	</div>

<?php $this->endWidget(); ?>
</div><!-- form -->
<?php endif; ?>