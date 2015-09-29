<?php
header('Content-Type: text/html; charset=utf-8');
require_once 'sql.php';
session_start();
$login = $_SESSION['zalogowany'];
$login = getValue("select id from user where login='$login'");
$pytanie = "select nazwa, bonus, minus from items it join inventory inv on it.id = inv.itemId where inv.charId='$login' and it.itemType=0 and inv.use=0";
$tab = GetPacket($pytanie);
$keys = array_keys($tab);
echo "<p>Bronie:</p><table>";
echo "<tr><td>nazwa</td><td>bonus</td><td>minus</tr><tr>";

for($i = 0; $i < count($tab); $i++)
{
    echo' <tr>';
    foreach ($tab[$keys[$i]] as $key => $value)
    {
        $itemId = GetPacket("select it.id from items it join inventory inv on it.id = inv.itemId where inv.charId='$login' and it.itemType=0 and inv.use=0");
        echo "<td>" . $value . "  </td> ";
    }echo "<td> <a href = inventory.php?item=". $itemId[$i][0] .">Załóż</a></td></tr>";
}

$pytanie = "select nazwa, bonus, minus from items it join inventory inv on it.id = inv.itemId where inv.charId='$login' and it.itemType=1 and inv.use=0";
$tab = GetPacket($pytanie);
$keys = array_keys($tab);
echo "</tr></table><p>Pancerze:</p><table>";
echo "<tr><td>nazwa</td><td>bonus</td><td>minus</tr><tr>";
for($i = 0; $i < count($tab); $i++)
{
    echo' <tr>';
    foreach ($tab[$keys[$i]] as $key => $value)
    {
        $itemId = GetPacket("select it.id from items it join inventory inv on it.id = inv.itemId where inv.charId='$login' and it.itemType=1 and inv.use=0");
        echo "<td>" . $value . "  </td> ";
    }echo "<td> <a href = inventory.php?item=". $itemId[$i][0] .">Załóż</a></td></tr>";
}echo "</table>";
$item = $_GET['item'];
if (isset($item))
{
    ex("update inventory set `use` = TRUE where charid = '$login' and id = '$item'");
}
?>
<a href="Main.php">Wroc</a>

