<script>
	$(document).ready(function()
	{
		$('.main_menu').hover(function()
		{
			$('.submenu').slideDown();
			},
			function(){
				$('.submenu').slideUp();
				});
		});
</script>
<style>
.submenu
{
	position: absolute;
	display: none;
	background-color: #6F553F;
	z-index: 9999999;
	width: 138px;
}
.submenu li
{
	line-height: 40px;
}
</style>
	
	
	
	<div id="nav">
						<ul>
							<li class="first active">
								<a href="user_home.php">Home</a>
							</li>
							
							<li>
								<a href="aboutus_user.php">About us</a>
							</li>
							
							
							<li>
								<a href="user_reserve.php">Vehicle</a>
							</li>
							<!-- <li>
								<a href="rentlocation.php">Rental Location</a>
							</li> -->
							     <li>
								<a href="reservationlist_user.php">Reservation Details </a>
							</li>
								<li>
								<a href="profile.php">Profile</a>
							</li>
							
							<li class="main_menu">
								<a href="#">Booking</a>
								<ul class="submenu" >
									
									<li><a href="user_cab.php">Cab</a></li>
								</ul>
							</li>
							
							
                            <li>
								<a href="feedback.php">Feedback</a>
							</li>
							
							<li class="last">
								<a href="contact_user.php">Contact</a>
							</li>
							
						
									<li>
								<a href="logout.php">Logout</a>
							</li>
							
							
							
						</ul>
						<br class="clear" />
					</div>
					
<!--**********************************************************************************************************--->
				
				
			<!--	<div id="main">
					<div id="sidebar">
						
						<ul class="linkedList">
							
							
							
							<li>
								<a href="reservationlist_user.php">Reservation Details </a>
							</li>
                            <li>
								<a href="profile.php">Profile</a>
							</li>
							
							
						</ul>
					</div>
							-->
					<div id="content">					