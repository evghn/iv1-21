<?php
require_once 'config.php';
require_once 'function.php';

/*
    передача токена через форму
if (isset($_POST['token'])) {
    if ($user = $findUser($_POST['token'])) {               
        $user['token'] = null;
        $user['expire'] = null;
        $login = $user['login'];        
        unset($user['login']);        
        $userUpdate($fileLoad(), $login, $user);
    }
}
    
*/
//передача токена через url
if (isset($_GET['token'])) {
    if ($user = $findUser($_GET['token'])) {               
        $user['token'] = null;
        $user['expire'] = null;
        $login = $user['login'];        
        unset($user['login']);        
        $userUpdate($fileLoad(), $login, $user);
    }
}



header('Location: ' . SCRIPT_MAIN);
exit;