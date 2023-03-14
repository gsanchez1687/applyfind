<?php
/* @var $this TrabajoPostulantesController */
/* @var $model TrabajoPostulantes */

$this->breadcrumbs=array(
	'Trabajo Postulantes'=>array('index'),
	'Create',
);

$this->menu=array(
	array('label'=>'List TrabajoPostulantes', 'url'=>array('index')),
	array('label'=>'Manage TrabajoPostulantes', 'url'=>array('admin')),
);
?>

<h1>Create TrabajoPostulantes</h1>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>