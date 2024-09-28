<?php

require_once __DIR__ .  "/autoload/autoload.php";


// $atms = [];

// for ($i = 0; $i < 100; $i++) {
//     $atm = new ATM();
//     $atms[] = $atm;
// }

$atm = new ATM([
    'countryMade' => 'Russia',    
    'cashType' => 'rub',
    'model' => 'm1',
    'OS' => 'linux',
    'dimensions' => [
        'width' => 600,
        'height' => 1700,
        'depth' => 1000,
     ],
    'weight' => 235.25,
    'data' => 10,
    'applyCardType' => [
        'VISA', 
        'mastercard',
    ]
]);



$atm2 = new ATM([
    'countryMade' => 'Russia',    
    'cashType' => 'rub',
    'model' => 'm1',
    'OS' => 'linux',
    'dimensions' => [
        'width' => 600,
        'height' => 1700,
        'depth' => 1000,
     ],
    'weight' => 235.25,
    'data' => 10,
]);


// var_dump(__LINE__);
// unset( $atm);

// var_dump($atm2->info());

$atm2->changeOS('windows XP');

$atmV2 = new ATMv2([
    'countryMade' => 'Russia',    
    'cashType' => 'rub',
    'model' => 'm2',
    'OS' => 'linux',
    'dimensions' => [
        'width' => 600,
        'height' => 1700,
        'depth' => 1000,
     ],
    'weight' => 240,
    'applyCardType' => [
        'VISA', 
        'mastercard',
        'mir'
    ]    
]);

$card = new Card([    
    'bankName' => 'Bank',
    'expire' => '12/29',
    'owner' => 'card holder',
    'type' => 'mir',
]);

// var_dump($card->getInfo());
$atmV2->cardLoad($card);
echo $atmV2->info();
var_dump($atmV2->getCardInfo());
$atmV2->addCardMoney(1000);
var_dump($atmV2->getCardBalance());
var_dump($atmV2->issuingMoney(1200));
var_dump($atmV2->issuingMoney(900));
var_dump($atmV2->getCardBalance());
// var_dump($atm, $atm2, $atmV2);
// var_dump($atm->getOS(), $atm2->getOS(), $atmV2->getOS());
// $atm2->ID = 'hack';
// var_dump($atm->info());
// echo $atmV2->info();

// $atms = [];
// for ($i = 0; $i < 5000; $i++) {
//     // $_atm = new ATM();
//     // var_dump($_atm->getID());    
//     var_dump((new ATM())->getID());   
// }

// var_dump($atmV2->getClassInfo());
// var_dump(ATMv2::getClassInfo());
// var_dump(ATMv2::$version);

/**
 * class
 * object
 * public 
 * protected (wold class)
 * private (visible in self class)
 * static (in self class)
 */