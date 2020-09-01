<?php
define('SHIROI_VERSION','1.0.1');
define('DS', DIRECTORY_SEPARATOR);//目录分隔符
define('EXT','.php');
defined('APP_PATH') or define('APP_PATH', dirname($_SERVER['SCRIPT_FILENAME']) . DS);
defined('SHIROI_PATH') or define('SHIROI_PATH', APP_PATH . 'shiroi' . DS);
defined('CONFIG_PATH') or define('CONFIG_PATH', APP_PATH . 'config' . DS);
defined('RESOURCE_PATH') or define('RESOURCE_PATH', SHIROI_PATH . 'resource' . DS);
defined('VENDOR_PATH') or define('VENDOR_PATH', APP_PATH . 'vendor' . DS);
defined('PATH_INFO') or define('PATH_INFO',$_SERVER['PATH_INFO']);

// 环境常量
define('IS_CLI', PHP_SAPI == 'cli' ? true : false);
define('IS_WIN', strpos(PHP_OS, 'WIN') !== false);

//载入Loader类
require __DIR__ . '/resource/Loader.php';

//注册自动加载
\shiroi\resource\Loader::register();