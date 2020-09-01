<?php
namespace index;

use shiroi\resource\FileHandle;

class Index
{
    public function index()
    {
        $path = 'G:\Desktop\qqbot';
        $target = 'd:/yftest';
        $get = FileHandle::init($path)->getRawFiles();
        var_dump($get);
    }
}