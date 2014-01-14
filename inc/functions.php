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
				'waste' => 20
				);

			return (array_key_exists($el, $values)) ? $values[$el] : false;
			
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

		// The big one. This delivers a full fledged goal progress
		function goal_progress($el, $current, $goal)
		{
			if($this->final_goal($el)) {

				$typegoal = $this->final_goal($el);

				if ($current >= $typegoal['milestone']) {
					echo "<h1>Your goal: <span>Save &euro;" . $typegoal['milestone'] . "</span></h1>";
					echo "<i class='fa fa-edit edit-goal fa-2x'></i>";
					echo "Congratulations! You earned a christmas tree!";
					echo "<button class='edit-goal'>Set new goal</button>";
				} else {
					echo "<h1>Your goal: <span>Save &euro;" . $typegoal['milestone'] . "</span></h1>";
					echo "<i class='fa fa-edit edit-goal fa-2x'></i>";
					echo "<figure class='full-progress-bar $el'>
							<span class='progress-percentage'> " . $this->percentage($current, $typegoal['milestone']) . "</span>
							<span>0%</span>
							<span>100%</span>
							<figure class='progress'>
								<div class='current'></div>
							</figure>
						</figure>";
				}
			} else {
				echo "<h1>Your goal: <span>You haven't set a goal yet</span></h1>";
				echo "<button class='edit-goal'>Set new goal</button>";
				echo "<figure class='full-progress-bar $el'>
						<span>0%</span>
						<span>100%</span>
						<figure class='progress'></figure>
					</figure>";
			}
		}

		// The minified goal progress. For small use cases
		function min_goal_progress($el, $current, $goal)
		{
			if($this->final_goal($el)) {

				$typegoal = $this->final_goal($el);

				if ($current <= $typegoal['milestone']) {
					echo "<figure class='full-progress-bar $el'>
						<span class='progress-percentage'>" . $this->percentage($current, $typegoal['milestone']) . "</span>
						<span>0%</span>
						<span>100%</span>
						<figure class='progress'>
							<div class='current'></div>
						</figure>
						<span>Save " . $typegoal['milestone'] . " euros</span>
					</figure>";
				}

			}
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
				'stats' => 'Data Usage',
				'magazine' => 'Magazine'
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

		private $breakpoints = array(100, 200, 300);

		function get_level($el)
		{

			$value = $this->values($el);
			$i = 0;

			foreach ($this->breakpoints as $bp) {
				if($value > $bp && $value < $this->breakpoints[2] ) {
					$i++;
				} else if($value > $this->breakpoints[2]) {
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

		function get_progress($el, $min)
		{
			$goal = new Goal();
			$data = new Data();

			$current = $data->values($el);

			if(!$min) {
				echo "<figure class='full-progress-bar $el'>
					<span class='progress-percentage'>" . $goal->percentage($current, $this->breakpoints[2]) . "</span>
					<span>0%</span>
					<span>100%</span>
					<figure class='progress'>
						<div class='current'></div>
					</figure>
				</figure>";
			} else {
				echo "<figure class='full-progress-bar $el'>
					<figure class='progress'>
						<div class='current'></div>
					</figure>
				</figure>";
			}
		}
		
	}

?>