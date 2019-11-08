<?php
class login
{
 function login()
	{
$dbh=new dbi();
if(isset($_POST['login']))
{
	$uname=$_POST['uname'];
	$pw=$_POST['pass'];
	$s = "select * from login where username='$uname' and password='$pw'";
	
    $sql=mysql_query($s);
	$set=mysql_fetch_array($sql);
	if($set)
	{
	   
	   $ut=$set['usertype'];
	   $_SESSION['utype']=$ut;
	   $uid=$set['username'];
	 
	    $_SESSION['name']='';
	      //if($st=='accept')
//		  {
	  	
	      if($ut=='admin')
	       {
			$_SESSION['email']=$set['username'];
		    $_SESSION['username']=$set['username'];
		    header("location:admin_home.php");
			 }
           elseif($ut=='user')
	         {
				//echo $_SESSION['userid'];
				 //die();
		    $_SESSION['email']=$set['username'];
		     $_SESSION['username']=$set['username'];
			 $sqlt=mysql_query("select * from userregister where email='$uid'");
			 $sett=mysql_fetch_array($sqlt);
			 $_SESSION['name']=$sett['fname'];
			header("location:user_home.php");
	          }
	//elseif($st=='waiting')
//	{
//		 $this->msg="your request is waiting...";
//		}
	

   elseif($ut=='branch')
	         {
			
		    $s="select * from branchregistration where email='$uid'";
			 $sqlt=mysql_query($s);
			 $sett=mysql_fetch_array($sqlt);
			 if($sett["status"]=='accept'){
			  $_SESSION['branch_id'] = $sett[6];
			
			 $_SESSION['email']=$set['username'];
		     $_SESSION['username']=$set['username'];
			 $_SESSION['name']=$sett['branchname'];
			header("location:company_home.php");
			 }else{
				 $this->msg="your request is waiting..."; 
				 }
	          }
			  
			  
			  }
		else{
			$this->msg="Invalid username or password ...";
			} 
}
}}
$login= new login();
?>

