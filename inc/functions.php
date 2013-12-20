<?php

	include_once("inc/settings.php");

	// Change Data->values for a different village
	
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
			if (isset($_SESSION['familyID'])) {
				return $_SESSION['familyID'];
			}
		}

		function q($target, $id)
		{	
			$result = mysql_query("SELECT $target FROM families WHERE ID = '$id'");
			$data = mysql_fetch_array($result);

			return $data[$target];
		}


	}

	/**
	* Family
	*/
	class Family
	{
		
		function family()
		{
			$result = mysql_query("SELECT * FROM families");
			$rows = array();

			while (($row = mysql_fetch_array($result, MYSQL_ASSOC))) {
				$rows[$row['ID']] = $row;
			}

			return $rows;
		}
	}

	/**
	* Messages
	*/
	class Message
	{

		function message()
		{
			$user = new User();
			$id = $user->id();
			$result = mysql_query("SELECT * FROM messages WHERE to_fam = '$id' ORDER BY sent DESC");

			$rows = array();

			while(($row = mysql_fetch_array($result, MYSQL_ASSOC))) {
			    $rows[$row['ID']] = $row;
			}

			return $rows;
		}
		
	}

	/**
	* Data
	*/
	class Data
	{
		function values($el)
		{
			$values = array(
				'energy' => 110,
				'water' => 67,
				'food' => 140,
				'trash' => 20
				);

			return $values[$el];
		}
	}

	/**
	* Goal
	*/
	class Goal
	{

		// Just a number stored in the database
		// It's just arbitrary right now
		// There's no way yet to get the official number
		function current($type)
		{
			$result = mysql_query("SELECT current FROM milestones WHERE families_ID = {$_SESSION['familyID']} AND type = '$type'");
			$data = mysql_fetch_array($result);

			return $data['current'];
		}

		function final_goal($type)
		{
			$result = mysql_query("SELECT * FROM milestones WHERE families_ID = {$_SESSION['familyID']} AND type = '$type'");
			$rows = array();

			while (($row = mysql_fetch_array($result, MYSQL_ASSOC))) {
				$rows[$row['ID']] = $row;
			}

			$rows = end($rows);

			return $rows;
		}

		function percentage($current, $goal) {
			$percent = ($current / $goal ) * 100;
			$percent = ceil($percent) . "%";
			return $percent;
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
				'messages' => 'Messages',
				'profile' => 'Profile',
				'register' => 'Create an account',
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
	class Game extends Data
	{

		function get_level($el)
		{

			$value = $this->values($el);
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

		function get_next_level($el) {
			$cur = $this->get_level($el);
			if ($cur < 3) {
				$cur += 1;
				return $cur;
			} else {
				return $cur;
			}
		}
		
	}

?>