<?php
class feedback
{
	function feedback()
	{
$dbh=new dbi();
$set=$_SESSION['email'];
	if(isset($_POST['submit']))
	{
		$name=$_POST['name'];
		$email=$_POST['email'];
		$message=$_POST['message'];
		//$rentid=$_POST['rentid'];
		$date= date('Y-m-d');
		$sql=mysql_query("INSERT INTO feedback (email,message,date,emaill)
		values('$email','$message','$date','$set')");
	
	     if($sql)
		{
			$this->msg="Your feedback sent sucessfully !!!";
		}
		else
		{
			$this->msg="Database error !!!";
	    }
	}
  }
}

$feedback= new feedback();
?>
        