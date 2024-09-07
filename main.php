<?php
    require_once 'config.php';
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <?php if (!$auth): ?>
        <div>
            <a href="signin.php">Авторизация</a>
        </div>
        <div>
            <a href="register.php">Регистрация</a>
        </div>
    <?php else: ?>
        <div>
            Hello: <?= $auth['login'] ?>
            <div><?php include 'logoutForm.php' ?></div>
        </div>
    <?php endif ?>    
    <div>
        <?= isset($_GET['error']) ? $_GET['error'] : '' ?>
    </div>
</body>
</html>