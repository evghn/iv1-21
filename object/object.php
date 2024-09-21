<?php

class ATM 
{
    public int $cashValue = 1000000;
    public string $countryMade = '';
    public bool $state = false;
    protected string $ID = '';
    public string $cashType = '';
    public string $model = '';
    public string $OS = '';
    public array $dimensions = [
        'width' => 0,
        'height' => 0,
        'depth' => 0,
    ];
    public float $weight = 0;
    public string $display = 'VGA';

    private static array $IDs = [];


    public function __construct(array $data = [])
    {
        if (!empty($data)) {
            foreach ($data as $field => $value) {
                isset($this->$field) && ($this->$field = $value);
            }
        }
        
        // var_dump(__LINE__, $this); 
        $this->setID();
        // var_dump(__LINE__, $this); 

    }

    public function info(): string|array
    {
        return get_object_vars($this);
    }


    public function changeOS(string $OS): void
    {
        $this->OS = $OS;
    }


    public function getOS(): string
    {
        return "ID:" . $this->ID . " OS: " . $this->OS;
    }

    public function setID(): void
    {
        $this->ID = $this->generateID(1);
    }


    public function getID()
    {
        return $this->ID;
    }

    private function generateID($count)
    {
        $id = bin2hex(random_bytes($count));
        // $id = 1;        
        if (in_array($id, self::$IDs)) {
            $id = $this->generateID($count+1);
        } 
        self::$IDs[] = $id;        

        return $id;
    }

    public function __destruct()
    {
        // echo 'object ATM is die...';
    }    
}


class ATMv2 extends ATM
{
    public string $display = 'LED';
    public static $version = 'V2';

    // overload
    public function info(): string|array
    {
        return $this->array_implode('<br>', parent::info());
    }


    private function array_implode(string $glue, array $data): string
    {
        // var_dump($data);
        return implode(
            $glue,
            array_map(
                fn($key, $val) => 
                    "$key =>"
                            . (is_array($val)
                                ? "[" . $this->array_implode(' ', $val) . "]"
                                : $val), 
                array_keys($data),
                array_values($data)
            )
        );
        // $result = "";
        // foreach ($data as $key => $val) {
        //     $result .= "$key =>"
        //                     . (is_array($val) 
        //                         ? " [ " . $this->array_implode(' ', $val) . "]"
        //                         : $val)
        //                     . ",<br>";
        // }

        // return $result;
    }



    public static function getClassInfo()
    {
        return self::class;
    }

    

}   

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
]);

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
var_dump(ATMv2::getClassInfo());
var_dump(ATMv2::$version);

/**
 * class
 * object
 * public 
 * protected (wold class)
 * private (visible in self class)
 * static (in self class)
 */