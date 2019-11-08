<?php
include("lib/init.php");
$z=$_POST['cn'];
$dbh=new dbi();
if($z!=0)
{
	$sql=mysql_query("select * from cars where typeId='$z' ");
	while($result=mysql_fetch_array($sql))
	{?>
    <option value="<?php echo $result['carmodel']?>"><?php echo $result['carmodel']?></option>
   <?php }
}else
{
}?>