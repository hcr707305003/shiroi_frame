<?php
namespace shiroi\resource;

class Config
{
    private static $config = [];//配置项

    /**
     * 加载配置文件（PHP格式）
     * @access public
     * @param  string $file  配置文件名
     * @param  string $name  配置名（如设置即表示二级配置）
     * @return mixed
     */
    public static function load($file='config', $name = '')
    {
        $filePath =  CONFIG_PATH.$file.EXT;
        $contents = [];
        if(file_exists($filePath)) {
            $contents = self::set(include $filePath, $name);
        }
        return $contents;
    }

    /**
     * 设置配置参数 name 为数组则为批量设置
     * @access public
     * @param  string|array $name  配置参数名（支持二级配置 . 号分割）
     * @param  mixed        $value 配置值
     * @return mixed
     */
    public static function set($name,$value=null)
    {
        if(!empty($value)){
            self::$config = $name[$value];
        }else{
            self::$config = $name;
        }
        return self::$config;
    }
}