<?php

// This is the configuration for yiic console application.
// Any writable CConsoleApplication properties can be configured here.
require_once dirname(__FILE__) . '/db.php';

return array(
    'basePath'   => dirname(__FILE__) . DIRECTORY_SEPARATOR . '..',
    'name'       => 'Рок-Портал EQUILIBRIUM',

    // preloading 'log' component
    'preload'    => array('log'),

    // application components
    'components' => array(

        'db'  => array(
            'connectionString' => 'mysql:host=' . DB_HOST . ';dbname=' . DB_NAME,
            'emulatePrepare'   => true,
            'username'         => DB_USER,
            'password'         => DB_PASS,
            'charset'          => 'utf8',
        ),

        'log' => array(
            'class'  => 'CLogRouter',
            'routes' => array(
                array(
                    'class'  => 'CFileLogRoute',
                    'levels' => 'error, warning',
                ),
            ),
        ),
    ),
);