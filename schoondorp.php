<?php include_once('inc/header.php') ?>
	
	<article id="schoondorp">

		<div class="darken"></div>

		<aside class="sidebar">
			<div id="pullout">
				<i class="fa fa-chevron-left fa-2x"></i>
			</div>
			<div class="content">
				<h1>Your overview</h1>
				<ul>
					<li></li>
					<li></li>
					<li></li>
					<li></li>
				</ul>

				<h1>Goals</h1>
				<p>These goals are currently running</p>
				<a href="stats.php#/summary">General</a>
			</div>
		</aside>

		<div id="game" class="game local">

			<div id="local" class="visible">
				<div class="bg"></div>
				<div class="info">
					<h3>Energy usage</h3>
					<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Repudiandae, enim, tenetur iste magnam totam eveniet labore quas dolor animi culpa veritatis veniam corporis rerum quasi sed illum omnis nesciunt deleniti!</p>
				</div>

				<div class="element energy">
					<img src="img/game/energy-<?php echo $game->get_level('energy'); ?>.png" alt="">
					<i class="fa fa-circle"></i>
				</div>

				<div class="element river">
					<img src="img/game/river-<?php echo $game->get_level('water'); ?>.png" alt="">
				</div>

				<div class="element trash">
					<img src="img/game/trash-<?php echo $game->get_level('trash'); ?>.png" alt="">
				</div>

				<div class="element food">
					<img src="img/game/food-<?php echo $game->get_level('food'); ?>.png" alt="">
				</div>

			</div>

			<div id="overview">
				
				<div class="popup">
					<h2>Write a message</h2>
					<i class="fa fa-2x fa-times"></i>
					<form id="mailuser">
						<input type="text" class="subject" name="subject" placeholder="Subject">
						<textarea name="message" class="message" cols="30" rows="10" placeholder="Type your message here..."></textarea>
						<button>Send</button>
					</form>
				</div>

				<div class="bg"></div>

				<div class="element profile">
					<img src="img/profile.png" />
					<div class="window small">
						<div class="profile-info">
							<h1>Some Family</h1>
							<i class="mail fa fa-envelope"></i>
							<i class="toggle-progress fa fa-chevron-down"></i>
							<div class="progress">
								<ul>
									<li>Water</li>
									<li>Energy</li>
									<li>Food</li>
									<li>Trash</li>
								</ul>
							</div>
						</div>
					</div>
				</div>

				<div class="element profile">
					<img src="img/profile.png" />
					<div class="window small">
						<div class="profile-info">
							<h1>That other one</h1>
							<i class="mail fa fa-envelope"></i>
							<i class="toggle-progress fa fa-chevron-down"></i>
							<div class="progress">
								<ul>
									<li>Water</li>
									<li>Energy</li>
									<li>Food</li>
									<li>Trash</li>
								</ul>
							</div>
						</div>
					</div>
				</div>

			</div>
			
		</div>
	</article>

<?php include_once('inc/footer.php') ?>