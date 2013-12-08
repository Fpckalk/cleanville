<?php

	include_once("/inc/settings.php");
	
	/**
	* User
	*/
	class User
	{
		// DB Connect
		function __construct()
		{
			$db = new DB_Class();
		}

		function login($user, $pass)
		{
			$pass = md5($pass);
			$result = mysql_query("SELECT ID from families WHERE mail = '$user' AND password = '$pass'");

			$user_data = mysql_fetch_array($result);
			$rows = mysql_num_rows($result);

			if($rows == 1) {
				$_SESSION['user'] = true;
				header("Location: ./index.php");
			} else {
				header("Location: ./login.php");
			}
		}

		public function logout()
		{
			$_SESSION['user'] = null;
		}

		public function get_session($item)
		{
			if(isset($_SESSION[$item])) {
				return true;
			}
		}
	}

	/**
	* Page
	*/
	class Page
	{
		
		public function __construct()
		{
			// Base code here
		}

		function get_page() {
			// Check if logged in or on login page to prevent loop
			// If not user will be redirected to login
			$page = explode("/", $_SERVER['REQUEST_URI']);	
			$page = explode("?", end($page));
			$page = $page[0];

			return $page;
		}

		function redirect_login() {

			$page = $this->get_page();

			if(!$page || $page != 'login.php') {
				header("Location: ./login.php");
			}

		}
	}

?>