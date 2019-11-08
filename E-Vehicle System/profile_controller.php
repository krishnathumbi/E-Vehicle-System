<?php
class profile
{
   function profile()
  {
$dbh=new dbi();
$set=$_SESSION['email'];
if(isset($_POST['update']))
{ 
    
	$name=$_POST['name'];
	//$uname=$_POST['uname'];
	$addr=$_POST['addr'];
	$city=$_POST['city'];
	$state=$_POST['state'];
	$pin=$_POST['pin'];
	$dateofbirth=$_POST['dateofbirth'];
	$email=$_POST['email'];
	$ph=$_POST['phone'];
	//$pass=$_POST['pass'];
	
$sql=mysql_query("UPDATE userregister SET fname='$name',address='$addr',city='$city',state='$state',pincode='$pin',dateofbirth='$dateofbirth',email='$email',phoneno='$ph' WHERE email='$set'");
if($sql)
//{
	//$sql2=mysql_query("UPDATE login SET username='$uname',password='$pass' WHERE userid='$set'");

 	//if($sql2)
		{ 
        	$this->msg="updation sucess !!!";
			
		  
		}
		
		else
		{
			$this->msg="Database error !!!";
		}
		//}
}
 }
}
$profile= new profile();
?>
