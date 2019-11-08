<?php
include("lib/init.php");
include("header.php");
include("sidebar_user.php");
?>
<div id="main">
<h2>PAYMENT</h2>
<form method="post">
<table align="center" cellpadding="5" cellspacing="5">
<tr><td>total amount</td><td><input name="totalamt" type="text"></td></tr>
<tr><td>advance amount</td><td><input name="advanceamt" type="text"></td></tr>
<tr><td>balance amount</td><td><input name="balanceamt" type="text"></td></tr>
<tr><td></td><td><input name="submit" type="submit" value="submit"></td></tr>
</table>
</div></form>
<?php
include('footer.php');
?>