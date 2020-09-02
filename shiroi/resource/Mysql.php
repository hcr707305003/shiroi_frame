<?php
namespace shiroi\resource;

class Mysql extends \MysqliDb
{
    public function __construct()
    {
        parent::__construct(Config::load('database',strtolower(basename(__CLASS__))));
    }
}