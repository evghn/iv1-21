<?php
    require_once 'config_post.php';

    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
        if (isset($_POST['sign-in'])) {
            $_SESSION['login'] = $_POST['login'];
        }
        
        if (isset($_POST['logout'])) {
            unset($_SESSION['login']);
        }
    }

    header('Location: ' . $_SESSION['script_main']);
    exit;
