<?php
$dbh=new dbi();
if(isset($_GET['userid']))
{
	$uid=$_GET['userid'];
	$sql=mysql_query("UPDATE login SET status='accept' where userid='$uid'");
	if($sql)
	{
		header("location:request.php");
	}
}
?>