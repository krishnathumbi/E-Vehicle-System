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
								<a href="index.php">Home</a>
							</li>
							<li>
								<a href="aboutus.php">About us</a>
							</li>
							<li>
								<a href="reserv.php">Vehicle</a>
							</li>
							<!--<li>
								<a href="rentlocation.php">Rental Location</a>
							</li>-->
							<li class="main_menu">
								<a href="#">Registration</a>
								<ul class="submenu" >
									<li><a href="register.php">User</a></li>
									<!--<li><a href="register_company.php">Branch</a></li>-->
								</ul>
							</li>
							
														
							
							<li class="last">
								<a href="contact.php">Contact</a>
							</li>
							<?php if(isset($_SESSION['email'])){?>
							<li>
								<a href="logout.php">Logout</a>
							</li>
							<?php } else {?>
							<li>
								<a href="login.php">Login</a>
							</li>
							<?php }?>
							
						</ul>
						<br class="clear" />
					</div>
										
<?php include('sidebar.php');?>				