<?php
	
	include_once("../settings.php");

	$db = new DB_Class();

	$goal = $_POST['goal'];
	$start = $_POST['start'];
	$end = $_POST['end'];
	$type = $_POST['type'];
	$family = $_SESSION['familyID'];

	$query = mysql_query("INSERT INTO milestones (milestone, start_date, end_date, type, families_ID) VALUES ('$goal', '$start', '$end', '$type', '$family')");

?>