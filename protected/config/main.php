<?php

// uncomment the following to define a path alias
// Yii::setPathOfAlias('local','path/to/local-folder');

// This is the main Web application configuration. Any writable
// CWebApplication properties can be configured here.
return array(
	'basePath'=>dirname(__FILE__).DIRECTORY_SEPARATOR.'..',
	'name'=>'Aplikasi PNBP',
	'theme'=>'beagle',
	'timeZone'=>'Asia/Jakarta',	
	'language'=>'id',

	// preloading 'log' component
	'preload'=>array('log'),

	// autoloading model and component classes
	'import'=>array(
		'application.models.*',
		'application.components.*',
		),

	'aliases' => array(
    //If you manually installed it
		'xupload' => 'extensions.xupload'
		),	

	'modules'=>array(
		'gii'=>array(
			'class'=>'system.gii.GiiModule',
			'password'=>false,
			// If removed, Gii defaults to localhost only. Edit carefully to taste.
			'ipFilters'=>array('127.0.0.1','::1','192.168.43.164'),
			),
		
		),

	// application components
	'components'=>array(

		'mail' => array(
			'class' => 'ext.yii-mail.YiiMail',
			'transportType' => 'smtp',
			'transportOptions'=>array(
				'encryption'=>'ssl', 
				'host'=>'smtp.gmail.com',
				'username'=>'infomugi.com@gmail.com',
				'password'=>'areyouhackerman?',	
				'port'=>465,
				),
			'viewPath' => 'application.views.mail',
			'logging' => true,
			'dryRun' => false
			),			

		'user'=>array(
			// enable cookie-based authentication
			'allowAutoLogin'=>true,
			),

		// uncomment the following to enable URLs in path-format
			// uncomment the following to enable URLs in path-format
		'urlManager'=>array(
			'urlFormat'=>'path',
			'rules'=>array(
				
				'<controller:w+>/<id:d+>'=>'<controller>/view',
				'<controller:w+>/<action:w+>/<id:d+>'=>'<controller>/<action>',
				'<controller:w+>/<action:w+>'=>'<controller>/<action>',

				//Page URL Default Settings
				'login' => 'site/login',
				'logout' => 'site/logout',
				'dashboard' => 'site/dashboard',
				'home' => 'site/home', 
				'index' => 'site/index', 
				'contact' => 'site/contact',
				'about' => 'site/about',
				'success' => 'site/success',

				//Page URL Activation and Reset
				'reset/<token:[a-zA-Z0-9-]+>/'=>'site/reset',
				'activation/<token:[a-zA-Z0-9-]+>/'=>'site/activation',

				// Page
				'view/<id:[a-zA-Z0-9-]+>/'=>'main/request/view',
				
				//Profile
				'/member/<name:[a-zA-Z0-9-]+>/'=>'master/profile/user',
				'/profile/<view:[a-zA-Z0-9-]+>/'=>'master/users/profile',

				),

			'showScriptName'=>false,
			'caseSensitive'=>false,
			// 'urlSuffix'=>'.aspx'
			),

		// database settings are configured in database.php
		'db'=>require(dirname(__FILE__).'/database.php'),

		'errorHandler'=>array(
			// use 'site/error' action to display errors
			'errorAction'=>YII_DEBUG ? null : 'site/error',
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
		// this is used in contact page
		'adminEmail'=>'webmaster@example.com',
		),
	);
