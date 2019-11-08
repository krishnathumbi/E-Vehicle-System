<?php
include("lib/init.php");
$z=$_POST['gm'];
$dbh=new dbi();
if($z!=0)
{
	$sql=mysql_query("select * from carmodel where typeId='$z' ");
	?>
    <option>select</option>
    <?php
	while($result=mysql_fetch_array($sql))
	{?>
    <option value="<?php echo $result['cartype']?>"><?php echo $result['cartype']?></option>
   <?php }
}else
{
}?>