<?php

namespace app;

use app\models\A;
use app\models\Lib\A as A2;



$objA = new A();
// // $objB = new B();
$objALib = new A2();

var_dump($objA->a, $objALib->a);
