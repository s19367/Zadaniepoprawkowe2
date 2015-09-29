<?php
session_start();
$login = $_SESSION['zalogowany'];
require_once 'sql.php';
$pytanie = "select nazwa, bonus, minus, cena from items";


$tab = GetPacket($pytanie);

$keys = array_keys($tab);
echo "<table>";
for($i = 0; $i < count($tab); $i++) {

    echo "<tr>";
    foreach ($tab[$keys[$i]] as $key => $value) {
        echo "<td>" . $value . "  </td>";

    }
    echo "<td>" . "<a href='bazar.php?item=$i'>kup</a>" . "  </td>";
    echo "</tr>";
}
echo "</table>";

$item = $_GET['item'];
if(isset($item)) {
    $money = GetValue("select gold from `character` cha join user us on cha.userid=us.id where us.login = '$login'");
    $koszt = GetValue("select cena from items where id = '$item' ");
    if ($koszt > $money)
        echo "<p>Nie stac Cie !</p>";
    else {
        $id = GetValue("select ID from user where login = '$login'");
        $pytanie ="insert into inventory set charid = '$id',
                    itemid = '$item',
                    `use` = 'FALSE'";
        echo "<p> $pytanie </p>";
        ex($pytanie);
        $gold = $money - $koszt;
        ex("update `character` set gold='$gold' where userid = '$id'");
        echo "<p>Zakup zakonczony sukcesem</p>";
    }
}
echo "<a href='main.php'>Wroc</a>"

?>