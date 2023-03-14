<?php $this->pageTitle=Yii::app()->name . ' - '.UserModule::t("Profile");
$this->breadcrumbs=array(UserModule::t("Profile"));
//$this->menu=array(
//	((UserModule::isAdmin())
//		?array('label'=>UserModule::t('Manage Users'), 'url'=>array('/user/admin'))
//		:array()),
//    array('label'=>UserModule::t('List User'), 'url'=>array('/user')),
//    array('label'=>UserModule::t('Edit'), 'url'=>array('edit')),
//    array('label'=>UserModule::t('Change password'), 'url'=>array('profile/changepassword/'.$model->id)),
//    array('label'=>UserModule::t('Logout'), 'url'=>array('/user/logout')),
//);
?>
<h1 class="robotothin text-primary"><?php echo UserModule::t('Mi Perfil'); ?></h1>

<?php if(Yii::app()->user->hasFlash('profileMessage')): ?>
<div class="success">
	<?php echo Yii::app()->user->getFlash('profileMessage'); ?>
</div>
<?php endif; ?>
<table class="dataGrid">
	<tr>           
            <th class="label label-primary"><?php echo CHtml::encode($model->getAttributeLabel('username')); ?></th>
	    <td><?php echo CHtml::encode($model->username); ?></td>
	</tr>
	<?php 
		$profileFields=ProfileField::model()->forOwner()->sort()->findAll();
		if ($profileFields) {
			foreach($profileFields as $field) {
				//echo "<pre>"; print_r($profile); die();
			?>
	<tr>
	<th class="label label-primary"><?php echo CHtml::encode(UserModule::t($field->title)); ?></th>
    	<td><?php echo (($field->widgetView($profile))?$field->widgetView($profile):CHtml::encode((($field->range)?Profile::range($field->range,$profile->getAttribute($field->varname)):$profile->getAttribute($field->varname)))); ?></td>
	</tr>
            <?php
		}//$profile->getAttribute($field->varname)
	}
	?>
	<tr>
        <th class="label label-primary"><?php echo CHtml::encode($model->getAttributeLabel('email')); ?></th>
    	<td><?php echo CHtml::encode($model->email); ?></td>
	</tr>
	<tr>
		<th class="label label-primary"><?php echo CHtml::encode($model->getAttributeLabel('create_at')); ?></th>
    	<td><?php echo $model->create_at; ?></td>
	</tr>
	<tr>
		<th class="label label-primary"><?php echo CHtml::encode($model->getAttributeLabel('lastvisit_at')); ?></th>
    	<td><?php echo $model->lastvisit_at; ?></td>
	</tr>
	<tr>
		<th class="label label-primary"><?php echo CHtml::encode($model->getAttributeLabel('status')); ?></th>
    	<td><?php echo CHtml::encode(User::itemAlias("UserStatus",$model->status)); ?></td>
	</tr>
</table>
<br /><br />
<div class="btn-group">
    <a class="btn btn-primary" href="<?php echo Yii::app()->request->baseUrl; ?>/user/profile/changepassword/<?php echo $model->id; ?>"><?php echo Yii::t("user", "Cambiar Contraseña"); ?></a>
    <a class="btn btn-primary" href="<?php echo Yii::app()->request->baseUrl; ?>/user/admin/update/id/<?php echo $model->id; ?>"><?php echo Yii::t("user", "Actualizar datos"); ?></a>
</div>