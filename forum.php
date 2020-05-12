<?php
$connecting = new PDO('mysql:host=localhost; dbname=test3', 'root', 'root');
$data = $connecting->query("SELECT * FROM forum WHERE moderation = 'ok' ORDER BY time DESC ");

if ($_POST['login']) {
    $login = $_POST['login'];
    $text = $_POST['text'];
    $connecting->query("INSERT INTO forum (login, text) VALUES ('$login', '$text')");
}

if ($_POST) {
    header("Location:forum.php");
}

?>


<form method="post">
    <input type="login" name="login" required placeholder="Логин"> <br/>
    <textarea type="text" name="text" required placeholder="Текст" id="" cols="30" rows="10"></textarea> <br/>
    <input type="submit">
</form>

<h2>Чат</h2>
<h3>Все сообщения проходят модерацию</h3>
<?
if ($data) {
    foreach ($data as $text) {
?>

<div><? echo $text['time'] . ' ' . $text['login'] . ' написал: ' . $text['text']?></div>

<? }}?>