<?php
    session_start();
    $_SESSION['value'] = $_SESSION['value'] ?? 0;

    if ($_SERVER['REQUEST_METHOD'] == 'POST') { 
        if (isset($_POST['pluse'])) {
            $_SESSION['value']++;
        } else {
            $_SESSION['value'] -= 2;
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
    <title>Document</title>
</head>
<body>
    <?php $_SESSION['value']++ ?>

    <form action="" method="post">
        <button type="submit" name="pluse">+2</button>
        <span><?= $_SESSION['value'] ?></span>
        <button type="submit" name="minus">-</button>
    </form>
</body>
</html>