<?php

    $tokenCreate = fn() => bin2hex(random_bytes(20));

    $addUser = fn(array &$data, string $login, string $password) => 
        $data[$login] = [
            'password' => password_hash($password, PASSWORD_BCRYPT),
            'token' => $tokenCreate(),
            'expire' => time() + TOKEN_EXPIRE,
        ];

    $filePut = fn(array $data) => file_put_contents(FILE_DB, json_encode($data));

    $fileLoad = function() use ($filePut) {
        if (!file_exists(FILE_DB)) {
            $filePut([]);
        }

        return json_decode(file_get_contents(FILE_DB), true);
    };


    $userUpdate = function(array $data, string $login, array $userData) use ($filePut) {
        $data[$login] = $userData;
        $filePut($data);
    };


    $findUser = function(string $token) use($fileLoad) {
        $result = null;
        if ($data = $fileLoad()) {
            if ($user = array_filter($data, fn($val) => $val['token'] == $token)) {
                $login = array_keys($user)[0];
                $data = $user[$login];
                $result = ['login' => $login, ...$data];               
            }
        }

        return $result;
    };
