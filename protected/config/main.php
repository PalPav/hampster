<?php

// uncomment the following to define a path alias
// Yii::setPathOfAlias('local','path/to/local-folder');

// This is the main Web application configuration. Any writable
// CWebApplication properties can be configured here.
return array(
	'basePath'=>dirname(__FILE__).DIRECTORY_SEPARATOR.'..',
	'name'=>'hampster.ru',
    'defaultController'=>'Main',
    'language'=>'ru',

	// preloading 'log' component
	'preload'=>array('log'),

	// autoloading model and component classes
	'import'=>array(
		'application.models.*',
		'application.components.*',
        'application.modules.srbac.controllers.SBaseController',
	),

	'modules'=>array(
		// uncomment the following to enable the Gii tool

		'gii'=>array(
			'class'=>'system.gii.GiiModule',
			'password'=>'arma',
			// If removed, Gii defaults to localhost only. Edit carefully to taste.
			'ipFilters'=>array('127.0.0.1','::1'),
		),
        'srbac' => array(
            'userclass'=>'Hampster', //default: User
            'userid'=>'id', //default: userid
            'username'=>'login', //default:username
            'delimeter'=>'@', //default:-
            'debug'=>false, //default :false
            'pageSize'=>15, // default : 15
            'superUser' =>'Сapybara', //default: Authorizer
            'css'=>'srbac.css', //default: srbac.css
            'layout'=>
            'application.views.layouts.main', //default: application.views.layouts.main,
            //must be an existing alias
            'notAuthorizedView'=> 'srbac.views.authitem.unauthorized', // default:
            //srbac.views.authitem.unauthorized, must be an existing alias
            'alwaysAllowed'=>array(''),
            'userActions'=>array('Show','View','List'), //default: array()
            'listBoxNumberOfLines' => 15, //default : 10
            'imagesPath' => 'srbac.images', // default: srbac.images
            'imagesPack'=>'tango', //default: noia
            'iconText'=>true, // default : false
            'header'=>'srbac.views.authitem.header', //default : srbac.views.authitem.header,
            //must be an existing alias
            'footer'=>'srbac.views.authitem.footer', //default: srbac.views.authitem.footer,
            //must be an existing alias
            'showHeader'=>true, // default: false
            'showFooter'=>true, // default: false
            'alwaysAllowedPath'=>'srbac.components', // default: srbac.components
            // must be an existing alias
        ),

	),
	// application components
	'components'=>array(
		'user'=>array(
			// enable cookie-based authentication
			'allowAutoLogin'=>true,
		),
		// uncomment the following to enable URLs in path-format
		/*
		'urlManager'=>array(
			'urlFormat'=>'path',
			'rules'=>array(
				'<controller:\w+>/<id:\d+>'=>'<controller>/view',
				'<controller:\w+>/<action:\w+>/<id:\d+>'=>'<controller>/<action>',
				'<controller:\w+>/<action:\w+>'=>'<controller>/<action>',
			),
		),
		*/
        'db'=>array(
            'class'=>'CDbConnection',
            'connectionString'=>'pgsql:host=hampster.dev;port=5432;dbname=hampsters;',
            'username'=>'postgres',
            'password'=>'rowin23Q#',
        ),
        'authManager'=>array(
            'class'=>'CDbAuthManager',
            'connectionID'=>'db',
            'itemTable'          => 'usr_auth_item',
            'itemChildTable'    => 'usr_auth_item_child',
            'assignmentTable' => 'usr_auth_assignment',
            // Роль по умолчанию. Все, кто не админы, модераторы и юзеры — гости.
            'defaultRoles' => array('guest'),
        ),
        'user'=>array(
            'loginUrl'=>array('hampster/login'),
            'allowAutoLogin'=>true,
        ),
		'errorHandler'=>array(
			'errorAction'=>'main/error',
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
		'adminEmail'=>'pal-pav@yandex.ru',
	),
);