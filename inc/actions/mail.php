<?php
	
	include_once("../settings.php");

	$db = new DB_Class();

	$subject = $_POST['subject'];
	$message = $_POST['message'];
	$from = $_SESSION['familyID'];

	$query = mysql_query("INSERT INTO messages (title, message) VALUES ('$subject', '$message')");

?>