<?php
    require_once 'config.php';
    require_once 'function.php';

    if (isset($_GET['login']) && isset($_GET['password'])) {
        !file_exists(FILE_DB) && file_put_contents(FILE_DB, '');
        
        $data = json_decode(file_get_contents(FILE_DB), true);
        if ($data) {

        } else {
            $addUser($data, $_GET['login'], $_GET['password']);
            file_put_contents(FILE_DB, json_encode($data));
        }

        header('Location: ' . SCRIPT_MAIN);
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
    <form action="">        
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