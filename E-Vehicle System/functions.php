<?php
error_reporting(0); 
function carmodel()
{
	 $dbh=new dbi();
  //$userId=$_SESSION['userid'];
     $sql=mysql_query("select * from  carcompany");
echo '<select  name="carmmodel" id="carmodel">';
echo '<option value="">Select</option>';
while($result=mysql_fetch_array($sql))
{
	if(isset($_GET['carmodel']) && $_GET['carmodel']==$result['CoId'])
	{ $rs=$result['CoId'];
		echo '<option selected="selected"  value="'.$rs.'">';
	}
	else
	{?>
	 <option value="<?php echo $result['CoId'];?>">
	<?php }
	echo $result['CoName'];
	echo '</option>';
	
}
echo '</select>';

}



function branch_carmodel($branch_id)
{
	 $dbh=new dbi();
  //$userId=$_SESSION['userid'];
     $sql=mysql_query("select * from  carcompany c LEFT JOIN vtype v on (c.vcoid=v.vtypeid) where branch_id='".$branch_id."'");
echo '<select  name="carmmodel" id="carmodel">';
echo '<option value="">Select</option>';
while($result=mysql_fetch_array($sql))
{
	if(isset($_GET['carmodel']) && $_GET['carmodel']==$result['CoId'])
	{ $rs=$result['CoId'];
		echo '<option selected="selected"  value="'.$rs.'">';
	}
	else
	{?>
	 <option value="<?php echo $result['CoId'];?>">
	<?php }
	echo $result['CoName'];
	echo '</option>';
	
}
echo '</select>';

}

function carmodelsearch($type)
{
	 $dbh=new dbi();
  //$userId=$_SESSION['userid'];
     $sql=mysql_query("select * from  vehiclecompany where VehicleType='".$type."'");
echo '<select  name="carmmodel" id="carmodel">';
echo '<option value="">Select</option>';
while($result=mysql_fetch_array($sql))
{
	if(isset($_GET['carmodel']) && $_GET['carmodel']==$result['VehicleCompanyId'])
	{ $rs=$result['VehicleCompanyId'];
		echo '<option selected="selected"  value="'.$rs.'">';
	}
	else
	{?>
	 <option value="<?php echo $result['VehicleCompanyId'];?>">
	<?php }
	echo $result['VehicleCompanyName'];
	echo '</option>';
	
}
echo '</select>';

}
function branch_carmodelsearch($branch_id,$type)
{
	 $dbh=new dbi();
  //$userId=$_SESSION['userid'];
     $sql=mysql_query("select * from  carcompany c LEFT JOIN vtype v on (c.vcoid=v.vtypeid) where c.vcoid='".$type."' and v.branch_id='".$branch_id."'");
echo '<select  name="carmmodel" id="carmodel">';
echo '<option value="0">Select</option>';
while($result=mysql_fetch_array($sql))
{
	if(isset($_GET['carmodel']) && $_GET['carmodel']==$result['CoId'])
	{ $rs=$result['CoId'];
		echo '<option selected="selected"  value="'.$rs.'">';
	}
	else
	{?>
	 <option value="<?php echo $result['CoId'];?>">
	<?php }
	echo $result['CoName'];
	echo '</option>';
	
}
echo '</select>';

}






function getvtype()
{
	$dbh=new dbi();
	$sql=mysql_query("select * from vehicletype ");
	while($result=mysql_fetch_array($sql))
	{ 
		if(isset($_GET['type']) && $_GET['type']==$result['vehicleTypeId'])
		{	$rs=$result['vehicleTypeId'];
			$str= '<option selected="selected" value="'.$rs.'">'; 
			
			$str.= $result['VehicleName'];
			$str.= '</option>';
			echo $str;
		}
		/*else if($_GET['a']==$result['vtypeid'])
		{
			$rs=$result['vtypeid'];
			$str= '<option selected="selected" value="'.$rs.'">'; 
			
			$str.= $result['vehicletype'];
			$str.= '</option>';
			echo $str;
		}*/
		else
		{?> 
			<option value="<?php echo $result['vehicleTypeId']?>"><?php echo $result['VehicleName']?></option>
	<?php }
	}
		
}



function branch_getcompanynames($branch_id)
{
	$dbh=new dbi();
	$sql=mysql_query("select * from carcompany cc inner join vtype v on (cc.vcoid=v.vtypeid) where branch_id='".$branch_id."' ");
	while($result=mysql_fetch_array($sql))
	{ 
		if(isset($_GET['companyname']) && $_GET['companyname']==$result['CoName'])
		{	$rs=$result['CoName'];
			$str= '<option selected="selected" value="'.$rs.'">'; 
			
			$str.= $result['CoName'];
			$str.= '</option>';
			echo $str;
		}
		
		else
		{?> 
			<option value="<?php echo $result['CoName']?>"><?php echo $result['CoName']?></option>
	<?php }
	}
	?>
    <option value="other">other</option>
    <?php
		
}






function getVehicleType()
{
	$dbh=new dbi();
	$sql=mysql_query("select * from vehicletype");
	while($result=mysql_fetch_array($sql))
	{ 
		$rs=$result['vehicleTypeId'];
		$str= '<option value="'.$rs.'">'; 
		$str.= $result['VehicleName'];
		$str.= '</option>';
		echo $str;
	}
}

