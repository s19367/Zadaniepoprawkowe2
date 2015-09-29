<?php
function con ()
{
    $dbhost = 'localhost';
    $dblogin = 'root';
    $dbpass = '1qazxsw2';
    $dbselect = 'Witcher';
    mysql_connect($dbhost, $dblogin, $dbpass);
    mysql_select_db($dbselect) or die ("Błąd BD");
    mysql_query("SET CHARACTER SET UTF8");
}
function GetPacket($pytanie)
{
    con();
    $result = mysql_query($pytanie);
    while( $row = mysql_fetch_row($result))
    {
        //print_r($row);
        $res[] = $row;
    }
    return $res;
}
function GetValue($pytanie)
{
    con();
    $res=mysql_query($pytanie);
    $result = mysql_fetch_row($res);
    return $result[0];

}
function ex($pytanie)
{
    con();
    $result =  mysql_query($pytanie);
    if ($result>0)
    {
        return 1;
    }
    else
    {
        return 0;
    }
}
?>
