<?php
/* @var $this TrabajoPostulantesController */
/* @var $model TrabajoPostulantes */
/* @var $form CActiveForm */
?>

<div class="wide form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'action'=>Yii::app()->createUrl($this->route),
	'method'=>'get',
)); ?>

	
	<div class="row">
		<?php echo $form->label($model,'trabajo_id'); ?>
		<?php echo $form->dropDownList($model,'trabajo_id',CHtml::listData(Trabajos::model()->findAll('activo = 1'), 'id', 'titulo'),array('class'=>'chosen-select','prompt'=>'Seleccione')); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'postulante_id'); ?>
		<?php echo $form->dropDownList($model,'postulante_id',CHtml::listData(Postulates::model()->findAll(''), 'id', 'nombre'),array('class'=>'chosen-select','prompt'=>'Seleccione')); ?>
	</div>

	<div class="row buttons">
		<?php echo CHtml::submitButton('Buscar',array('class'=>'btn btn-default')); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- search-form -->