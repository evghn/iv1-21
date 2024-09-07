<?php
    require_once 'config.php';
    require_once 'function.php';

    if (isset($_POST['login']) && isset($_POST['password'])) {
        $data = $fileLoad();
        $data_url = '';
        if ($data) {
            // add new user
            if (!isset($data[$_POST['login']])) {
                $addUser($data, $_POST['login'], $_POST['password']);
                $filePut($data);    
            } else {
                $data_url = 'error=this user login exist';
            }
        } else {
            $addUser($data, $_POST['login'], $_POST['password']);
            $filePut($data);
        }

        header('Location: ' . SCRIPT_MAIN 
            . ($data_url 
                ? '?' . $data_url
                : '' 
            )
    );
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
                Регистрация
            </button>
        </div>            
    </form>       
</body>

</html>