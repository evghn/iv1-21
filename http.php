<?php
     
    // ini_set('output_buffering', 0);
    // phpinfo(); die;

    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
        file_put_contents('message.db', $_POST['message'] . "\n", FILE_APPEND);
        header('Location: ' . $_SERVER['SCRIPT_NAME']);
        exit;
    }

    $message = file_exists('message.db') 
        ? implode('', array_map(
            fn($val) => '<div style="border: 1px solid navy; padding: 7px; margin-bottom: 10px;">' . $val . '</div>',
            file('message.db'))
        )
        : ''
    ;

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <!-- <form action="" method="post">
        <textarea name="message"></textarea>
        <input type="submit" name='btn'>
    </form> -->
    
</form>
    <div><?= $message ?></div>
</body>
</html>