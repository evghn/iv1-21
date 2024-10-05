<?php

class Card
{
    public string $ID = '';
    public string $CIV = '';
    public string $bankName = '';
    public string $expire = '';
    public string $owner = '';
    public string $type = '';
        
    
    private string $pin = '';
    private float $balance = 0;

    public function __construct(array $data)
    {
        Assist::attributesLoad($this, $data);
        $this->ID = Assist::generateData(16);
        $this->CIV = Assist::generateData(3, true);
        $this->pin = Assist::generateData(4, true);
    }

    public function getInfo(): array
    {
        return [
            ...Assist::objectInfo($this),
            'balance' => $this->getBalance()
        ];
    }

    public function chengePin(string $pin): void
    {
        $this->pin = $pin;
    }


    public function addMoney(int $value): bool
    {
        $this->balance += $value;
        return true;
    }


    public function removeMoney(int $value): bool
    {
        if ($value <= $this->balance) {
            $this->balance -= $value;
            return true;
        }
        return false;
    }

    public function getBalance(): float
    {
        return $this->balance;
    }



    

    // private function generateID(): void
    // {
    //     $this->ID = 
    // }



}
