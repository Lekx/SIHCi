<?php

// uncomment the following to define a path alias
// Yii::setPathOfAlias('local','path/to/local-folder');

// This is the main Web application configuration. Any writable
// CWebApplication properties can be configured here.
$sessionTimeout = 300;
return array(
	'basePath'=>dirname(__FILE__).DIRECTORY_SEPARATOR.'..',
	'name'=>'SIHCi',
	'timeZone' => 'America/Mexico_City',
	'language' => 'es',

	'aliases' => array(
        'bootstrap' => realpath(__DIR__ . '/../extensions/bootstrap'), // change this if necessary
       'yiiwheels' => realpath(__DIR__ . '/../extensions/yiiwheels'), // change if necessary
    ),


	// preloading 'log' component
	'preload'=>array('log'),

	// autoloading model and component classes
	'import'=>array(
		'application.models.*',
		'bootstrap.helpers.TbHtml',
		'application.components.*',
		'bootstrap.helpers.TbArray',
		'bootstrap.widgets.*',
		'application.extensions.coco.*',
		'application.controllers.SystemLogController'
	),

	'modules'=>array(
		// uncomment the following to enable the Gii tool

		'gii'=>array(
			'class'=>'system.gii.GiiModule',
			'generatorPaths' => array('bootstrap.gii'),
			'password'=>'111',
			// If removed, Gii defaults to localhost only. Edit carefully to taste.
			'ipFilters'=>array('127.0.0.1','::1'),
			'newFileMode'=>0666,
			'newDirMode'=>0777,
		),

	),

		// application components
   'params'=>require(dirname(__FILE__).'/params.php'),

	'components'=>array(
		'session' => array(
	   	  'autoStart'=>false,
	      'class' => 'CDbHttpSession',
	      'timeout' => $sessionTimeout,

	   ),

	 	'authManager'=>array(
				'class'=>'CDbAuthManager',
				'connectionID'=>'db',
				'session'=> array(
					'timeout'=> 1,
				),
			),
		'user'=>array(
			// enable cookie-based authentication
			'allowAutoLogin'=>false,
		),

		'bootstrap' => array(
            'class' => 'bootstrap.components.TbApi',
        ),

        'yiiwheels' => array(
            'class' => 'yiiwheels.YiiWheels',
        ),


		'urlManager'=>array(
			'urlFormat'=>'path',
			'rules'=>array(
				'<controller:\w+>/<id:\d+>'=>'<controller>/view',
				'<controller:\w+>/<action:\w+>/<id:\d+>'=>'<controller>/<action>',
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
		// this is used in contact page
		'adminEmail'=>'webmaster@example.com',
	),
);
