<?php

class payment
{
	function payment()
	{
$dbh=new dbi();
if(isset($_POST['submit']))
{
$branch_id=$_POST['branch_id'];
$amount=$_POST['amount'];	
$date= isset($_REQUEST["date5"]) ? $_REQUEST["date5"] : "";
if($_POST['branch_id']>0){
$sql=mysql_query("INSERT INTO payment_to_branch(branch_id,amount,date)VALUES('$branch_id','$amount','$date')");
if($sql){$this->msg="success!!!";}
else
		{
			$this->msg="error !!!";
	    }

}
else
		{
			$this->msg="please select branch  !!!";
	    }
}

  }
}
 $payment=new payment();
 ?>