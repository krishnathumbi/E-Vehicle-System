<?php
$dbh=new dbi();
if(isset($_POST['submit']))
{
$totalamt=$_POST['totalamt'];
$advanceamt=$_POST['advanceamt'];	
$balanceamt=$_POST['balanceamt'];
mysql_query("INSERT INTO payment(toalamount,advanceamount,balanceamount)VALUES('$totalamt','$advanceamt','$balanceamt')");


}