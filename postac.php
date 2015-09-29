<?php
require_once 'sql.php';
session_start();
if (isset($_POST['speed']))
{
    con();
    $speed = $_POST['speed'];
    $str = $_POST['str'];
    $agi = $_POST['agi'];
    $live = $_POST['live'];
    $login = $_SESSION['zalogowany'];
    $pytanie = "select ID from user where login = '$login'";
    $id = GetValue($pytanie);
    $pytanie = "insert into `character` set
    name = '$login',
    speed = '$speed',
    str='$str',
    agi = '$agi',
     live = '$live',
     livemax = '$live',
     ap = 0,
     lvl = 0,
     exp = 0,
     expmax= 100,
     userid = '$id'
    ";
    //echo $pytanie;
    $result = GetValue($pytanie);
    echo "<a href = 'main.php'>ok </a>";
}
?>
<meta charset="utf-8" />
<table>

    <form name="wiedzmin" action="" method="post" >
        <tr>
            <td>
                <label>Witcher</label>
                <br></td></tr><tr><td>
                <label>Szybkosc:</label>
                <input name="speed" id="speed" type="text"> </input>
                <br></td><td>
                <label>Siła:</label>
                <input name="str" type="text"> </input>
                <br></td><td>
                <label>Zręczność:</label>
                <input name="agi" type="text"> </input>
                <br></td><td>
                <label>Życie:</label>
                <input name="live" type="text"> </input>
                <br></td>
        </tr><tr>
        <button type="submit">ok</button>
    </form>
</table>