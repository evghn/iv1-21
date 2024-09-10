<?php
$login = isset($_COOKIE['login']) 
            ? $_COOKIE['login'] 
            : '';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    if (! isset($_POST['logout'])) {
       $login = $_POST['login'];  
       setcookie('login', $login, time() + 15);  
    } else {
        // logout
        // setcookie('login', $login);  
        setcookie('login', $login, time() - 5);  
    }
       
    header('Location: ' . $_SERVER['SCRIPT_NAME']);
    exit;
}


?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="refresh" content="5">
    <title>Document</title>
</head>
<body>
<form action="" method="POST">
    <?php if (! $login): ?> 
        Login: <input type="text" name="login" />    
        <br />
        <input type="submit" value="Вход" />
    <?php else: ?>
        <input type="submit" name="logout" value="Выход" />    
    <?php endif ?>
</form>
<?php
    var_dump($login);
?>
</body>
</html>



