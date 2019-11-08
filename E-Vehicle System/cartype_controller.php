<?php
class cartype
{
	function cartype()
	{
$dbh=new dbi();
	if(isset($_POST['add']))
	{
		$cartype=$_POST['cartype'];
		$no=$_POST['no'];
		$seat=$_POST['seat'];
		$class=$_POST['class'];
		$model=$_POST['model'];
		$rpd=$_POST['rpd'];
		$carmmodell=$_POST['carmmodel'];
		$rdate= isset($_REQUEST["rdate"]) ? $_REQUEST["rdate"] : "";
 $sql=mysql_query("INSERT INTO cartype (cartype,carmodel,total,no,seat,class,model,rateperday,rent,date)
		values('$cartype','$carmmodell','$no','$no','$seat','$class','$model','$rpd','','$rdate')");
		if($sql)
		{
			$this->msg="add one car !!!";
		}
		else
		{
			$this->msg="Database error !!!";
	    }
    }
  }
}
$cartype= new cartype();
?>