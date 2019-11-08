<?php
include("lib/init.php");
$FeedId=$_GET['fid'];
$dbh=new dbi();
$data=mysql_query("delete from feedback where FId='".$FeedId."'");
if($data)
{
	header("location:feedbacklist.php");
}
?>