<?php

	include_once("inc/functions.php");

	$user = new User();
	$data = new Data();
	$goal = new Goal();
	$page = new Page();
	$game = new Game();

	$current_page = $page->get_page();

	if(!$user->get_session('user')) {
		$page->redirect_login();
	}

	if($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['user']) && isset($_POST['pass'])) {
		$username = $_POST['user'];
		$pass = $_POST['pass'];
		$user->login($username, $pass);
	}

	if(isset($_GET['logout'])) {
		$user->logout();
	}

?>
<html>
<head>
	<meta charset="UTF-8">
	<title>Schoondorp</title>
	<meta name="viewport" content="user-scalable=no, width=device-width, initial-scale=1, maximum-scale=1">

	<meta name="apple-mobile-web-app-capable" content="yes">
	<meta name="apple-mobile-web-app-status-bar-style" content="black-translucent">
	
	<link rel="stylesheet" href="css/import.css">
</head>
<body>

	<header>
		<?php if($current_page && $current_page != 'index.php' && $current_page != 'login.php'): ?>
			<a href="./" role="back"><i class="fa fa-chevron-left fa-2x"></i></a>
		<?php endif; ?>
		<h1><?php echo $page->title(); ?></h1>
		<?php if($current_page == 'profile.php'): ?>
			<nav role="main">
				<ul>
					<li><a href="#/edit"><i class="fa fa-edit fa-2x"></i></a></li>
				</ul>
			</nav>
		<?php endif; ?>
	</header>