<?php
session_start();
require_once 'witcher.php';
include_once 'creature.php';
include_once 'eliksir.php';
static $count=0;
$witcher = unserialize($_SESSION['witcher']);
$monster = unserialize($_SESSION['monster']);
$count = unserialize($_SESSION['count']);
if ($_SESSION['eliksir'] <> null)
    $ex = unserialize($_SESSION['eliksir']);
$ap = $witcher->get_ap();
$bon = $ex->bonusCheck($count);
echo 'Runda: ' . $count;
if ($bon>0)
switch($ex->tempwtf())
{

    case 1:
        $tp=$witcher->getspeed();
        $witcher->setspeed($tp - $bon);
        break;
    case 2:
        $tp= $witcher->getstr();
        $witcher->setstr($tp - $bon);
        break;
    default:
        echo 'bonus err';
        break;
}

switch($_POST['btn'])
{
    case 1:
        if($ap-1 < 0)
        {
            echo '<p>Brak AP!</p>';
            break;
        }
        $rand = rand(1, 100);
        $SK=$witcher->sk($witcher->getagi(), $monster->getagi());
        if ($rand<=$SK)
        {
            $monster->setlive($monster->getlive() - $witcher->getstr());
            echo '<p> sukces! </p>';
        }
        else
            echo '<p> pudło! </p>';
        echo $rand . '<br>' . $SK;
        $ap--;
        break;
    case 2:
        if($ap-2 < 0)
        {
            echo '<p>Brak AP!</p>';
            break;
        }
        $ap-=2;
        $ex=new eliksir(rand(1, 3), 1);
        $ex->show();
        break;
    case 3:
        if($ap-3 <= 0)
        {
            echo '<p>Brak AP!</p>';
            break;
        }
        $ap-=3;
        $ex= new eliksir(rand(1,3), 2);
        $ex->show();
        break;
    case 4:
        if($ap-4 <= 0)
        {
            echo '<p>Brak AP!</p>';
            break;
        }
        $ap-=4;
        $ex = new eliksir(rand(1,3), 3);
        $ex->show();
        break;
    case 5:
        if($ap-1 <0)
        {
            echo '<p>Brak AP!</p>';
            break;
        }
        $ap--;
        if($ex ==  null)
        {
            echo '<p>brak eliksiru!</p>';
            break;
        }
        $ex->show();
        switch ($ex->wtf())
        {
            case 1:
                $bonus = $ex->drink();
                $witcher->setspeed($witcher->getspeed()+$bonus);
                $penality=$witcher->getlivemax();
                $penality = $penality/20;
                $witcher->setlive($witcher->getlive() - $penality);
                break;
            case 2:
                $bonus = $ex->drink();
                $witcher->setstr($witcher->getstr() + $bonus);
                $penality=$witcher->getlivemax();
                $penality = $penality/20;
                $witcher->setlive($witcher->getlive() - $penality);
                break;
            case 3:
                $bonus = $ex->drink();
                $hp = $witcher->getlive();
                if(($hp+$bonus) > $witcher->getlivemax() )
                    $witcher->setlive($witcher->getlivemax());
                else
                    $witcher->setlive($hp + $witcher->getlive());
                break;
        }

        break;
    case 6:
        $def = $witcher->def();
        $agi = $witcher->getagi();
        $witcher->setagi($def+$agi);
        $_SESSION['start'] = serialize(0);
        break;
    case 7:
        $ap=$witcher->pass();
        $_SESSION['start'] = serialize(0);
        break;
    default:
        echo '<p> action error </p>';
}
$witcher->set_ap($ap);
if ($ex <> null)
    $_SESSION['eliksir'] = serialize($ex);
$_SESSION['witcher'] = serialize($witcher);
$_SESSION['monster'] = serialize($monster);
$_SESSION['count'] = serialize($count);
?>

<form action="game.php" method="post">
    <button type="submit">ok</button>
</form>