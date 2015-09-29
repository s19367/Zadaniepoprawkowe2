<?php
require_once 'sql.php';
if(isset($_POST['login']))
{
    con();
    $login = $_POST['login'];
    $email = $_POST['mail'];
    $haslo = $_POST['pass'];
    $zapytanie = "insert into user set
	login = '$login',
	pass = '$haslo',
	mail = '$email' ";
    $result = mysql_query($zapytanie);
    if (!$result)
    {
        echo mysql_error();
        return false;
    }
    else
    {
        ?>
        <p>Rejestracja zakończona sukcesem</p>
<?php
    }
}
?>
<form name="reg" id="reg" method="post" action="">
    <p>
        <label>Nick: </label>
        <input name="login" type="text">
    </p>
    <p>
        <label>Haslo: </label>
        <input name="pass" type="password">
    </p>
    <p>
        <label>E-mail</label>
        <input name="mail" type="email">
    </p>
    <p>
        <button type="submit">ok</button>
    </p>
</form>