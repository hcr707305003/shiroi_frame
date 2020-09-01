<?php
namespace shiroi\resource;

class Route
{
    //方法名
    private static $function;
    //类名
    private static $class;
    //文件路径
    private static $file_path;

    //路由获取
    public static function role()
    {
        $path_info = $_SERVER['PATH_INFO'];//目录结构
        self::verify_role($path_info);
        return self::get_parameters();
    }

    //路由验证
    private static function verify_role($route)
    {
        $config = Config::load();//引入配置
        self::$function = basename($route)?:$config['default_action'];//方法名
        $class = dirname($route)?:DS . $config['default_module'] . DS . $config['default_controller'];
        self::$class = str_replace('/','\\',$class);//class名
        self::$file_path = dirname($class);//文件路径
    }

    //文件获取
    public static function get_file_path()
    {
        return self::$file_path;
    }

    //方法名获取
    public static function get_function()
    {
        return self::$function;
    }

    //类名获取
    public static function get_class()
    {
        return self::$class;
    }

    //参数获取
    private static function get_parameters()
    {
        return get_class_vars(self::class);
    }

    //方法获取
    private static function get_methods()
    {
        return get_class_methods(self::class);
    }
}