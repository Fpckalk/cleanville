<?php
	
	include_once("../settings.php");
	include_once("../functions.php");

	$db = new DB_Class();

	$subject = $_POST['subject'];
	$message = $_POST['message'];
	$date = date("Y-m-d");
	$from = $_SESSION['familyID'];
	$to = ucfirst($_POST['to']);

	// Double query, all the way
	$to = mysql_query("SELECT ID FROM families WHERE name = '$to'");
	$data = mysql_fetch_array($to, MYSQL_ASSOC);
	$to = $data['ID'];

	$query = mysql_query("INSERT INTO messages (title, message, sent, from_fam, to_fam) VALUES ('$subject', '$message', '$date', '$from', '$to')");

?>