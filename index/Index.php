<?php
namespace index;

use shiroi\resource\Mysql;

class Index
{
    public function index()
    {
        $db = new Mysql();
        $users = $db->get('user', 1);
        var_dump($users);
    }
}