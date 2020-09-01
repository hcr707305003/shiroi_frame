<?php
namespace shiroi\resource;

class Loader
{
    //自动加载
    public static function autoload($class)
    {
        //判断是否为空传参
        if(!empty($class)){
            self::loadFile($class);//文件加载
        }
    }

    //注册
    public static function register($autoload = null)
    {
        // Composer自动加载支持
        self::composer_load();
        // 注册系统自动加载
        spl_autoload_register($autoload ?: 'shiroi\\resource\\Loader::autoload', true, true);
        //路由设置
        $router = Route::role();
        //默认访问引擎
        $class = new $router['class']();
        if(method_exists($class,$router['function'])){
            $function = $router['function'];
            $class->$function();
        }
    }

    //加载文件
    public static function loadFile($file)
    {
        $file_path = APP_PATH . $file . EXT;
        if(file_exists($file_path)){
            require $file_path;
        }else{
            echo '文件不存在!';exit();
        }
    }

    /**
     * 加载composer文件
     */
    private static function composer_load()
    {
        if (is_dir(rtrim(VENDOR_PATH,'/'))) {
            if(file_exists(VENDOR_PATH . '/autoload' . EXT)){
                require VENDOR_PATH . '/autoload' . EXT;
            }
        }
    }
}