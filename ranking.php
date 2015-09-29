<?php
session_start();
require_once 'sql.php';
    echo "<table>";
    echo "<tr><td><a href='ranking.php?page=Imie'>imie</a></td>
        <td><a href='ranking.php?page=szybkosc'>szybkosc</a></td>
    <td><a href='ranking.php?page=Siła'>Siła</a></td>
    <td><a href='ranking.php?page=Zręczność'>Zręczność</a></td>
    <td><a href='ranking.php?page=Zycie'>Zycie</a></td>
    <td><a href='ranking.php?page=Pkt_umiejetnosci'>Pkt. umiejetnosci</a></td>
    <td><a href='ranking.php?page=Doswiadczenie'>Doswiadczenie</a></td>
    <td><a href='ranking.php?page=Zloto'>Złoto</a></td>
    <td><a href='ranking.php?page=Poziom'>Poziom</a></td></tr>";

    $pytanie = "select name, '-', '-', '-', live, ap, exp, gold, lvl from `character`";
    $page = $_GET['page'];
    switch($page)
    {
        case 'Imie':
            $pytanie = $pytanie . " order by name";
            break;
        case 'szybkosc':
            $pytanie = $pytanie . " order by speed";
            break;
        case 'Siła':
            $pytanie = $pytanie . " order by str";
            break;
        case 'Zręczność':
            $pytanie = $pytanie . " order by agi";
            break;
        case 'Zycie':
            $pytanie = $pytanie . " order by live";
            break;
        case 'Pkt_umiejetnosci':
            $pytanie = $pytanie . " order by ap";
            break;
        case 'Doswiadczenie':
            $pytanie = $pytanie . " order by exp";
            break;
        case 'Zloto':
            $pytanie = $pytanie . " order by gold";
            break;
        case 'Poziom':
            $pytanie = $pytanie . " order by lvl";
            break;
        default:
            echo 'popsulo sie';
            break;
    }
    $tab = GetPacket($pytanie);

$keys = array_keys($tab);

for($i = 0; $i < count($tab); $i++) {

    echo "<tr>";
    foreach($tab[$keys[$i]] as $key => $value) {

        echo "<td>" .  $value ."  </td>";

    }
    echo "</tr>";


}
    /*foreach ($tab as $row => $data);{
    foreach ($data[$i] as $klucz => $dane)
{
    echo "<p>  $dane </p>";
    //echo "<td>" .  $dane ."  </td>";
    //echo $dane;
}}*/
//print("<pre>".print_r($tab,true)."</pre>");
echo "</tr></table> <p><a href='main.php'>Cofnij</a> </p>";
?>
