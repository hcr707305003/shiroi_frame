<?php
/*
 * @Descripttion: 
 * @Author: Shiroi
 * @Date: 2020-07-28 11:58:16
 * @LastEditors: Shiroi
 * @site: https://shiroi.top
 * @mail: 707305003@qq.com
 */ 

namespace shiroi\library;

class Loader
{
    public static function autoload($class) 
    {
        $name = $class;
        if(false !== strpos($name,DS)){
            $name = explode(DS,$class);
            $name = array_pop($name);
        }
        $implodepath = implode(DSS,FILE_PATH);
        $filepath = $implodepath==DSS?$implodepath:DSS.$implodepath.DSS;
        //这里因工程目录结构而定
        $filename = APP_ROOT.$filepath.$name.EXT;
        if(is_file($filename)) {
            include_once $filename;
            return;
        }
    }

    /**
     * 注册自动加载
     * @param null $autoload
     */
    public static function register($autoload = null)
    {
        // 自动加载
        spl_autoload_register($autoload ?: 'shiroi\library\Loader::autoload', true, true);
        //默认访问驱动
        self::access();
        // Composer 自动加载支持
        if (is_dir(VENDOR_PATH . 'vendor')) {

        }
    }

    /**
     * 默认访问引擎
     * @param string $className
     * @param mixed|string $methodName
     */
    private static function access($className = CLASS_NAME,$methodName = METHOD_NAME)
    {
        $config = Config::load('Config');//加载配置项
        $className = $className?$className:$config['default_controller'];
        $filePath = trim(implode(DS,FILE_PATH),DSS)?implode(DS,FILE_PATH):$config['default_module'];
        $methodName = $methodName?$methodName:$config['default_action'];
        $namespace = DS.$filePath.DS.$className;
        (new $namespace())->$methodName();
    }
}

