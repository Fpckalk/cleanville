<?php

	include_once("inc/settings.php");
	
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
			$user = strtolower($user);
			$result = mysql_query("SELECT ID from families WHERE mail = '$user' AND password = '$pass'");

			$user_data = mysql_fetch_array($result);
			$rows = mysql_num_rows($result);

			if($rows == 1) {
				$_SESSION['user'] = true;
				$_SESSION['familyID'] = $user_data[0];
				header("Location: ./index.php");
			} else {
				header("Location: ./login.php");
			}
		}

		function logout()
		{
			$_SESSION['user'] = null;
		}

		function get_session($item)
		{
			if(isset($_SESSION[$item])) {
				return true;
			}
		}

		function id()
		{
			return $_SESSION['familyID'];
		}

		function q($target)
		{
			$id = $this->id();
			$result = mysql_query("SELECT * FROM families WHERE ID = '$id'");
			$data = mysql_fetch_array($result);

			return $data[$target];
		}

		// Just a number stored in the database
		// It's just arbitrary right now
		// There's no way yet to get the official number
		function current($sensor, $family)
		{
			$result = mysql_query("SELECT current from milestones where families_ID = '$family'");
			$current = mysql_result($result, 0);
			return $current;
		}

		function goal($sensor)
		{
			$result = mysql_query("SELECT milestone FROM milestones WHERE families_ID = {$_SESSION['familyID']}");
			$goal = mysql_result($result, 0);
			return $goal;
		}
	}

	/**
	* Page
	*/
	class Page
	{

		function get_page() {
			// Check if logged in or on login page to prevent loop
			// If not user will be redirected to login
			$page = explode("/", $_SERVER['REQUEST_URI']);	
			$page = explode("?", end($page));
			$page = $page[0];

			return $page;
		}

		function title() {
			$page = $this->get_page();
			$page = explode(".", $page);
			$page = $page[0];

			$titles = array(
				'explanation' => 'Explanation',
				'forgot' => 'Forgot Password',
				'index' => 'Dashboard',
				'' => 'Dashboard',
				'login' => 'Schoondorp',
				'profile' => 'Profile',
				'register' => 'Register',
				'schoondorp' => 'Schoondorp',
				'sensors' => 'Sensors',
				'settings' => 'Settings',
				'stats' => 'Data Usage'
				);

			return $titles[$page];
		}

		function redirect_login() {

			$page = $this->get_page();

			if(!$page || $page != 'login.php' && $page != 'forgot.php' && $page != 'register.php') {
				header("Location: ./login.php");
			}

		}
	}

	/**
	* Game
	*/
	class Game
	{

		function get_value($el)
		{
			$values = array(
				'energy' => 210,
				'water' => 67,
				'food' => 240,
				'trash' => 120
				);

			return $values[$el];
		}

		function get_level($el)
		{
			$value = $this->get_value($el);
			$breakpoints = array(100, 200, 300);
			$i = 0;

			foreach ($breakpoints as $bp) {
				if($value > $bp && $value < $breakpoints[2] ) {
					$i++;
				} else if($value > $breakpoints[2]) {
					return 3;
				} else {
					return $i + 1;
				}
			}
		}
		
	}

?>