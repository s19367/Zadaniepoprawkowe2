<?php
session_start();
require_once 'witcher.php';
include_once 'creature.php';
require_once 'sql.php';
header('Content-Type: text/html; charset=utf-8');
$witcher = unserialize($_SESSION['witcher']);
$monster = unserialize($_SESSION['monster']);
$start = unserialize($_SESSION['start']);
$count = unserialize($_SESSION['count']);
//$witcher->set_ap($witcher->getap($witcher->getspeed(), $monster->getspeed()));
$apw = $witcher->get_ap();
$apm = $monster->get_ap();
//echo $start;

if ($monster->getlive() <= 0)
{
    $rd = mt_rand(50, 150);
    $gold = mt_rand(10, 100);
    $login = $_SESSION['zalogowany'];
    $pytanie = "select gold from `character` where name = '$login'";
    $sqlgold = GetValue($pytanie);
    $pytanie = "select exp from `character` where name = '$login'";
    $sqlexp = GetValue($pytanie);
    $exp = $rd + $sqlexp;
    $lvl = GetValue("select lvl from `character` where name = '$login'");
    $ap = GetValue("select ap from `character` where name = '$login'");
    //header('Location: victory.html');
    echo "<h6>Wygrałeś!</h6>";
    echo "<p>dostajesz: ". $rd . " pkt. doświadczenia oraz przy pokonamym wrogu znalazleś: " . $gold . " sztuk złota!  </p>";
    $gold = $gold + $sqlgold;
    $pytanie = " UPDATE `character` SET gold = '$gold' , exp = '$exp' ";
    if ($witcher->lvlCheck())
    {
        $lvl++;
        $ap = $ap + 5;
        $pytanie = $pytanie . ", lvl = '$lvl', ap = '$ap', exp = 0 ";
    }
    $pytanie = $pytanie . " where name = '$login'";
    //echo $pytanie;
    ex($pytanie);
    echo "<a href='index.php'>jeszcze raz?</a>";

}
if ($witcher->getlive() <= 0)
    header('Location: defeat.html');
if ((($apw == 0) && ($apm==0)) || $witcher->CheckPass() )
{
    $count++;
    $apw += $witcher->getap($witcher->getspeed(), $monster->getspeed());
    $apm = $monster->getap($monster->getspeed(), $witcher->getspeed());


    $witcher->set_ap($apw);
    $monster->set_ap($apm);
    if ($apw >= $apm)
        $start = 1;
    else
        $start = 0;
    if ($witcher->CheckPass())
    {
        $start = 0;
        $witcher->depass();
    }
}

echo 'Wiedzmin_AP: '.$apw . '<br>Potwor_AP: ' . $apm;
if ($start == 1)
{
    ?>
    <form action="result.php" method="post" >
        <table>
            <tr><td>
        <button type="submit" value="1" name="btn">Atak</button>
                </td></tr><tr><td>
        <button type="submit" value="2" name="btn">Stworzenie eliksiru 1 poziomu</button>
                </td></tr><tr><td>
        <button type="submit" value="3" name="btn">Stworzenie eliksiru 2 poziomu</button>
                </td></tr><tr><td>
        <button type="submit" value="4" name="btn">Stworzenie eliksiru 3 poziomu</button>
                </td></tr><tr><td>
        <button type="submit" value="5" name="btn">Wypicie eliksiru</button>
                </td></tr><tr><td>
        <button type="submit" value="6" name="btn">Obrona</button>
                </td></tr><tr><td>
        <button type="submit" value="7" name="btn">Pass</button>
                </td>
            </tr>
        </table>
    </form>
    <?php
    if ($apw==0)
        $start=0;
}
else
{
    echo '<p>Potwor atakuje!</p>';

    $rand = rand(0, 100);
    echo '<p>'.$rand . '</p>';
    $SK=$monster->sk($monster->getagi(), $witcher->getagi());
    if ($rand <= $SK)
    {
        $armor = $witcher->getArmor();
        $live = $armor - $monster->getstr();
        if ($live < 0)
        $witcher->setlive($witcher->getlive() - $live);
        else
            echo '<p> Pancerz zaabsorbował wszystkie zadane obrażenia! </p>';
        echo '<p> sukces! </p>';
    }
    else
        echo '<p> pudło! </p>';
    $apm--;
    $monster->set_ap($apm);
    if($apm<=0)
    {
        $start = 1;
        if ($witcher->defcap())
        {
            $agi = $witcher->getagi();
            $witcher->setagi($agi - $witcher->getdef());
            $witcher->del_defcap();
        }
    }
    ?>
    <form action="">
        <button type="submit">ok</button>
    </form>

<?php
}
$witcher->stats();
echo '<br>';
$monster->stats();
$_SESSION['witcher'] = serialize($witcher);
$_SESSION['monster'] = serialize($monster);
$_SESSION['start'] = serialize($start);
$_SESSION['count'] = serialize($count);
//echo $apm;
?>