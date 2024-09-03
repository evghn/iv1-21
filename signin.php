<?php
    define('USER_PASSWORD', password_hash('123', PASSWORD_BCRYPT));
    const USER_LOGIN = 'user';
    $auth = isset($_GET['token']);
      
    if (isset($_GET['login']) && isset($_GET['password'])) {
        if ($_GET['login'] == USER_LOGIN 
            &&  password_verify($_GET['password'], USER_PASSWORD)) {
                header('Location: ' 
                    . $_SERVER['SCRIPT_NAME'] 
                    . '?token=' . bin2hex(random_bytes(16)));
                exit;
            }
        
    } else {
        if (isset($_GET['form-btn'])) {
            header('Location: ' . $_SERVER['SCRIPT_NAME']);
            exit;
        }  
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

    <a href="<?= $_SERVER['SCRIPT_NAME']?>?param=2">link</a>
    
        <form action="">
            <?php if (!$auth): ?>
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
            <?php endif ?>
                <div>
                    <button type="submit" name='form-btn'>
                        <?= $auth 
                                ? "Выход"
                                : "Войти"
                        ?>
                    </button>
                </div>            
        </form>
    <a href="main.php">Назад</a>
</body>

</html>