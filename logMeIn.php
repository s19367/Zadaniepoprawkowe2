<?php
require_once 'sql.php';
session_start();
if(isset($_POST['login']))
{
    con();
    $login = $_POST['login'];
    $haslo = $_POST['pass'];
    $pytanie = mysql_num_rows(mysql_query("select * from user where login = '$login' and pass = '$haslo'"));
    if($pytanie == 1)
    {
        echo("zalogowałeś się");
        $_SESSION['zalogowany'] = $login;
    }
    else
    {
        echo("Błędne dane logowania, spróbuj ponownie");
    }
    echo " <a href='main.php'>ok</a>";
}
?>
<form name="log" id="log" method="post" action="">
    <p>
        <label>Login: </label>
        <input name="login" type="text">
    </p>
    <p>
        <label>Hasło: </label>
        <input name="pass", type="password">
    </p>
    <p>
        <button type="submit">ok</button>
    </p>
</form>