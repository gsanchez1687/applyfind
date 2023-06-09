<?php

// uncomment the following to define a path alias
// Yii::setPathOfAlias('local','path/to/local-folder');

// This is the main Web application configuration. Any writable
// CWebApplication properties can be configured here.

return array(
	'basePath'=>dirname(__FILE__).DIRECTORY_SEPARATOR.'..',
	'name'=>'Applyfind Bolsa de Empleos',
        'sourceLanguage' => 'es',   
        'defaultController' => 'trabajos/index',	
	// preloading 'log' component
	'preload'=>array('log'),

	// autoloading model and component classes
	'import'=>array(
		'application.models.*',
		'application.components.*',
        'application.modules.user.models.*',
        'application.modules.user.components.*',
               

	),

	'modules'=>array(
		 'user'=>array(
                        # encrypting method (php hash function)
                        'tableUsers' => 'tbl_users',
                        'tableProfiles' => 'tbl_profiles',
                        'tableProfileFields' => 'tbl_profiles_fields',
                        'hash' => 'md5',                   

                        # send activation email
                        'sendActivationMail' => true,

                        # allow access for non-activated users
                        'loginNotActiv' => false,

                        # activate user on registration (only sendActivationMail = false)
                        'activeAfterRegister' => false,

                        # automatically login from registration
                        'autoLogin' => true,

                        # registration path
                        'registrationUrl' => array('/user/registration'),

                        # recovery password path
                        'recoveryUrl' => array('/user/recovery'),

                        # login form path
                        'loginUrl' => array('/user/login'),

                        # page after login
                        'returnUrl' => array('/trabajos/index'),

                        # page after logout
                        'returnLogoutUrl' => array('/user/login'),
                    ),	
		'gii'=>array(
			'class'=>'system.gii.GiiModule',
			'password'=>'qwerty',
			// If removed, Gii defaults to localhost only. Edit carefully to taste.
			'ipFilters'=>array('127.0.0.1','::1'),
		),
	
	),

	// application components
	'components'=>array(
            
                'geoip' => array(
                    'class' => 'application.extensions.geoip.CGeoIP',
                    // specify filename location for the corresponding database
                    'filename' => '/var/www/empleos/protected/extensions/geoip/GeoLiteCity.dat',
                    // Choose MEMORY_CACHE or STANDARD mode
                    'mode' => 'STANDARD',
                ),
            
                'widgetFactory' => array(
                'widgets' => array(
                    'CGridView' => array('itemsCssClass' => 'table table-bordered table-striped table-hover table-gridview table-condensed table-gridview','afterAjaxUpdate' => 'UpdateGridviewBoxSwitch','pagerCssClass' => 'gridview-pagination'),'htmlOptions' => array('class' => 'container-grid-view')),                
                ),
            
                'db'=>array(
                #...
                    'tablePrefix' => 'tbl_',
                #...
                ),

		'user'=>array(
			// enable cookie-based authentication
//			'allowAutoLogin'=>true,
//                        'loginUrl' => array('/user/login'),
                        'class' => 'WebUser',
		),

		// uncomment the following to enable URLs in path-format
		
		'urlManager'=>array(
			'urlFormat'=>'path',
                        'showScriptName' => false,    
			'rules'=>array(                       
                            // custom rules go first
                        '<controller:\d+>/<id:[a-zA-Z0-9-]+>'=>'<controller>/<action>',  
                        '<controller:\w+>/<action:\w+>/<id:\d+>' =>'<controller>/<action>',
                        '<controller:\w+>/<action:\w+>/<id:>' =>'<controller>/<action>', 
                        '<controller:\w+>/<action:\w+>'=>'<controller>/<action>',

			),
		),
		

		// database settings are configured in database.php
		'db'=>require(dirname(__FILE__).'/database.php'),

		'errorHandler'=>array(
			// use 'site/error' action to display errors
			'errorAction'=>'site/error',
		),

		'log'=>array(
			'class'=>'CLogRouter',
			'routes'=>array(
				array(
					'class'=>'CFileLogRoute',
					'levels'=>'error, warning',
				),
				// uncomment the following to show log messages on web pages
				/*
				array(
					'class'=>'CWebLogRoute',
				),
				*/
			),
		),

	),

	// application-level parameters that can be accessed
	// using Yii::app()->params['paramName']
     
	'params'=>array(
                'pais'=>'Mexico',
                'company' => 'ApplyFind',
                'direccion' => '',
                'telefono' => '+0000000000',
                'logo' => 'logo.png',                
                'twitter' => '',	
                'rollback' => FALSE,
                'defaultPageSize' => '10',
                'pageSizeOptions' => array(2 => 2,10 => 10, 20 => 20, 50 => 50, 100 => 100),              
                'ErrorAccesoDenegado'=>'Acceso denegado',
				'keywords' => 'empleos en mexico,trabajos, empleo,bolsa de trabajo,empleos,ofertas de trabajo,ofertas de empleo,curriculum vitae,curriculum,currículum',
                'descrption'=>'Ofertas de trabajo en ApplyFind. Página web gratis para su currículum. Reciba las ofertas por email. Publicación gratuita de ofertas.',
                'view-icon' => '<i class="fa fa-eye"></i>',
                'view-btn' => 'btn btn-default',
                'update-icon' => '<i class="fa fa-pencil-square-o"></i>',
                'update-btn' => 'btn btn-default',
                'delete-icon' => '<i class="fa fa-times"></i>',
                'delete-btn' => 'btn btn-default',
                'save-icon' => '<i class="icon-menu glyph-icon flaticon-floppy1"></i>',
                'save-btn' => 'btn btn-sm btn-success',
                'save-btn' => 'btn btn-warning',      
                'cancel-btn' => 'btn btn-default',
                'form-btn' => 'btn btn-primary',
                'cancel-text' => 'Cancelar',
                'Save-text' => 'Actualizar',  
                'Create-text' => 'Crear',
                'IDGridview'=>'',
                'rutaUrlGridviewBoxSwitch'=>'',
	),
);
