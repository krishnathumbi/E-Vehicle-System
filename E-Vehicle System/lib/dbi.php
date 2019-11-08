<?php
class dbi
{
function dbi()
{
$db="vehicle";
mysql_connect("localhost","root","") or
die("connection error");
 mysql_select_db($db);
}
function query($statement)
{
$x="value null";
$result=mysql_query($statement);
return($result);
}
function fetchrow($result)
{
$row=mysql_fetch_array($result);
return($row);
}
}
?>