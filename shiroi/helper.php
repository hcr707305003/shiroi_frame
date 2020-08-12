<?php
//自动加载模块
spl_autoload_register(function($name){include_once APP_ROOT . DSS . str_replace("\\",'/',$name) . EXT;});