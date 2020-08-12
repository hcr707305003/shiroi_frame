<?php
/*
 * @Descripttion: 
 * @Author: Shiroi
 * @Date: 2020-07-28 11:49:24
 * @LastEditors: Shiroi
 * @site: https://shiroi.top
 * @mail: 707305003@qq.com
 */ 
define('DS', DIRECTORY_SEPARATOR);//目录分隔符
define('DSS','/');
define('EXT', '.php');
define('APP_ROOT',$_SERVER['DOCUMENT_ROOT'] . DS);
define('SHIROI_ROOT',__DIR__ . DS);//项目路径
define('LIB_PATH', SHIROI_ROOT . 'library' . DS);
define('CONFIG_PATH', SHIROI_ROOT . 'config' . DS);
define('VENDOR_PATH', APP_ROOT . 'vendor' . DS);
define('REQUEST_URL',str_replace("/index.php",'',$_SERVER['REQUEST_URI']));//获取url请求路径
define('ALL_PATH',array_values(array_filter(explode('/',REQUEST_URL))));//所有路径
define('PATH_INFO',count(ALL_PATH)>2?array_slice(ALL_PATH,-2):ALL_PATH);//截取后两位做类与方法
define('FILE_PATH',count(ALL_PATH)>2?array_slice(ALL_PATH,0,count(ALL_PATH)-2):['/']);//文件路径
define('CLASS_NAME',ucfirst(isset(PATH_INFO[0])?PATH_INFO[0]:''));//类名
define('METHOD_NAME',isset(PATH_INFO[1])?PATH_INFO[1]:'');//方法名

require LIB_PATH . 'Loader.php';