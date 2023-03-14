<?php
/* @var $this TrabajoPostulantesController */
/* @var $model TrabajoPostulantes */
/* @var $form CActiveForm */
?>

<div class="form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'trabajo-postulantes-form',
	// Please note: When you enable ajax validation, make sure the corresponding
	// controller action is handling ajax validation correctly.
	// There is a call to performAjaxValidation() commented in generated controller code.
	// See class documentation of CActiveForm for details on this.
	'enableAjaxValidation'=>false,
)); ?>

	<p class="note">Fields with <span class="required">*</span> are required.</p>

	<?php echo $form->errorSummary($model); ?>

	<div class="row">
		<?php echo $form->labelEx($model,'trabajo_id'); ?>
		<?php echo $form->textField($model,'trabajo_id'); ?>
		<?php echo $form->error($model,'trabajo_id'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'postulante_id'); ?>
		<?php echo $form->textField($model,'postulante_id'); ?>
		<?php echo $form->error($model,'postulante_id'); ?>
	</div>

	<div class="row buttons">
		<?php echo CHtml::submitButton($model->isNewRecord ? 'Create' : 'Save'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- form -->