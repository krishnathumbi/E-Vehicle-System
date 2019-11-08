<?php
include('lib/init.php');
include('header.php');
include('sidebar_user.php');
$dbh=new dbi();
$refid=$_GET['rid'];
$s = "select * from reservation res inner join userregister ur on res.email=ur.email where res.ReservationId='$refid'";
$sql=mysql_query($s);
//echo "select * from reservation res inner join userregister ur on res.UserId=ur.userid where res.RefId='$refid'";
$result=mysql_fetch_array($sql);
//var_dump($result);
?>
     <script type="text/javascript">     
        function PrintDiv() {    
           var divToPrint = document.getElementById('divToPrint');
           var popupWin = window.open('', '_blank', 'width=550,height=520');
           popupWin.document.open();
           popupWin.document.write('<html><body onload="window.print()">' + divToPrint.innerHTML + '</html>');
            popupWin.document.close();
                }
     </script>
 <div id="main">
<h2 style="float:left;">Print Your Reservation</h2>
<div style="float:right; margin-top:30px;">
                <input type="button" value="print" onClick="PrintDiv();" />
            </div>
            <div class="clear"></div>
            <div id="divToPrint" >
               <div style="width:550px;height:auto;background-color:#fff;">
                 <div style="padding:10px"><h4 style="text-align:center;">Global Car Rental Service</h4>
                 <h5 style="text-align:center;">Reservation Bill</h5>
                 <table cellspacing="10" style="margin-left:170px;">
                 <tr><td>Name  </td><td>: <?php echo $result['fname'] ;?></td></tr>
                 <tr><td>Reservation ID  </td><td>: <?php echo $result['ReservationId'];?></td></tr>
                 <tr><td>Reservation Status</td><td>: <?php echo $result['status'];?></td></tr>
                 <tr><td>Car Number</td><td>: <?php echo $result['VehicleRegNo'];?></td></tr>
                 <tr><td>Booking Date</td><td>: <?php echo $result['bookdate']; ?></td></tr>
                 <tr><td>Reservation Date</td><td>: <?php echo $result['reserdate'];?></td></tr>
                 <tr><td>Return Date</td><td>: <?php echo $result['returndate'] ;?></td></tr>
                 <tr><td>Total Amount</td><td>: <?php echo $result['totalamt'];?></td></tr>
                 <tr><td>Advance Amount</td><td>: <?php echo $result['advanceamt'];?></td></tr>
                 <tr><td>Balance Amount</td><td>: <?php echo $result['balnaceamt'];?></td></tr>
                 </table>
                 <h6 style="text-align:center">Thank You for choosing us. God bless you</h6>
				 
                 </div> 
                </div>
            </div>
            
            </div>
       <?php
include('footer.php');
?>