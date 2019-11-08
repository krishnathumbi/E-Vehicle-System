<?php
include_once('lib/init.php');
include('header.php');
include('sidebaronlymenu.php');
?>


<!--<div id="main">
 
<div><?php if(isset($login->msg)){echo $login->msg;}?></div>

<form method="post">
<table cellpadding="5" cellspacing="10"  width="290px">
<tr><td>USER NAME</td><td><input name="uname" type="text" /></td></tr>
<tr><td>PASSWORD </td><td><input name="pass" type="password" /></td></tr>
<tr>
<td colspan="2" align="right"><input name="login" type="submit" value="LOGIN">
</td>   </tr>
</table>
</form>
</div>-->
  <div class="imgcontainer">
    <img src="images/img_avatar2.png" alt="Avatar" class="avatar">
<!--     <img src="images/login_icon.jpg" alt="Avatar" class="avatar"> -->

  </div>


<!-- <form method="post" style="padding: 10px 100px 10px 100px;">
<fieldset>
    <legend>Login</legend>

  <div class="container">
  <div>
    <label for="uname"><b>Username</b></label>
    <input type="text" name="uname" required>
	</div>
<br/>
    <label for="psw"><b>Password</b></label>
    <input type="password"  name="pass" required>
        
    <input type="submit" value="Login">
    <label>
      <input type="checkbox" checked="checked" name="remember"> Remember me
    </label>
  </div>
</fieldset>
</form> -->


<form method="post" style="padding: 10px 75px 10px 134px;" id="reg">
<fieldset><legend> Login</legend>
<table  cellpadding="5" cellspacing="5" align="center">
<tr><td>Username</td><td> <input type="text" name="uname" required ></td></tr>
<tr><td>Password</td><td>  <input type="password"  name="pass" required></td></tr>


<tr><td></td><td><input type="submit" value="Login" name="login"></td></tr>
<tr><td></td><td><label>
      <input type="checkbox" checked="checked" name="remember"> Remember me
    </label></td></tr>

</table>
</fieldset>
</form>




<?php

include('footer.php');
?>
