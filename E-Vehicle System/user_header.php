<!DOCTYPE html>
	<html lang="en">
	<head>
	<title>Vehicle Leasing</title>
	<meta charset="utf-8">
	<link rel="stylesheet" type="text/css" media="screen" href="css/reset.css">
	<link rel="stylesheet" type="text/css" media="screen" href="css/style.css">
	<link rel="stylesheet" type="text/css" media="screen" href="css/slider.css">
	    <link rel="stylesheet" href="css/style1.css" media="screen" type="text/css" />
	<link href='http://fonts.googleapis.com/css?family=Open+Sans+Condensed:700,300' rel='stylesheet' type='text/css'>
	<script src="js/jquery-1.7.min.js"></script>
	<script src="js/jquery.easing.1.3.js"></script>
	<script src="js/tms-0.4.1.js"></script>
	<script>
	$(document).ready(function () {
		$('.slider')._TMS({
			show: 0,
			pauseOnHover: true,
			prevBu: '.prev',
			nextBu: '.next',
			playBu: false,
			duration: 500,
			preset: 'fade',
			pagination: true, //'.pagination',true,'<ul></ul>'
			pagNums: false,
			slideshow: 8000,
			numStatus: false,
			banners: 'fromBottom', // fromLeft, fromRight, fromTop, fromBottom
			waitBannerAnimation: false,
			progressBar: false
		})
	})
	$(function () {
		if ($(window).width() <= 1066) {
			$("#slider .prev").css("left", "55px")
			$("#slider .next").css("right", "55px")
		}
	})
	</script>
	<!--[if lt IE 9]>
	<link href='http://fonts.googleapis.com/css?family=Open+Sans+Condensed:300' rel='stylesheet' type='text/css'>
	<link href='http://fonts.googleapis.com/css?family=Open+Sans+Condensed:700' rel='stylesheet' type='text/css'>
	<script type="text/javascript" src="js/html5.js"></script>
	<link rel="stylesheet" type="text/css" media="screen" href="css/ie.css">
	<![endif]-->
	</head>
	<body>
	<div class="bg">
	  <header>
		<div class="main wrap">
		  <h1 style="color:white;font-size:50px;">Vehicle Leasing </h1>
		  <p>Kollam, Kerala <span>8 (800) 552 5975</span></p>
		</div>
		<nav>
		  <ul class="menu">
			<li class="current"><a href="index.php" class="home"><img src="images/home.jpg" alt=""></a></li>
			<li><a href="aboutus.php">About us</a></li>
			<li><a href="">Vehicle</a></li>
			<li><a href="">Rental Location</a></li>
			<li><a href="">Feedback</a></li>
			<li><a href="">contact</a></li>
		<li><a href="">signout</a></li>
		  </ul>
		  <div class="clear"></div>
		</nav>
	  </header>

</div>
<?php
	  include("front.php");
	  ?>
	  <section id="content">
		<div class="block-1 box-1">