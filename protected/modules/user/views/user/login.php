<?php $this->pageTitle = Yii::app()->name . ' - ' . UserModule::t("Login");?>
    <?php if (Yii::app()->user->hasFlash('loginMessage')): ?>
    <div class="success">
    <?php echo Yii::app()->user->getFlash('loginMessage'); ?>
    </div>
<?php endif; ?>


<div class=" card signin-card form">
    <p><small><?php echo UserModule::t("Por favor, rellene el siguiente formulario con sus datos de acceso:"); ?> </small></p>
    <?php echo CHtml::beginForm(); ?>


    <?php echo CHtml::errorSummary($model); ?>

    <div class="row">
        <?php echo CHtml::activeLabelEx($model, 'username'); ?>
        <?php echo CHtml::activeTextField($model, 'username', array('class' => 'form-control')) ?>
    </div>

    <div class="row">
        <?php echo CHtml::activeLabelEx($model, 'password'); ?>
        <?php echo CHtml::activePasswordField($model, 'password', array('class' => 'form-control')) ?>
    </div>

    <div class="row">
        <p class="hint">
            <?php echo CHtml::link(UserModule::t("Registrar"), Yii::app()->getModule('user')->registrationUrl); ?> | <?php echo CHtml::link(UserModule::t("Contraseña Perdida?"), Yii::app()->getModule('user')->recoveryUrl); ?>
        </p>
    </div>

    <div class="row rememberMe">
        <?php echo CHtml::activeCheckBox($model, 'rememberMe'); ?>
        <?php echo CHtml::activeLabelEx($model, 'rememberMe'); ?>
    </div>

    <div class="row submit">
        <?php echo CHtml::submitButton(UserModule::t("Iniciar Sesión"), array('class' => 'btn btn-primary btn-lg btn-block')); ?>
    </div>

    <?php echo CHtml::endForm(); ?>
</div><!-- form -->


<?php
$form = new CForm(array(
    'elements' => array(
        'username' => array(
            'type' => 'text',
            'maxlength' => 32,
        ),
        'password' => array(
            'type' => 'password',
            'maxlength' => 32,
        ),
        'rememberMe' => array(
            'type' => 'checkbox',
        )
    ),
    'buttons' => array(
        'login' => array(
            'type' => 'submit',
            'label' => 'Login',           
        ),
    ),
        ), $model);
?>