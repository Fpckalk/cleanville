<?php
	session_start();

	error_reporting(E_ALL);

	// Assigning login value to Session
	if(isset($_GET['login'])) {
		$_SESSION['login'] = $_GET['login'];
	}

	// Check if logged in or on login page to prevent loop
	// If not user will be redirected to login
	$page = explode("/", $_SERVER['REQUEST_URI']);
	$page = explode("?", end($page));
	$page = $page[0];

	if(isset($_SESSION['login'])) {
		
	} else if ($page == "login.php") {
		
	} else if (!$page || $page == 'index.php'){
		header("Location: ./login.php");
	}
?>
<html>
<head>
	<meta charset="UTF-8">
	<title>Cleanville</title>
	<meta name="viewport" content="user-scalable=no, width=device-width, initial-scale=1, maximum-scale=1">

	<meta name="apple-mobile-web-app-capable" content="yes">
	<meta name="apple-mobile-web-app-status-bar-style" content="black-translucent">
	
	<link rel="stylesheet" href="css/import.css">
</head>
<body>

	<header>
		<?php if($page && $page != 'index.php'): ?>
			<a href="./" role="back"><i class="fa fa-chevron-left fa-2x"></i></a>
		<?php endif; ?>
		<h1 data-bind="title">Dashboard</h1>
		<nav role="main">
			<ul>
				<li><a href="#"><i class="fa fa-cog fa-2x"></i></a></li>
				<li><a href="#"><i class="fa fa-user fa-2x"></i></a></li>
			</ul>
		</nav>
	</header>