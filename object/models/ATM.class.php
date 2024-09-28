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
    public array $applyCardType = [];

    private static array $IDs = [];
    private ?object $card = null;

    private const TM = 'ATM Corp.';


    public function __construct(array $data = [])
    {
        // if (!empty($data)) {
        //     foreach ($data as $field => $value) {
        //         isset($this->$field) && ($this->$field = $value);
        //     }
        // }
        Assist::attributesLoad($this, $data);
        
        // var_dump(__LINE__, $this); 
        $this->setID();
        // var_dump(__LINE__, $this); 

    }

    public function info(): string|array
    {
        return [...Assist::objectInfo($this), 'TM' => self::TM];
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
        $id = Assist::generateData($count);
        // $id = 1;        
        if (in_array($id, self::$IDs)) {
            $id = $this->generateID($count+1);
        } 
        self::$IDs[] = $id;        

        return $id;
    }

    public function cardLoad(object $card): bool
    {   
        if ($result = in_array($card->type, $this->applyCardType)) {
            $this->card = $card;
        } else {
            $this->card = null;
        }
        
        return $result;
    }


    public function getCardInfo(): string|array
    {
        if (is_null($this->card)) {
            return 'card empty';
        }
        return $this->card->getInfo(); 
    }


    public function issuingMoney(int $value): string
    {
        // if (!is_null($this->card) && $this->card->removeMoney($value)) {
        if ($this->card?->removeMoney($value)) {
            return "The money has been issued";
        } else {
            return "Money withdrawal error";
        }
    }

    public function addCardMoney(int $value): string|bool
    {
        if (!is_null($this->card)) {
            return $this->card->addMoney($value);
        } else {
            return "add Money error";
        }
    }

    
    public function getCardBalance(): float|null
    {
        if (!is_null($this->card)) {
            return $this->card->getBalance();            
        }

        return null;
    }



    public function __destruct()
    {
        // echo 'object ATM is die...';
    }    
}
