<?php
class register
{
	function register()
	{
		$dbh=new dbi();
	;
if(isset($_POST['submit']))
{
$name=$_POST['name'];
//$uname=$_POST['uname'];	
$addr=$_POST['addr'];
$city=$_POST['city'];
$state=$_POST['state'];
$pin=$_POST['pin'];
$email=$_POST['email'];
$phnum=$_POST['phn'];
$password=$_POST['password'];
$dateofbirth=$_POST['dbirth'];


$sql=mysql_query("INSERT INTO login (username,password,usertype)values('$email','$password','user')");
//echo "INSERT INTO userregister(userid,name,username,address,city,state,pincode,dateofbirth,email,phoneno)
//value('$myid','$name','$uname','$addr','$city','$state','$pin','$dateofbirth','$email','$phnum')";

if($sql)
		{
			
				/*$id=mysql_query("select max(id)as id from login ");
		
     	$result=mysql_fetch_object($id);
      	$uid=$result->id;
      	$myid=$uid;*/
		
		
		mysql_query("INSERT INTO userregister(fname,address,city,state,pincode,dateofbirth,email,phoneno)
value('$name','$addr','$city','$state','$pin','$dateofbirth','$email','$phnum')");
		$this->msg="Registration sucess !!!";
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
 

 