<?php
    require_once 'config_post.php';
    if (empty($_SESSION['login'])) {
        header('Location:' . $_SESSION['script_main']);
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
    <div>Page 2</div>
    <?php require_once 'form_post.inc.php' ?>
    <a href="<?= $_SESSION['script_main'] ?>">main</a>
</body>
</html>
