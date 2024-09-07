<?php
    require_once 'config.php';
    require_once 'function.php';

         
    if (isset($_POST['login']) && isset($_POST['password'])) {
        $url_data = '';
        if ($data = $fileLoad()) {
            if (isset($data[$_POST['login']])) {
                $user = $data[$_POST['login']];
                if (password_verify($_POST['password'], $user['password'])) {
                    $user['expire'] = time() + TOKEN_EXPIRE;
                    $user['token'] = $tokenCreate();
                    $userUpdate($data, $_POST['login'], $user);
                    $url_data = 'token=' . $user['token'];
                } else {
                    $url_data = 'error=user not found!';
                }
            } else {
                $url_data = 'error=user not found!';
            }
        }       
            
        header('Location: ' 
                . SCRIPT_MAIN 
                . '?' . $url_data);
        exit;
    }    
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>  
        <form action="" method="post">           
                <div>
                    <label>
                        Логин:
                        <input type="text" name="login">
                    </label>
                </div>
                <div>
                    <label>
                        Пароль:
                        <input type="text" name="password">
                    </label>
                </div>
           
                <div>
                    <button type="submit" name='form-btn'>                        
                        Войти                        
                    </button>
                </div>            
        </form>
    <a href="<?= SCRIPT_MAIN ?>">Назад</a>
</body>
</html>