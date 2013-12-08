<?php
	
	include_once("settings.php");


	$db = new DB_Class();

	$query = mysql_query("INSERT INTO messages (title) VALUES ('Banana')");

?>