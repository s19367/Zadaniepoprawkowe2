<?php
session_start();
require_once 'sql.php';
require_once 'witcher.php';
include_once 'creature.php';
include_once 'eliksir.php';
header('Content-Type: text/html; charset=utf-8');
if(!isset($_SESSION['zalogowany'])) {
    ?>
    <html lang="pl">
    <head>
        <meta charset="utf-8">
    </head>
    <p><a href="logMeIn.php">Zaloguj sie</a></p>

    <p><a href="rejestracja.php">Rejestracja</a></p>

    <p>

    <form name="logowanie" id="logowanie" method="post"
    </p>
    <style>
        table, th, td, tr {
            border: 1px solid black;
        }
    </style>
    <body>
<?php
}
else
{
    /*$speed = $_POST['speed'];
    $str = $_POST['str'];
    $agi = $_POST['agi'];
    $live = $_POST['live'];*/
    con();
    $login = $_SESSION['zalogowany'];
    $pytanie = "SELECT cha.* FROM `character` cha join user us on cha.userId = us.ID  WHERE cha.userid = (select id from user where login = '$login')";
    $res = GetValue($pytanie);
    if (!is_null($res))
    {
        $odp= GetPacket($pytanie);


       // print("<pre>".print_r($odp,true)."</pre>");
        $i = -1;
        echo "<table>";
        echo "<tr><td>Imie</td><td>Szybkosc</td><td>Siła</td><td>Zręczność</td><td>Życie</td><td>Zycie max</td><td>Pkt. umiejetnosci</td><td>Poziom</td><td>Doswiadczenie</td><td>Doswiadczenie Max</td><td>Gold</td></tr><tr>";
        foreach($odp[0] as $row)
        {
            $i++;
            if ($i==0 or $i==11)
                continue;
            $witch[] = $row;
            echo "<td>" . $row ."  </td>";
        }
        echo "</tr></table>";
        $loginId = getValue("select `id` from user where login='$login'");
        $pytanie = "select nazwa, bonus, minus from items it join inventory inv on it.id = inv.itemId where inv.charId='$loginId' and inv.use=1";
        $tab = GetPacket($pytanie);
        $keys = array_keys($tab);
        echo "<p>Wyposażenie:</p><table>";
        echo "<tr><td>nazwa</td><td>bonus</td><td>minus</tr><tr>";

        for($i = 0; $i < count($tab); $i++)
        {
            echo' <tr>';
            foreach ($tab[$keys[$i]] as $key => $value)
            {
                echo "<td>" . $value . "  </td> ";
            }//echo "<td> <a href = inventory.php?item=". $itemId[$i][0] .">Załóż</a></td></tr>";
        }echo "</table>";
        $bonusSTR = GetValue("SELECT bonus from items it join inventory inv on it.id=inv.itemId where inv.use=1 and inv.charId='$loginId' and it.itemType=0");
        $minusAgi = GetValue("SELECT minus from items it join inventory inv on it.id=inv.itemId where inv.use=1 and inv.charId='$loginId' and it.itemType=0");
        $armor = GetValue("SELECT bonus from items it join inventory inv on it.id=inv.itemId where inv.use=1 and inv.charId='$loginId' and it.itemType=1");
        $minusSpeed = GetValue("SELECT minus from items it join inventory inv on it.id=inv.itemId where inv.use=1 and inv.charId='$loginId' and it.itemType=1");
        $witch[1] = $witch[1] - $minusSpeed;
        if ($witch[1]<=0)
            $witch[1] = 1;
        $witch[2] = $witch[2] + $bonusSTR;
        $witch[3] = $witch[3] - $minusAgi;

        $potworek = mt_rand(1, 4);
        $pytanie = "select * from monster where id = '$potworek'";
        $monster = GetPacket($pytanie);
        foreach($monster[0] as $row)
        {
            $zgredek[] = $row;
        }
        $witcher = new witcher($witch[1], $witch[2], $witch[3], $witch[4], $witch[5], $witch[0]);
        $witcher->getExp($witch[8]);
        $witcher ->setArmor($armor);
        $monster = new creature($zgredek[1], $zgredek[2], $zgredek[3], $zgredek[4], $zgredek[4], $zgredek[5]);
        $_SESSION['witcher'] = serialize($witcher);
        $_SESSION['monster'] = serialize($monster);
        static $count = 0;
        $_SESSION['count'] = serialize($count);
        $_SESSION['eliksir'] = serialize(new eliksir(null, null));
        echo "<a href='game.php'>Graj</a>";
        echo "<p><a href='bazar.php'>Bazar</a></p>";
        echo "<p><a href='inventory.php'>Plecak</a></p>";
        echo "<p><a href='staty.php'>Zwiększ statystyki</a> </p>";
        echo "<p><a href='logout.php'>Wyloguj</a> </p>";

    }
    else
    {
        ?>
        <a href="postac.php">Stwórz nową postać</a>
    <?php
    }
}
?>
    <a href="ranking.php">Ranking</a>

    </body>
</html>