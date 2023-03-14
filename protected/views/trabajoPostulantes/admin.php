<?php 

Yii::app()->clientScript->registerScript('search', "
$('.search-form form').submit(function(){
	$('#trabajo-postulantes-grid').yiiGridView('update', {
		data: $(this).serialize()
	});
	return false;
});
");
?>

<h1 class="robotothin text-primary">Postulantes</h1>

<div class="btn-group">
      <a  data-toggle="dropdown" data-hover="dropdown" role="button" aria-expanded="true" class="btn btn-primary dropdown-toggle" >
        Administrador
        <span class="caret"></span>
      </a>
      <ul class="dropdown-menu">
        <li><a href="<?php echo Yii::app()->request->baseUrl; ?>/trabajos"><?php echo Yii::t("app", "Lista de Trabajos"); ?></a></li>
        <li><a href="<?php echo Yii::app()->request->baseUrl; ?>/trabajos/create"><?php echo Yii::t("app", "Crear nuevo trabajo"); ?></a></li>   
        <li><a href="<?php echo Yii::app()->request->baseUrl; ?>/trabajos/admin"><?php echo Yii::t("app", "Admin Trabajo"); ?></a></li>   
       </ul>
    </div>
<?php
$this->widget('zii.widgets.grid.CGridView', array(
    'id' => 'trabajo-postulantes-grid',
    'dataProvider' => $model->search(),
    'filter' => $model,
    'columns' => array(
        array('name' => 'trabajo_id', 'value' => '$data->trabajo->titulo', 'type' => 'text', 'filter' => CHtml::listData(Trabajos::model()->findAll(), "id", "titulo")),
        array('name' => 'postulante_id', 'value' => '$data->postulante->nombre', 'type' => 'text', 'filter' => CHtml::listData(Postulates::model()->findAll(), "id", "nombre")),
        array(
        'header'=>'CV',
        'name'  => 'postulante_id',
        'value' => 'CHtml::link($data->postulante->file,Yii::app()->createUrl("",array("uploads"=>$data->postulante->file)),array("class"=>"btn btn-primary"))',
        'type'  => 'raw',       
         ),
         array(
            'class' => 'CLinkColumn',
            'header' => 'Detall',
            'label' => Yii::app()->params['view-icon'],
            'linkHtmlOptions' => array('class' => 'view ' . Yii::app()->params['view-btn']),
            'urlExpression' => 'Yii::app()->controller->createUrl("view",array("id"=>$data->id))',
        // 'visible' => Yii::app()->authRBAC->checkAccess($this->modulo . '_view')
        ),   
        array(
            'class' => 'CLinkColumn',
            'header' => 'Delete',
            'label' => Yii::app()->params['delete-icon'],
            'linkHtmlOptions' => array('class' => 'delete ' . Yii::app()->params['delete-btn']),
            'urlExpression' => 'Yii::app()->controller->createUrl("delete",array("id"=>$data->id))',
        //'visible' => @$visible_delete
        ),       
    ),
));
?>
