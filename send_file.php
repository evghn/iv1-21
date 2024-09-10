<?php
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    var_dump($_FILES);
    $uploadfile = basename($_FILES['userfile']['name']);

    // echo '<pre>';
    if (move_uploaded_file($_FILES['userfile']['tmp_name'], $uploadfile)) {
        echo "Файл не содержит ошибок и успешно загрузился на сервер.\n";
    } else {
        echo "Возможная атака на сервер через загрузку файла!\n";
    }
    
    die;
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
<form enctype="multipart/form-data" action="" method="POST">
    Login: <input type="text" name="login">    
    <br>
    Отправить файл: <input name="userfile" type="file" />
    <input type="submit" value="Отправить файл" />
</form>

</body>
</html>