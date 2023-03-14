<?php
$this->breadcrumbs=array(
	UserModule::t('Usuarios')=>array('admin'),
	$model->username,
);

?>
<h1 class="text-primary robotothin"><?php echo UserModule::t('Usuario').' "'.$model->username.'"'; ?></h1>

<?php
 
	$attributes = array(		
		'username',
	);
	
	$profileFields=ProfileField::model()->forOwner()->sort()->findAll();
	if ($profileFields) {
		foreach($profileFields as $field) {
			array_push($attributes,array(
					'label' => UserModule::t($field->title),
					'name' => $field->varname,
					'type'=>'raw',
					'value' => (($field->widgetView($model->profile))?$field->widgetView($model->profile):(($field->range)?Profile::range($field->range,$model->profile->getAttribute($field->varname)):$model->profile->getAttribute($field->varname))),
				));
		}
	}
	
	array_push($attributes,		
		'email',
		'activkey',
		'create_at',
		'lastvisit_at',
		array(
			'name' => 'superuser',
			'value' => User::itemAlias("AdminStatus",$model->superuser),
		),
		array(
			'name' => 'status',
			'value' => User::itemAlias("UserStatus",$model->status),
		)
	);
	
	$this->widget('zii.widgets.CDetailView', array(
		'data'=>$model,
		'attributes'=>$attributes,
	));
	

?>
<br />
 <a class="btn btn-primary" href="<?php echo Yii::app()->request->baseUrl; ?>/user/admin/admin"><?php echo Yii::t("app", "Administrador"); ?></a>  