function getcompanylist()
{
		$dbh=new dbi();
	$sql=mysql_query("select * from vehicletype");
	while($result=mysql_fetch_array($sql))
	{ 
		$rs=$result['vehicleTypeId'];
		$str= '<option value="'.$rs.'">'; 
		$str.= $result['VehicleName'];
		$str.= '</option>';
		echo $str;
	}

}



function branch_getvtype($branch_id)
{
	$dbh=new dbi();
	$sql=mysql_query("select * from vtype where branch_id='".$branch_id."'");
	while($result=mysql_fetch_array($sql))
	{ 
		if(isset($_GET['type']) && $_GET['type']==$result['vtypeid'])
		{	$rs=$result['vtypeid'];
			$str= '<option selected="selected" value="'.$rs.'">'; 
			
			$str.= $result['vehicletype'];
			$str.= '</option>';
			echo $str;
		}
		else if($_GET['a']==$result['vtypeid'])
		{
			$rs=$result['vtypeid'];
			$str= '<option selected="selected" value="'.$rs.'">'; 
			
			$str.= $result['vehicletype'];
			$str.= '</option>';
			echo $str;
		}
		else
		{?> 
			<option value="<?php echo $result['vtypeid']?>"><?php echo $result['vehicletype']?></option>
	<?php }
	}
		
}


function cartypes()
{
	$dbh=new dbi();
	$sql=mysql_query("select * from carmodel");
	while($result=mysql_fetch_array($sql))
	{
		?><option value="<?php echo $result['carmodel']?>">
		<?php echo $result['carmodel']?>
		</option><?php
	}
}
function cartypesedit($data)
{
	$dbh=new dbi();
	$sql=mysql_query("SELECT * FROM vehiclemodel");
	while($result=mysql_fetch_array($sql))
	{?>
		<option <?php if($data=$result['VehicleModelName']){?> selected="selected"<?php }?>><?php echo $result['VehicleModelName']?></option>;
	<?php }
}
function getcompanies()
{
	$dbh=new dbi();
	$sql=mysql_query("select * from carcompany ");
	while($result=mysql_fetch_array($sql))
	{?>
		<option value="<?php echo $result['CoId']?>"><?php echo $result['CoName']?></option>
	<?php }
}

function branch_getcompanies($branch_id)
{
	$dbh=new dbi();
	$sql=mysql_query("select * from carcompany c left join vtype v on(c.vcoid=v.vtypeid) where branch_id='".$branch_id."'");
	while($result=mysql_fetch_array($sql))
	{?>
		<option value="<?php echo $result['CoId']?>"><?php echo $result['CoName']?></option>
	<?php }
}
function getCompanyName($data)
{
	$dbh=new dbi();
	$sql=mysql_query("select * from vehiclecompany  where VehicleCompanyId='".$data."'");
	$res=mysql_fetch_object($sql);
	return $res->VehicleCompanyName;
}
function getModelName($data)
{
	$dbh=new dbi();
	$sql=mysql_query("select * from vehiclemodel  where VehicleModelId='".$data."'");
	$res=mysql_fetch_object($sql);
	return $res->VehicleModelName;
}
function getBranchName($data)
{
	$dbh=new dbi();
	$sql=mysql_query("select * from branchregistration  where branchRegid='".$data."'");
	$res=mysql_fetch_object($sql);
	return $res->branchcity;
}

function getcabvehicle()
{
	$dbh=new dbi();
	$sql=mysql_query("select * from cabvehicle");
	$res=mysql_query($sql);
	return $res;
}

function getbooking()
{
	$dbh=new dbi();
		$sql="select b.from_cab,b.to_cab, u.fname, u.phoneno, c.cab_company from booking_tbl b
		inner join cabvehicle c on c.cab_id=b.cab_id inner join  userregister u on b.email=u.email"; 
	 	$res=mysql_query($sql);
		return $res;
}
	
function getcab()
{
	$dbh=new dbi();
	$sql="select * from cabvehicle";
	$res=mysql_query($sql);
	return $res;
}
function getcabbybranch($branch_id)
{
	$dbh=new dbi();
	$sql="select * from cabvehicle where branch_id = '$branch_id'";
	
	$res=mysql_query($sql);
	return $res;
}

function getbook()
{
	$dbh=new dbi();
		$sql="select b.from_cab,b.to_cab, u.fname, u.phoneno, c.cab_company,p_status from booking_tbl b
		inner join cabvehicle c on c.cab_id=b.cab_id inner join  userregister u on b.email=u.email inner join transaction t on b.book_id=t.book_id "; 
	 	$res=mysql_query($sql);
		return $res;
}


function getbookbybranch($branch_id)
{
	$dbh=new dbi();
		$sql="select b.from_cab,b.to_cab, u.fname, u.phoneno, c.cab_company,p_status from booking_tbl b
		inner join cabvehicle c on c.cab_id=b.cab_id 
		inner join  userregister u on b.email=u.email 
		inner join transaction t on b.book_id=t.book_id 
		where c.branch_id = '$branch_id'
		"; 
	 	$res=mysql_query($sql);
		return $res;
}




?>