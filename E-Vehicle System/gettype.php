<?php
include("lib/init.php");
$z=$_POST['tp'];
$b=$_POST['cids'];
$dbh=new dbi();
if($z!=0)
{
	$sql=mysql_query("select * from carcompany where vcoid='$z' ");
	?>
    <option value="">select</option>
    
    <?php
	while($result=mysql_fetch_array($sql))
	{
		
		 if($b!='' && $b==$result['CoId'])
		{
			$rs=$result['CoId'];
			$str= '<option selected="selected" value="'.$rs.'">'; 
			
			$str.= $result['CoName'];
			$str.= '</option>';
			echo $str;
		}
		else
		{?>
    		<option value="<?php echo $result['CoId']?>"><?php echo $result['CoName']?></option>
    <?php } }
}else
{
}

 ?>