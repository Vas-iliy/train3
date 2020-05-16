<?php
session_start();
$connecting = new PDO('mysql:host=localhost; dbname=test3', 'root', 'root');
$add = $connecting->query("SELECT * FROM admin");

if ($_POST['login']) {
    $login = $_POST['login'];
    $password = $_POST['password'];
    $arr = [];
    foreach ($add as $value) {
        if ($login == $value['login'] and $password == $value['password']) {
            $_SESSION['login'] = $login;
            $_SESSION['password'] = $password;
            header("Location:admin.php");
        }
    }
    echo 'Неверный логин или пароль';
}

?>


<form method="post">
    <input type="login" name="login" required placeholder="Логин"><br/>
    <input type="password" name="password" required placeholder="Пароль"><br/>
    <input type="submit">
</form>
