
				<div id="main">
					<div id="sidebar">
						
						<ul class="linkedList">
							<li class="first">
								<a href="index.php">Home</a>
							</li>
							<li>
								<a href="aboutus.php">About us</a>
							</li>
							<li>
								<a href="reserv.php">Vehicle</a>
							</li>
						<!--	<li>
								<a href="rentlocation.php">Rental Location</a>
							</li>
							<!-- <li class="main_menu">
								<a href="#">Registration</a>
								<ul class="submenu" >
									<li><a href="register.php">User</a></li>
									<li><a href="register_company.php">Company</a></li>
								</ul>
							</li> -->
							<li>
							<div class="dropdown">
  <button class="dropbtn">Registration</button>
  <div class="dropdown-content">
   <a href="register.php">User</a>
  <!-- <a href="register_company.php">Branch</a>-->
  </div>
</div>
</li>
							
							
							<li class="last">
								<a href="contact.php">Contact</a>
							</li>
							<?php if(isset($_SESSION['userid'])){?>
							<li>
								<a href="logout.php">Logout</a>
							</li>
							<?php } else {?>
							<li>
								<a href="login.php">Login</a>
							</li>
							<?php }?>
							
							</ul>
					</div>
				<div id="content">