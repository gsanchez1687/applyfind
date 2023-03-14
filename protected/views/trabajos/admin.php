 <?php
Yii::app()->params['IDGridview'] = 'trabajos-grid';
Yii::app()->params['rutaUrlGridviewBoxSwitch'] = Yii::app()->controller->createUrl('updateActive');
$active = array('0'=>'Inactivos','1'=>'Activos');

foreach($active as $key => $value){
    $listData[$key]=$value;
}

Yii::app()->clientScript->registerScript('search', "
$('.search-button').click(function(){
    $('.search-form').toggle();
    return false;
});
$('.search-form form').submit(function(){
    $('#trabajos-grid').yiiGridView('update', {
        data: $(this).serialize()
    });
    return false;
});
");

?>

<h1 class="robotothin text-primary"><?php echo Yii::t("es","Empleos The Factory HKA"); ?> <?php echo Yii::app()->params['pais']; ?></h1>

    
    <div class="btn-group">
      <a  data-toggle="dropdown" data-hover="dropdown" role="button" aria-expanded="true" class="btn btn-primary dropdown-toggle">
        Administrador
        <span class="caret"></span>
      </a>
      <ul class="dropdown-menu">
        <li><a href="<?php echo Yii::app()->request->baseUrl; ?>/trabajos"><?php echo Yii::t("app", "Lista de Trabajos"); ?></a></li>
        <li><a href="<?php echo Yii::app()->request->baseUrl; ?>/trabajos/create"><?php echo Yii::t("app", "Crear nuevo trabajo"); ?></a></li>   
        <li><a href="<?php echo Yii::app()->request->baseUrl; ?>/trabajoPostulantes/admin"><?php echo Yii::t("app", "Lista de Postulantes"); ?></a></li>   
       </ul>
    </div>
  


<?php $this->widget('zii.widgets.grid.CGridView', array(
    'id'=>'trabajos-grid',
    'dataProvider'=>$model->search(),
    'filter'=>$model,
    'columns'=>array(                     
//        array('name' => 'departamento_id','value' => '$data->departamento->nombre','type' => 'text','filter' => CHtml::listData(Departamentos::model()->findAll(), "id", "nombre")),
//        array('name' => 'pais_id','value' => '$data->pais->nombre','type' => 'text','filter' => CHtml::listData(Paises::model()->findAll('activo = 1'), "id", "nombre")),
       'titulo',   
//       'tag',  
       array(
            'name' => 'activo',
            'type' => 'raw',
            'value' => 'Active::checkSwicth($data->activo,$data->id)', 'filter' => Active::getListActive(),
            'htmlOptions' => array('class' => 'switchactive')
        ),
      
         array(
            'class' => 'CLinkColumn',
            'header' => 'Detalles',
            'label' => Yii::app()->params['view-icon'],
            'linkHtmlOptions' => array('class' => 'view ' . Yii::app()->params['view-btn']),
            'urlExpression' => 'Yii::app()->controller->createUrl("view",array("id"=>$data->slug))',
        // 'visible' => Yii::app()->authRBAC->checkAccess($this->modulo . '_view')
        ),
        array(
            'class' => 'CLinkColumn',
            'header' => 'Editar',
            'label' => Yii::app()->params['update-icon'],
            'linkHtmlOptions' => array('class' => 'edit ' . Yii::app()->params['update-btn']),
            'urlExpression' => 'Yii::app()->controller->createUrl("update",array("id"=>$data->id))',
        // 'visible' => @$visible_update
        ),
        array(
            'class' => 'CLinkColumn',
            'header' => 'Eliminar',
            'label' => Yii::app()->params['delete-icon'],
            'linkHtmlOptions' => array('class' => 'delete ' . Yii::app()->params['delete-btn']),
            'urlExpression' => 'Yii::app()->controller->createUrl("delete",array("id"=>$data->id))',
        //'visible' => @$visible_delete
        ),
    ),
)); ?>