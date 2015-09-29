<?php
require_once 'sql.php';
header('Content-Type: text/html; charset=utf-8');
session_start();
$login = $_SESSION['zalogowany'];
$loginId = GetValue("select `id` from user where login = '$login'");
echo "<table>";
$tab = GetPacket("select speed, str, agi, live from `character` where userid = '$loginId'");
$stat = array('Szybkość', 'siła', 'Zręczność', 'Życie');
$i = 0;
foreach($tab[0] as $row)
{

    echo "<tr><td>$stat[$i]</td>";
    echo "<td>" . $row ."  </td>";
    echo "<td><a href='staty.php?stat=$i'>+</a> </td></tr>";
    $i++;
}
echo "</table>";

$statsik = $_GET['stat'];
$licz = $tab[0][$statsik] + 1;
$AP = GetValue("select ap from `CHARACTER` where userid='$loginId'");
echo "<p>AP: $AP</p>";
if (isset($statsik) && $AP >0)
{
    $AP--;
        switch ($statsik)
    {
        case 0:
                ex("update `character` set speed = $licz, ap=$AP where userid='$loginId'");
                break;
            case 1:
                ex("update `character` set str = $licz, ap=$AP where userid='$loginId'");
                break;
            case 2:
                ex("update `character` set agi = $licz, ap=$AP where userid='$loginId'");
                break;
            case 3:
                $licz = $licz + 9;
                ex("update `character` set livemax = $licz, live = $licz, ap=$AP where userid='$loginId'");
                break;
            default:
                echo "<p>Popsiłueś =(</p>";
                break;
    }
}
else
    echo "<p>Nie masz wystarczająco dużo pkt. umiejętności!</p>";
?>
<p><a href="Main.php">Wróć</a></p>