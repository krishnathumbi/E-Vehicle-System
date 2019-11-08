<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Untitled Document</title>
</head>
<body>
<form method="post" enctype="multipart/form-data">
<input type="text" name="mob" id="one"/>

<input type="text" name="msg" id="four" />
<input type="submit" name="send" value="send" />
</form>

<?php

/*
 *
 *  Author Name     : shibu.vs tektide
 *  Email           : shibuvs89@gmail.com
 *  Created on      : 2012-07-14
 *  Updated on	    : 2013-01-19
 *  Description     : Send SMS
 *
 *  Copyright 2012 Openshell. All rights reserved.
 */
 if(isset($_POST['send']))
 {
$uid = '8129727137';
$pwd = '12133052';

$phone = $_POST['mob'];
$msg = 'Your activation code:' .rand(1000,9999);
$provider = 'Site2SMS';

$content = 'uid='.rawurlencode($uid).
'&pwd='.rawurlencode($pwd).
'&phone='.rawurlencode($phone).
'&msg='.rawurlencode($msg).
//'&codes=1'. // Use if you need a user freindly response message.
'&provider='.rawurlencode($provider);

$sms_response = file_get_contents('http://ubaid.tk/sms/sms.aspx?' . $content);

echo $sms_response;

  }
?>

</body>
</html>

