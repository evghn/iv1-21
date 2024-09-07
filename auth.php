<?php

require_once 'function.php';
$user = null;

if (isset($_GET['token'])) {
    if ($user = $findUser($_GET['token'])) {        
        $user['expire'] < time() && ($user = null);                    
    }
    
    !$user && (header('Location: ' . SCRIPT_MAIN) && exit);
}

return $user;