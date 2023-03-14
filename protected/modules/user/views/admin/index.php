<?php
Yii::app()->clientScript->registerScript('search', "
$('.search-button').click(function(){
    $('.search-form').toggle();
    return false;
});	
$('.search-form form').submit(function(){
    $.fn.yiiGridView.update('user-grid', {
        data: $(this).serialize()
    });
    return false;
});
");
?>
<h1 class="text-primary robotothin"><?php echo UserModule::t("Administrar Usuarios"); ?></h1>

 <a class="btn btn-primary" href="<?php echo Yii::app()->request->baseUrl; ?>/user/registration"><?php echo Yii::t("app", "Nuevo Usuario"); ?></a>   
<?php
$this->widget('zii.widgets.grid.CGridView', array(
    'id' => 'user-grid',
    'dataProvider' => $model->search(),
    'filter' => $model,
    'columns' => array(
        array(
            'name' => 'username',
            'type' => 'raw',
            'value' => 'CHtml::link(UHtml::markSearch($data,"username"),array("admin/view","id"=>$data->id))',
        ),
		array(
			'name'=>'email',
			'type'=>'raw',
			'value'=>'CHtml::link(UHtml::markSearch($data,"email"), "mailto:".$data->email)',
		),
//        'create_at',
        'lastvisit_at',
        array(
            'name' => 'superuser',
            'value' => 'User::itemAlias("AdminStatus",$data->superuser)',
            'filter' => User::itemAlias("AdminStatus"),
        ),
        array(
            'name' => 'status',
            'value' => 'User::itemAlias("UserStatus",$data->status)',
            'filter' => User::itemAlias("UserStatus"),
        ),
        array(
            'class' => 'CLinkColumn',
            'header' => 'Detalle',
            'label' => Yii::app()->params['view-icon'],
            'linkHtmlOptions' => array('class' => 'view ' . Yii::app()->params['view-btn']),
            'urlExpression' => 'Yii::app()->controller->createUrl("view",array("id"=>$data->id))',
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
));
?>
