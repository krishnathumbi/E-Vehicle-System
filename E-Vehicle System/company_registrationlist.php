<?php
include("lib/init.php");
include("header.php");
include('sidebar_admin.php');
$dbh=new dbi();

if(isset($_POST['company_id']))
{
	$company_id=$_POST['company_id'];
			$sql=mysql_query("update  branchregistration set status='accept' where branch_id='".$company_id."'");
}
/*if(isset($_POST['delete_company_id']))
{
	$company_id=$_POST['delete_company_id'];
			mysql_query("DELETE FROM branchregistration  where branchRegid='".$company_id."'");
			$sql=mysql_query("DELETE FROM login  where id='".$company_id."'");
}*/
?>

<?php if(isset($_REQUEST['action'])&&$_REQUEST['action']=="delete")
{
 $id=$_GET['id']; 
 
   $res=mysql_query("delete  from branchregistration where branch_id='$id'");
   if($res)
   {
	echo '<script>window.location="company_registrationlist.php"; </script>';
   }
 else 
 {
 echo '<script>window.location="company_registrationlist.php"; </script>';
 }
}?>


<style>
table {
    font-family: arial, sans-serif;
    border-collapse: collapse;
    width: 100%;
}

td, th {
    border: 1px solid #dddddd;
    text-align: left;
    padding: 8px;
}

tr:nth-child(even) {
    background-color: #dddddd;
}
</style>
<div id="main">
<h2>Branch's</h2>
<table class="as" cellpadding="5" cellspacing="5" align="center">
<th>Branch Name</th>
<th>Addrerss</th>
<th>City</th>
<th>State</th>
<th width="50">Email</th>
<th>Phone No</th>
<th></th>
</tr>
<?php
$id=mysql_query("select * from branchregistration");
while($result=mysql_fetch_array($id))
{?>
<tr><td ><?php echo $result['branchname'];?></td>
<td><?php echo $result['branchaddress'];?></td>
<td ><?php echo $result['branchcity'];?></td>
<td ><?php echo $result['branchstate']?></td>
<td ><?php echo $result['email'];?></td>
<td ><?php echo $result['branchPhone'];?></td>

<?php if($result['status']=='pending'){ ?>
<td >
<form method="post" action="">
<input name="company_id" type="hidden" value="<?php echo $result['branchRegid'];?>">
<input name="txtbut" type="submit" value="Accept"></form>
</td>
<?php } ?>

<td >

     <a href="company_registrationlist.php?id=<?php echo $result['branch_id'];?>&action=delete" onclick="return confirm('Are you sure you want to delete this item?');">Delete</a>
<form method="post" action="">
<!-- <input name="delete_company_id" type="hidden" value="<?php echo $result['branchRegid'];?>">
<input name="txtbut" type="submit" value="delete"> -->


</form>
</td>

 


<?php  }?>
</table>
</div>
<?php
include("footer.php");
?>


