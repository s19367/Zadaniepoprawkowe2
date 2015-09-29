<?php
require_once 'witcher.php';
include_once 'creature.php';
include_once 'eliksir.php';
session_start();
$speed = $_POST['speed'];
$str = $_POST['str'];
$agi = $_POST['agi'];
$live = $_POST['live'];
$p = '<p>';
$o = '</p>';


$witcher = new witcher($speed, $str, $agi, $live, $live);

$speedCrt = $_POST['speedCrt'];
$strCrt = $_POST['strCrt'];
$agiCrt = $_POST['agiCrt'];
$liveCrt = $_POST['liveCrt'];

$monster = new creature($speedCrt, $strCrt, $agiCrt, $liveCrt, $liveCrt);

echo $p . 'Witcher: ' . $o ; //. 'Potwór: <br>'. $monster->stats() ;
$witcher->stats();
echo $p . 'Potwor: ' .$o;
$monster->stats();


$_SESSION['witcher'] = serialize($witcher);
$_SESSION['monster'] = serialize($monster);
static $count = 0;
$_SESSION['count'] = serialize($count);
$_SESSION['eliksir'] = serialize(new eliksir(null, null));


?>
<form action="game.php" >
    <button type="submit" >
        Play
    </button>
</form>


