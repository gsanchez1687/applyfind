<?php
/* @var $this TrabajoPostulantesController */
/* @var $model TrabajoPostulantes */

$this->breadcrumbs=array(
	'Trabajo Postulantes'=>array('index'),
	$model->id=>array('view','id'=>$model->id),
	'Update',
);

$this->menu=array(
	array('label'=>'List TrabajoPostulantes', 'url'=>array('index')),
	array('label'=>'Create TrabajoPostulantes', 'url'=>array('create')),
	array('label'=>'View TrabajoPostulantes', 'url'=>array('view', 'id'=>$model->id)),
	array('label'=>'Manage TrabajoPostulantes', 'url'=>array('admin')),
);
?>

<h1>Update TrabajoPostulantes <?php echo $model->id; ?></h1>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>