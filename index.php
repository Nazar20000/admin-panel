<?php
session_start();
if (!isset($_SESSION['loggedin'])) {
    header('Location: login.php');
    exit;
}
?>
<!DOCTYPE html>
<html>
<head>
    <title>Управление пользователями</title>
    <link rel="stylesheet" type="text/css" href="css/styles.css">
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="js/scripr.js"></script>
</head>
<body>
    <div class="container">
        <h1>Управление пользователями</h1>
        <form id="createUserForm">
            <input type="text" name="name" placeholder="Имя" required>
            <input type="email" name="email" placeholder="Электронная почта" required>
            <input type="password" name="password" placeholder="Пароль" required>
            <button type="submit">Создать пользователя</button>
        </form>
        <table id="userTable">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Имя</th>
                    <th>Электронная почта</th>
                    <th>Дата создания</th>
                    <th>Действия</th>
                </tr>
            </thead>
            <tbody>
            </tbody>
        </table>
        <a class="logout-link" href="auth.php?logout">Выйти</a>
    </div>
</body>
</html>
