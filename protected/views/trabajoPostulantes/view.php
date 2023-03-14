<?php
/* @var $this TrabajoPostulantesController */
/* @var $model TrabajoPostulantes */

$this->breadcrumbs=array(
	'Trabajo Postulantes'=>array('index'),
	$model->id,
);

$this->menu=array(
	array('label'=>'List TrabajoPostulantes', 'url'=>array('index')),
	array('label'=>'Create TrabajoPostulantes', 'url'=>array('create')),
	array('label'=>'Update TrabajoPostulantes', 'url'=>array('update', 'id'=>$model->id)),
	array('label'=>'Delete TrabajoPostulantes', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->id),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage TrabajoPostulantes', 'url'=>array('admin')),
);
?>

<h1>View TrabajoPostulantes #<?php echo $model->id; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'id',
		'trabajo_id',
		'postulante_id',
	),
)); ?>
