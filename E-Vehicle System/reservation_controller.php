<?php
class reservation
{
   function reservation()
  {
$dbh=new dbi();

if(isset($_POST['submit']))
 {
	// var_dump($_SESSION);
	// die();
	// echo $_SESSION['userid']."fgg";
	 $userId=$_SESSION['userid'];
	 //echo $ss; 
	$yy=$_GET['id']; 
$sqlq=mysql_query("select * from cartype where carid='".$yy."'");
$resul=mysql_fetch_object($sqlq);
$new1=$resul->cartype;
$new=$resul->no;
$typeno=$_POST['typeno'];
$minus=$new-$typeno;
$sqlp=mysql_query("update cartype set no='".$minus."'  where carid='".$yy."'");
//var_dump($cartype1);
//
//foreach($cartype1 as $v)
//			{
//				
//				$st="update cartype set no='$rr'-'$v' where cartype='$v'";
//				$query=$dbi->query($st);
//				}



/*$sqll=mysql_query("select * from cartype");
$resultant=mysql_fetch_array($sqll);
$ss=$resultant['no'];
$caridd=$resultant['noofcar'];
$sub=($ss)-($caridd);
$type=$resultant['carid']; 
$cc=$resultant['carid'];*/



//$cars=implode(",",$cartype);
$noofdays=$_POST['noofdays'];
$totalamount=$_POST['totalamount'];
$rdate=isset($_REQUEST["rdate5"]) ? $_REQUEST["rdate5"] : "";
$edate= isset($_REQUEST["enddate5"]) ? $_REQUEST["enddate5"] : "";
$sql=mysql_query(" INSERT INTO `carrent`.`reservation` (`rentid`,`userid`, `carid`, `cartype`, `noofcar`, `rdate`, `edate`, `noofdays`, `totalamount`)  VALUES (NULL,'$userId','$yy','$new1','$typeno','$rdate','$edate','$noofdays','$totalamount')");
echo " INSERT INTO `carrent`.`reservation` (`rentid`,`userid`, `carid`, `cartype`, `noofcar`, `rdate`, `edate`, `noofdays`, `totalamount`)  VALUES (NULL,'$userId','$yy','$new1','$typeno','$rdate','$edate','$noofdays','$totalamount')";
         if($sql)
		{ 
        	$this->msg="reservation success !!!";
			//header("location:reservationsucess.php");
		  
		}
		
		else
		{
			$this->msg="Database error !!!";
	    }
/*$sql1=mysql_query("update cartype set cartype=$sub where carid ='$caridd'");
	*/
    }
  }
  
}
$reservation= new reservation();
?>
