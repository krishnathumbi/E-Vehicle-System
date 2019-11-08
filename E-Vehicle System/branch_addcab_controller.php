
<?php
class cab
{
	public function cab()
	{
		$dbh=new dbi();
		$branch_id= $_SESSION['email'];
		
		if(isset($_POST['submit']))
		{
			
			$cname= $_POST['company'];
			$regno= $_POST['num'];
			$seat= $_POST['seat'];
			$mdl= $_POST['model'];
			$charge= $_POST['chrg'];
			$status='Not Booked';
		
			
				$sql="insert into cabvehicle(cab_company,cab_num,seat,model,charge,status,branch_id)values('$cname','$regno','$seat','$mdl', '$charge','$status','$branch_id')";
						
					
						mysql_query($sql) ;
						//or die("the email-id is already registered");
					if($sql)
					{
						echo '<script> alert(" Registration Successful "); </script>';
						header("location:branch_viewcabb.php");
						
					}
					else
					{
						echo '<script> alert(" Registration Failled "); </script>';
					}
		}
	}
}
$cab=new cab();
?>



		
	
	
		
