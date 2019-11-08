
<?php
error_reporting(0);
class booking
{
	 function booking()
	{
		$dbh=new dbi();
		//$branch_id= $_SESSION['branch_id'];
		
		
		if(isset($_POST['btn_book']))
		{	
			
			$email=$_SESSION['email'];
			$cabid=$_POST['cabid'];
			$from= $_POST['from'];
			$to= $_POST['to'];
			$pool=$_POST['pool_vehicle'];
			
			
			
			$updt="update cabvehicle set status='Booked' where cab_id='$cabid'";
			$res=mysql_query($updt);
			//$row=mysql_fetch_array($res);
			//$r=$row[status];
			//echo $r;
			//$status='Pending';
		
			if($updt)
			{
				$sql="insert into booking_tbl(from_cab,to_cab,email,cab_id)values('$from','$to','$email','$cabid')";
				//die("$sql");
				$res=mysql_query($sql) ;
				$b_id= mysql_insert_id();
				//echo $b_id;
				
						//or die("the email-id is already registered");
					if($res)
					{
						//$sql1="insert into transaction(book_id,cab_id,)";
						echo '<script> alert(" Registration Successful "); </script>';
						
					}
					else
					{
						echo '<script> alert(" Registration Failled "); </script>';
					}
			}
			if($pool==true)
			{
				$status="Pooling";
				$sql="insert into transaction(book_id,cab_id,p_status)values('$b_id','$cabid','$status')";
				$res=mysql_query($sql);
			}
			else
			{

				$sql="insert into transaction(book_id,cab_id,p_status)values('$b_id','$cabid','$status')";
				$res=mysql_query($sql);
				echo "<script> alert('Pooling not selected'); </script>";
			}
		}
	}
}
$booking=new booking();
?>



		
	
	
		
