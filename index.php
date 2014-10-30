<?php
require_once dirname(__FILE__) . '/vendor/autoload.php';
// change the following paths if necessary
$yii=dirname(__FILE__).'/vendor/yiisoft/yii/framework/yii.php';
require_once($yii);

if (file_exists(dirname(__FILE__) . '/protected/config/local.php')) {
    $config = dirname(__FILE__) . '/protected/config/local.php';
} else {
    $config = dirname(__FILE__) . '/protected/config/main.php';
}
$config = require($config);

// remove the following lines when in production mode
defined('YII_DEBUG') or define('YII_DEBUG',true);
// specify how many levels of call stack should be shown in each log message
defined('YII_TRACE_LEVEL') or define('YII_TRACE_LEVEL',3);

Yii::createWebApplication($config)->run();
