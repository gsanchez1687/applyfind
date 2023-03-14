<!DOCTYPE html>
<html>
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
	<meta name="language" content="es">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="keywords" content="<?php echo Yii::app()->params['keywords']; ?>" > 
        <meta name="description" content="<?php echo Yii::app()->params['description'] ?>" />
	<!--[if lt IE 8]>
	<link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->request->baseUrl; ?>/css/ie.css" media="screen, projection">
	<![endif]-->
	<link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->request->baseUrl; ?>/css/main.css?v=4">
	<link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->request->baseUrl; ?>/css/form.css">
        <link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->request->baseUrl; ?>/css/bootstrap/bootstrap.css">
        <link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->request->baseUrl; ?>/css/pacecss/pacecss.css">       
        <link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->request->baseUrl; ?>/css/chosen/chosen.css">          
        <link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->request->baseUrl; ?>/css/chosen/prism.css">          
        <link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->request->baseUrl; ?>/css/onoffswitch/switch.css">  
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.5.0/css/font-awesome.min.css">
        <script type="text/javascript" src="<?php echo Yii::app()->request->baseUrl; ?>/js/jquery/jquery-1.11.3.min.js"></script>  
        <script type="text/javascript" src="<?php echo Yii::app()->request->baseUrl; ?>/js/pacejs/pacejs.js"></script> 
        <script type="text/javascript" src="<?php echo Yii::app()->request->baseUrl; ?>/js/jquery/jquery.scrollTop.js"></script>
	<title><?php echo CHtml::encode($this->pageTitle); ?></title>
</head>
<body>
<div class="container" id="page">
        <div id="header">   
          <div id="logo"><?php echo CHtml::image(Yii::app()->request->baseUrl . "/images/logos/" . Yii::app()->params['logo'], " ", array("width" => "300px")); ?></div>
        </div>
	<nav class="navbar navbar-inverse">
            <div class="container-fluid">
              <div class="navbar-header">
                <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-2">
                  <span class="sr-only">Toggle navigation</span>
                  <span class="icon-bar"></span>
                  <span class="icon-bar"></span>
                  <span class="icon-bar"></span>
                </button>               
              </div>
              <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-2">
                <ul class="nav navbar-nav">
                  <li><a href="<?php echo Yii::app()->request->baseUrl; ?>/site"><?php echo Yii::t("app", "Inicio"); ?> <span class="sr-only">(current)</span></a></li>
                  <li><a href="<?php echo Yii::app()->request->baseUrl; ?>/trabajos"><?php echo Yii::t("app", "Empleos"); ?></a></li>
                </ul>
                <ul class="nav navbar-nav navbar-right">     
                     <?php if (Yii::app()->user->isGuest): ?>
                                        <li><a href="<?php echo Yii::app()->request->baseUrl; ?>/user/login"><?php echo Yii::t("app", "Iniciar Sesion"); ?></a></li>
                                    <?php else: ?>
                                        <li><a href="<?php echo Yii::app()->request->baseUrl; ?>/user/logout"><?php echo Yii::t("app", "Cerrar Sesion"); ?></a></li>
                                 <?php endif ?>  
                      <?php if(Yii::app()->getModule('user')->isAdmin()): ?>      
                        <li class="dropdown">
                            <a href="#" class="dropdown-toggle" data-toggle="dropdown" data-hover="dropdown" role="button" aria-expanded="true">Administrador<span class="caret"></span></a>
                            <ul class="dropdown-menu" role="menu">
                                <li><a href="<?php echo Yii::app()->request->baseUrl; ?>/trabajos/admin"><?php echo Yii::t("app", "Admin Trabajos"); ?></a></li>
                                <li><a href="<?php echo Yii::app()->request->baseUrl; ?>/trabajoPostulantes/admin"><?php echo Yii::t("app", "Admin Postulantes"); ?></a></li>                                
                                <li class="divider"></li>
                                <li><a href="<?php echo Yii::app()->request->baseUrl; ?>/user/admin"><?php echo Yii::t("app", "Admin Usuarios"); ?></a></li>
                                <li class="divider"></li>
                                <li><a href="<?php echo Yii::app()->request->baseUrl; ?>/user/profile"><?php echo Yii::t("app", "Mi Perfil"); ?></a></li>
                            </ul>
                        </li>
                      <?php endif ?>
                </ul>
              </div>
            </div>
        </nav>
	<?php if(isset($this->breadcrumbs)):?>
		<?php $this->widget('zii.widgets.CBreadcrumbs', array(
			'links'=>$this->breadcrumbs,
		)); ?><!-- breadcrumbs -->
	<?php endif?>

	<?php echo $content; ?>

	<div class="clear"></div>

	<div id="footer">
		<?php echo Yii::app()->params['company'] ?><br/>
                Teléfonos <?php echo Yii::app()->params['telefono']; ?><br />
                Todos los derechos reservados <?php echo date('Y'); ?>			
	</div><!-- footer -->

</div><!-- page -->
        <script type="text/javascript" src="<?php echo Yii::app()->request->baseUrl; ?>/js/bootstrap/dropdownHover.js"></script> 
        <script type="text/javascript" src="<?php echo Yii::app()->request->baseUrl; ?>/js/bootstrap/bootstrap.min.js"></script>        
        <script type="text/javascript" src="<?php echo Yii::app()->request->baseUrl; ?>/js/chosen/chosen.jquery.min.js"></script>
        <script type="text/javascript" src="<?php echo Yii::app()->request->baseUrl; ?>/js/switch/switch.js"></script>   
        <script>
           $(".chosen-select").chosen()
           $(function(){scrollTop({color:"grey",top:400,time:500,position:"bottom",speed:300})});  
        </script>
        <?php       
            if (Yii::app()->params['IDGridview'] != NULL) {
                $rutaUrlGridviewBoxSwitch = Yii::app()->params['rutaUrlGridviewBoxSwitch'];
                $IDGridview = Yii::app()->params['IDGridview'];          
                Yii::app()->clientScript->registerScript('LoadGridviewBoxSwitch',"GridviewBoxSwitch('{$IDGridview}','{$rutaUrlGridviewBoxSwitch}');");          
                Yii::app()->clientScript->registerScript('UpdateGridviewBoxSwitch', " function UpdateGridviewBoxSwitch(id, data) { GridviewBoxSwitch('{$IDGridview}','{$rutaUrlGridviewBoxSwitch}'); }");
            }
       ?>
</body>
</html>
