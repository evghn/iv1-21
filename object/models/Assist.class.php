<?php

class Assist
{
    public static function attributesLoad(object $obj, array $data): void
    {
        if (!empty($data)) {
            foreach ($data as $field => $value) {
                isset($obj->$field) && ($obj->$field = $value);
            }
        }
    }


    public static function generateData(int $count, bool $digital = false): string
    {
        $data = bin2hex(random_bytes($count));
        if ($digital && !preg_match('/^\d+$/', $data)) {
            $data = self::generateData($count, $digital);            
        }
        if ($digital) {
            $data = substr($data, 0, $count);
        }

        return $data;
    }


    public static function objectInfo(object|null $object): array|null
    {
        if (!is_null($object)) {
           return get_object_vars($object); 
        } else {
            return null;
        }        
    }
}
