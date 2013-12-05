<?php

	session_start();

	error_reporting(E_ALL);

	// DB CNX
	define('DB_HOST', 'db.fpck.nl');
	define('DB_USER', 'fpcknl1q_kern');
	define('DB_PASS', 'twiggler34');
	define('DB_DATABASE', 'fpcknl1q_schndrp');
	define('BASE_URL', '');
	define('DOCUMENT_ROOT', $_SERVER['DOCUMENT_ROOT']);

	/**
	* DB_Class
	*/
	class DB_Class
	{
		
		function __construct()
		{
			$connection = mysql_connect(DB_HOST, DB_USER, DB_PASS)
				or die('Connection error -> ' . mysql_error());

			mysql_select_db(DB_DATABASE, $connection)
				or die ('Database error -> ' . mysql_error());
		}
	}

?>