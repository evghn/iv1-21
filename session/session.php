<?php
    require_once 'config_post.php';
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <?php require_once 'form_post.inc' ?>
    <?php if (isset($_SESSION['login'])): ?>
        <a href="page2.php">page 2</a>
    <?php endif ?> 
</body>
</html>
