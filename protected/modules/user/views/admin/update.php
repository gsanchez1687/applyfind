<?php
$this->breadcrumbs=array(
	(UserModule::t('Users'))=>array('admin'),
	$model->username=>array('view','id'=>$model->id),
	(UserModule::t('Update')),
);

?>

<h2 class="text-primary robotothin"><?php echo  UserModule::t('Actualizar Usuario')." ".$model->username; ?></h2>

<?php
	echo $this->renderPartial('_form', array('model'=>$model,'profile'=>$profile));
?>