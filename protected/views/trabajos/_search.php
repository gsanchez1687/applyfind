<?php
/* @var $this TrabajosController */
/* @var $model Trabajos */
/* @var $form CActiveForm */
?>

<div class="wide form">

<?php $form=$this->beginWidget('CActiveForm', array('action'=>Yii::app()->createUrl($this->route),'method'=>'get')); ?>

    <div class="row">
		<?php echo $form->labelEx($model,'tag'); ?>
		<?php echo $form->textField($model,'tag',array('size'=>'10','maxlengh'=>'100')); ?>
		<?php echo $form->error($model,'tag'); ?>	
	</div>	
	
	<div class="row">
		<?php echo $form->labelEx($model,'departamento_id'); ?>
		<?php echo $form->dropDownList($model,'departamento_id',CHtml::listData(Departamentos::model()->findAll(array('order' => 'id ASC')), 'id', 'nombre'), array('empty'=>'Seleccione')); ?>
		<?php echo $form->error($model,'departamento_id'); ?>
	</div>	
		&nbsp;<?php echo CHtml::submitButton('Buscar',array('class'=>'btn btn-default')); ?>

<?php $this->endWidget(); ?>

</div><!-- search-form -->