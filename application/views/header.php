<?php
	$stylesheet = '/booking/css/style.css'.'?v='.filemtime('css/style.css');
	$banner = '/booking/images/banner.png'.'?v='.filemtime('images/banner.png');
?>

<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="utf-8">
	<title>Booking System - <?php echo $title;?></title>
	<link rel="stylesheet" type="text/css" href="<?php echo $stylesheet; ?>">
	<style>
		.topnav {
			overflow: hidden;
			background-color: #333;
			margin 0;
			display: flex;
			justify-content: center;
			z-index: 999;
		}

		.topnav a {
			color: #f2f2f2;
			text-align: center;
			padding: 12px;
			text-decoration: none;
			font-size: 17px;
			width: 150px;
		}

		.topnav a:hover {
			background-color: #ddd;
			color: black;
		}

		.topnav a.active {
			background-color: #3090FF;
			color: white;
		}

		.content {
			padding: 0px;
		}

		.sticky {
			position: fixed;
			top: 0px;
			width: 100%
		}

		sticky + .content {
			padding-top: 60px;
		}
	</style>
</head>

<body class = "body" onscroll="scorlldown()">
	<div class = "header">
		<img src = "<?php echo $banner; ?>" alt="top-banner" width=100% height=170>
	</div>

	<div class = "topnav" id = "topnav">
		<a <?php echo ($title == 'Home')?'class="active"':'href="/booking"'; ?>>Home</a>
		<a <?php echo ($title == 'Find a Session')?'class="active"':'href="/booking/findSession"'; ?>>Find a session</a>
		<a <?php echo ($title == 'Contact')?'class="active"':'href="/booking/contact"'; ?>>Contact</a>
		<a <?php echo ($title == 'About us')?'class="active"':'href="/booking/about"'; ?>>About Us</a>
	</div>
