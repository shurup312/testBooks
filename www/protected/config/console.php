<?php

// This is the configuration for yiic console application.
// Any writable CConsoleApplication properties can be configured here.
return array(
	'basePath'=>dirname(__FILE__).DIRECTORY_SEPARATOR.'..',
	'name'=>'My Console Application',

	// preloading 'log' component
	'preload'=>array('log'),
	'commandMap' => array(
		'migrate' => array(
			'class'          => 'system.cli.commands.MigrateCommand',
			'migrationPath'  => 'application.migrations',
			'migrationTable' => 'migrations',
			'connectionID'   => 'db',
			'templateFile'   => 'application.template' # Шаблон миграции (P.S. Не знаю, куда пристроить)
		),
	),
	// application components
	'components'=>array(
		// uncomment the following to use a MySQL database
		'db'=>array(
			'connectionString' => 'mysql:host=127.0.0.1;dbname=testyii',
			'emulatePrepare' => true,
			'username' => 'root',
			'password' => '',
			'charset' => 'utf8',
		),
		'log'=>array(
			'class'=>'CLogRouter',
			'routes'=>array(
				array(
					'class'=>'CFileLogRoute',
					'levels'=>'error, warning',
				),
			),
		),
	),
);
