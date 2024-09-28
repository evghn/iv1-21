<?php
namespace app\models\Lib;


class A 
{
    public $a = 2;

    function info()
    {
        return __DIR__ . ' => ' . __METHOD__;
    }
}
