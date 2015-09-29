<?php
session_start();
header("Location: main.php");
?>

<meta charset="utf-8" />
<table>

<form name="wiedzmin" action="create.php" method="post" >
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
    <td>
    <label>Potwór</label>
    <br></td></tr></tr><td>
    <label>Szybkosc:</label>
    <input name="speedCrt" type="text"> </input>
    <br></td><td>
    <label>Siła:</label>
    <input name="strCrt" type="text"> </input>
    <br></td><td>
    <label>Zręczność:</label>
    <input name="agiCrt" type="text"> </input>
    <br></td><td>
    <label>Życie:</label>
    <input name="liveCrt" > </input>
    <br></td></td>
    <button type="submit">ok</button>
</form>
</table>