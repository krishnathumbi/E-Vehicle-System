<?php
include('lib/init.php');
include('header.php');
include('functions.php');


$getUser=$_SESSION['usertype'];
include('sidebaronlymenu.php');


if(isset($_GET['type']) && $_GET['type']!='')
 {
	  $type=$_GET['type'];
	
 }
?>
<link type="text/css" rel="stylesheet" href="css/styles1.css" />
		
		<script type="text/javascript" src="jss/jquery.pajinate.js"></script>
<script>

$(document).ready(function(){
				$('#paging_container3').pajinate({
					items_per_page : 2,
					item_container_id : '.alt_content',
					nav_panel_id : '.alt_page_navigation'
					
				});
			});	
</script>

<style>
#bottom{width:100% !important;}
.heading{overflow:visible !important;}
.sap2{overflow:visible !important;}
.carcontainer{ float:left; margin-bottom: 18px; margin-left: 3px;width: 100%;}
#main{	padding-bottom:20px;}
.cartype{border-bottom: 1px dashed #666666; font-size: 20px;  margin-left: 53px; margin-top: 19px;text-transform: capitalize;}
.cardetails{	/*font-family: 'Rage Italic';*/  font-size: 11px; margin-left: 56px;  margin-top: 11px;}
.line{ border-bottom: 1px dashed #666666;float: left;margin-top: 10px;width: 100%;}
.buttonstyl{margin-left: 295px;   margin-top: -53px;}
.header_Part{float: left;width: 100%;}
.header_Part h2{float: left;margin-left: 52px;width: auto;}
.header_search{float: left;margin-right: 50px;margin-top: 14px;}
.car_Details{float:left;width:46%;}
.car_Image{	width:275px;min-width:275px;float:left;}
#carmodel{width:100px !important;}
</style>
<script>
$(document).ready(function()
{
	$('#carmodel').change(function()
	{
		var carmodel= $(this).val();
		var tp=$('.getvtype').val();
		window.location="?carmodel="+carmodel+"&type="+tp;
		
	})
	$('.getvtype').change(function()
	{
		
		var tp= $(this).val();
		
		/*var carmodel=$('#carmodel').val();
		window.location="?carmodel="+carmodel+"&type="+tp;*/
		window.location="?type="+tp;
		var vtype=$('.getvtype').val();
		$.post('ajax.php?method=getcompany',{vid:vtype}, function(data) {
			
			$('.company').html(data);
		});
		
		
	})
	
})
</script>
<div id="main">
<h2 style="margin-bottom: 0px;">Search Vehicles</h2>
<div class="header_Part">


<div class="header_search">Search: By Type&nbsp;<select class="getvtype" name="type"><option value="">select</option> <?php getvtype() ?></select>
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
 By Company&nbsp;<?php  carmodelsearch($type);?></div>

</div>
<?php
$dbh=new dbi();
if(isset($_SESSION['userid']))
{
 $userId=$_SESSION['userid'];
 $getUser=$_SESSION['usertype'];
}

	$qry="select * from vehicles ";
	if(isset($_GET['type']) && $_GET['type']!=''  && $_GET['carmodel']=='')
	{
		$qry.="where VehicleType='$type'";
		
	}
	else if(isset($_GET['type']) && $_GET['type']!=''  && isset($_GET['carmodel']) && $_GET['carmodel']!='')
	{
		$carmodel=$_GET['carmodel'];
		$qry.="where VehicleType='$type' and  VehicleCompany= '$carmodel'";
	}
	//echo $qry;
	$sql=mysql_query($qry);
	
?>
<div id="paging_container3" class="container">
  <?php   mysql_num_rows($sql);
			if(mysql_num_rows($sql)==0) 
			{
				echo "SELECT VEHICLE TYPE";
			}
			else{?>
			<div class="alt_page_navigation"></div>
			<?php }?>
	<ul class="alt_content">
	<?php					
	while($result=mysql_fetch_array($sql))
	{
		
	
	//$coId=$result['carType'];
	//$setqry=mysql_query("select CoName from carcompany where CoId='".$coId."'");
	//$cqry=mysql_fetch_object($setqry);
	?>
	<li><p>
	<div class="carcontainer">
	<div class="car_Details">
	<table>
		
	<tr><td>Vehicle Number : </td><td><?php echo $result['VehicleRegNo'];?></td></tr>
	<tr><td>Vehicle Model : </td><td><?php echo getModelName($result['VehicleModel']);?></td></tr>
	<tr><td>Vehicle Company : </td><td><?php echo getCompanyName($result['VehicleCompany']);?></td></tr>
	
	<tr><td>Insurance Number : </td><td><?php echo $result['InsuranceNo'];?></td></tr>
	<tr><td>Insurance Date : </td><td><?php echo $result['InsuranceDate'];?></td></tr>
	
	<tr><td colspan="2">
	<?php if(isset($getUser))
	{
		if($getUser=='user'){?>
		<a href="reservcar.php?id=<?php echo $result['vehicleId'];?>"><input name="txtbut" type="button" value="Reserve"></a>
		<?php  } else if($getUser=='branch'){?>
		<a href="editcar.php?id=<?php echo $result['vehicleId'];?>"><input name="txtbut" type="button" value="Edit"></a>
	<?php } 
	} ?>
 
</td></tr></table>
</div>
<div class="car_Image"><img src="<?php echo $result['Image'];?>" width="275" /></div>
<div class="line"></div>


</div>
</p></li>
<?php }?>
	



	</ul>
</div>





















<?php
/*


   if(isset($_GET['carmodel']) || isset($_GET['type']))
   {
	   $carModel=$_GET['carmodel'];
	   
	    $sql1=mysql_query("select count(*) as count from cars where carType='$carModel'");
		$data=mysql_fetch_object($sql1);
        $total=$data->count;
		$nopages=ceil($total/5);
		if(isset($_GET['page']))
		{
			$page=$_GET['page'];
			$startpage=$page-1;
          $start=($startpage*4)+1;
          $end=$page*4;
		}
		else
		{
			$start=0;
			$end=4;
		}
   	   //$sql=mysql_query("select * from cars c INNER JOIN carmodel cm ON c.carModel=cm.carmodel where c.carType='$carModel'");
	   $qry="select * from cars c INNER JOIN carmodel cm ON c.carModel=cm.carmodel ";
	    $qry="select * from cars c INNER JOIN carmodel cm ON c.carModel=cm.refId ";
	   if($carModel==0 && isset($type))
	   {
	   $qry.="where c.vid='$type'";
	   }
	   elseif(isset($carModel) && !isset($type))
	   {
	   $qry.="where c.carType='$carModel'";
	   }
	   elseif(!isset($carModel) && isset($type))
	   {
	   $qry.="where c.vid='$type'";
	   }
	   else if(isset($carModel) && isset($type))
	   {
	   $qry.="where c.vid='$type' and  c.carType='$carModel'";
	   }	   
	  $qry.="and c.RefId NOT IN(select r.carid  from reservation r where r.status='Reserved' or r.status='leased')";
	   
	   $qry="select * from vehicles  ";
	   
	   
	   //echo $qry;
	   
	   $sql=mysql_query($qry);
   }
   else
   {
	   $sql1=mysql_query("select count(*) as count from cars where carType=1");
		$data=mysql_fetch_object($sql1);
        $total=$data->count;
		$nopages=ceil($total/5);
		if(isset($_GET['page']))
		{
			$page=$_GET['page'];
			$startpage=$page-1;
          $start=($startpage*4)+1;
          $end=$page*4;
		}
		else
		{
			$start=0;
			$end=4;
		} 
	   $sql=mysql_query("select * from cars c INNER JOIN carmodel cm ON c.carModel=cm.carmodel  where c.carType=1 ");
	  
   }?>
<div id="paging_container3" class="container">
				
                <?php   mysql_num_rows($sql);
				if(mysql_num_rows($sql)==0) 
				{
					echo "SELECT VEHICLE TYPE";
				}
				else
				{
                ?>
				<div class="alt_page_navigation"></div>
                
				<?php }?>
				<ul class="alt_content">
<?php					
while($result=mysql_fetch_array($sql))

//var_dump($result);
{
	
	$coId=$result['carType'];
	$setqry=mysql_query("select CoName from carcompany where CoId='".$coId."'");
	$cqry=mysql_fetch_object($setqry);
	
	?>
	<li><p>
	<div class="carcontainer">
	<div class="car_Details">
	<table>
		
	<tr><td>Vehicle Number : </td><td><?php echo $result['VehicleRegNo'];?></td></tr>
	<tr><td>Vehicle Model : </td><td><?php echo $result['VehicleModel'];?></td></tr>
	<tr><td>Vehicle Company : </td><td><?php echo $result['VehicleCompany'];?></td></tr>
	
	<tr><td>Insurance Number : </td><td><?php echo $result['InsuranceNo'];?></td></tr>
	<tr><td>Insurance Date : </td><td><?php echo $result['InsuranceDate'];?></td></tr>
	<tr><td colspan="2">
	<?php if(isset($getUser))
		{
			 if($getUser=='user')
			 {?>
				<a href="reservcar.php?id=<?php echo $result['vehicleId'];?>"><input name="txtbut" type="button" value="Reserve"></a>
				
	
	
			
		<?php  } else {?>
			<a href="editcar.php?id=<?php echo $result['vehicleId'];?>"><input name="txtbut" type="button" value="Edit"></a>
	<?php } } ?>
   

</td></tr></table>
</div>
<div class="car_Image"><img src="<?php echo $result['Image'];?>" width="275" /></div>
<div class="line"></div>


</div>
</p></li>
<?php
}
?>
 </ul></div>
<!--<div class="pagination">
Pre Next
</div>--> 
</div>
<?php */ ?>
<?php include('footer.php');?>