<?php
date_default_timezone_set("Asia/Kolkata");
error_reporting(E_ALL ^ E_NOTICE);
error_reporting(E_ALL ^ E_DEPRECATED);
///Database interface ////
include_once('dbi.php');
session_start();
//Load controller ///
$filename=basename($_SERVER['PHP_SELF'], ".php");
//echo $filename;
$controller=$filename.'_controller.php';
	
if(file_exists($controller))
	include_once($controller);
function rediret_user()
	{
		if (!isset($_SESSION["uid"]))
		{
			header("location:login.php");
		}
		
	}
function rediret_admin()
	{
		if (!isset($_SESSION["username"]))
		{
			header("location:index.php");
		}
		
	}
function isadmin()
{
	
	if (isset($_SESSION['login_user']))
	{
		
		return 1;
			//header("location:login.php");
	}
	else
	{
		return 0;
	}
		
}

?>