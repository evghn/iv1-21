<?php

class ATMv2 extends ATM implements INFCScan, IQR
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


    public function nfcScan(object $card)
    {
        // nfc - ?
    }

    public function qrScan(object $card) 
    {
        
    }
}
