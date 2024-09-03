<?php

    $addUser = fn(&$data, $login, $password) => 
        $data[$login] = [
            'password' => password_hash($password, PASSWORD_BCRYPT),
            'token' => bin2hex(random_bytes(20)),
        ];
