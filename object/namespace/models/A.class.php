<?php

namespace app\models;

class A 
{ 
    public $a = 1;

    
    function info()
    {
        return __DIR__ . ' => ' . __METHOD__;
    }
}
