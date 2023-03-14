<div class="view">

	<b><?php echo CHtml::encode($data->getAttributeLabel('trabajo_id')); ?>:</b>
	<?php echo CHtml::encode($data->trabajo->titulo); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('postulante_id')); ?>:</b>
	<?php echo CHtml::encode($data->postulante->nombre." - ".$data->postulante->apellido); ?>
	<br />
        
	<b><?php echo CHtml::encode($data->getAttributeLabel('fecha')); ?>:</b>
	<?php echo CHtml::encode($data->postulante->date); ?>
	<br />
        
	
	<?php echo CHtml::link('Descargar PDF',array('uploads/'.$data->postulante->file),array('class'=>'btn btn-primary')); ?>
	<br />


</div>