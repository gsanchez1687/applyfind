<?php $this->pageTitle=Yii::app()->name . ' - '.UserModule::t("Restore"); ?>

<h1 class="robotothin text-primary"><?php echo UserModule::t("Restaurar"); ?></h1>

<?php if(Yii::app()->user->hasFlash('recoveryMessage')): ?>
<div class="success">
<?php echo Yii::app()->user->getFlash('recoveryMessage'); ?>
</div>
<?php else: ?>

<div class="form">
<?php echo CHtml::beginForm(); ?>

	<?php echo CHtml::errorSummary($form); ?>
	
	<div class="row">
		<?php echo CHtml::activeLabel($form,'login_or_email'); ?>
		<?php echo CHtml::activeTextField($form,'login_or_email') ?>
		<p class="hint"><?php echo UserModule::t("Por favor, ingrese su nombre de usuario o la dirección de correo electrónico."); ?></p>
	</div>
	
	<div class="btn-group">
                <?php echo CHtml::Button('Regresar',array('class'=>'btn btn-primary','onclick'=>'history.back(-1)')); ?>
		<?php echo CHtml::submitButton(UserModule::t("Restaurar"),array('class'=>'btn btn-primary')); ?>
	</div>

<?php echo CHtml::endForm(); ?>
</div><!-- form -->
<?php endif; ?>