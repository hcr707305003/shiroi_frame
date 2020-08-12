<?php
/*
 * @Descripttion: 
 * @Author: Shiroi
 * @Date: 2020-07-28 14:18:44
 * @LastEditors: Shiroi
 * @site: https://shiroi.top
 * @mail: 707305003@qq.com
 */ 

namespace shiroi\library;

 class Config
 {
     private static $config = [];//配置项
     /**
     * 加载配置文件（PHP格式）
     * @access public
     * @param  string $file  配置文件名
     * @param  string $name  配置名（如设置即表示二级配置）
     * @param  string $range 作用域
     * @return mixed
     */
    public static function load($file='', $name = '', $range = '')
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
     public static function set($name, $value = null)
     {
         if(!empty($value)){
             self::$config = $name[$value];
         }else{
             self::$config = $name;
         }
         return self::$config;
     }
 }