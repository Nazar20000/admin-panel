<?php
session_start();

if (isset($_POST['login'])) {
    $username = $_POST['username'];
    $password = $_POST['password'];

    if ($username === 'admin' && $password === 'admin') {
        $_SESSION['loggedin'] = true;
        header('Location: index.php');
    } else {
        $error = 'Неправильные учетные данные';
    }
}

if (isset($_GET['logout'])) {
    session_destroy();
    header('Location: login.php');
}
?>
