<?php
session_start();
if (!$_SESSION['login']) {
    header("Location:login.php");
}

if ($_POST['exit']) {
    session_destroy();
    header("Location:login.php");
}

$connecting = new PDO('mysql:host=localhost; dbname=test3', 'root', 'root');
$add = $connecting->query("SELECT * FROM forum WHERE moderation = '0' ORDER BY time DESC ");

if ($_POST) {
    header("Location:admin.php");
}
?>

<form method="post">
    <? foreach ($add as $text) {?>
    <select name="<?=$text['id']?>" id="<?=$text['id']?>">
        <option value="ok">Принять</option>
        <option value="no">Отклонить</option>
    </select>

    <label for="<?=$text['id']?>">
        <? echo $text['login'] . ' написал: ' . $text['text']?> <br/>
    </label>
    <?}?>
    <input type="submit" name="go" value="Модерировать">
</form>

<form action="">
    <input type="submit" value="Выйти" name="exit">
</form>

<?
foreach ($_POST as $num=>$checked) {
    if ($checked == 'ok') {
        $connecting->query("UPDATE forum SET moderation = 'ok' WHERE id = '$num'");
    } else {
        $connecting->query("UPDATE forum SET moderation = 'no' WHERE id = '$num'");
    }
}
?>