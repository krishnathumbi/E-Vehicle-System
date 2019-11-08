<?php
class register
{
	function register()
	{
		$dbh=new dbi();
		
if(isset($_POST['submit']))
{
$com_name=$_POST['com_name'];
$com_addrs=$_POST['com_addrs'];	
$com_city=$_POST['com_city'];
$com_state=$_POST['com_state'];
$com_email=$_POST['com_email'];
$com_phone=$_POST['com_phone'];
//$com_username=$_POST['com_username'];
$com_paswrd=$_POST['com_paswrd'];


$sql=mysql_query("INSERT INTO login(username,password,usertype)values('$com_email','$com_paswrd','branch')");





if($sql)
		{
		/*$id=mysql_query("select max(id)as id from login ");
     	$result=mysql_fetch_object($id);
      	$uid=$result->id;*/
      	
			
mysql_query("INSERT INTO branchregistration(branchname,branchaddress,branchcity,branchstate,email,branchPhone,status)
value('$com_name','$com_addrs','$com_city','$com_state','$com_email','$com_phone','accept')");
		$this->msg="Registration success !!!";
				echo '<script>alert("Record added successfully")</script>';
  }
		
		else
		{
			$this->msg="Database error !!!";
	    }
    }
  }
}
 $register=new register();

?>
 

 