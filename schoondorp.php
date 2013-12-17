<?php include_once('inc/header.php') ?>

<?php 
	// Set variables to be used by Javascript
	$current = $user->current('general', $user->id());
	$goal = $user->goal('general');
?>
<script>
	var current = "<?php echo $current ?>",
		goal = "<?php echo $goal ?>";
</script>

	<article id="schoondorp">

		<div class="darken"></div>

		<aside class="sidebar">
			<div id="pullout">
				<i class="fa fa-chevron-left fa-2x"></i>
			</div>
			<div class="content">
				<h1>Your overview</h1>
				<ul>
					<li class="energy">
						<img src="img/game/icons/energy.png" alt="">
						<span>8</span><span>kWh</span>
					</li>
					<li class="water">
						<img src="img/game/icons/water.png" alt="">
						<span>48</span><span>liter</span>
					</li>
					<li class="food">
						<img src="img/game/icons/food.png" alt="">
						<span>9</span><span>pieces</span>
					</li>
					<li class="waste">
						<img src="img/game/icons/waste.png" alt="">
						<span>2</span><span>kg</span>
					</li>
				</ul>

				<h1>Goals</h1>
				<p>These goals are currently running</p>
				<a href="stats.php#/summary">
					<figure class="progress">
						<div class="current"></div>
					</figure>
				</a>
			</div>
		</aside>

		<div id="game" class="game local">

			<div id="local" class="visible">
				<div class="bg"></div>

				<!-- The Metabolic Crew -->
				<div id="chars">
					<img src="img/chars/chris.png" alt="">
					<img src="img/chars/wouter.png" alt="">
					<img src="img/chars/alex.png" alt="">
					<img src="img/chars/guus.png" alt="">
				</div>

				<div class="element energy">
					<img src="img/game/energy-<?php echo $game->get_level('energy'); ?>.png" alt="">
					<div class="circle">
						<div></div>
					</div>
					<div class="info window small">
						<header>
							<h1>Water usage</h1>
							<div class="level">
								Level
								<span>1</span>
								<span>2</span>
								<span>3</span>
							</div>
						</header>
						<div class="level">
							<div class="progress">
								<h2>Your river progress</h2>
								<figure class="progress">
									<div class="current"></div>
								</figure>
							</div>
							<div class="reward">
								<h2>Your reward</h2>
								<img src="http://placehold.it/130x130" alt="">
							</div>
						</div>
						<div class="how">
							<h2>How it works</h2><i class="fa fa-chevron-down fa-2x"></i>
							<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Dolores, architecto, aperiam, doloribus, perferendis culpa nostrum tempore placeat distinctio odio quibusdam quaerat ducimus atque numquam iusto aut laudantium excepturi sequi dignissimos.</p>
						</div>
					</div>
				</div>

				<div class="element river">
					<img src="img/game/river-<?php echo $game->get_level('water'); ?>.png" alt="">
					<div class="circle">
						<div></div>
					</div>
					<div class="info window small">
						<header>
							<h1>Water usage</h1>
							<div class="level">
								Level
								<span>1</span>
								<span>2</span>
								<span>3</span>
							</div>
						</header>
						<div class="level">
							<div class="progress">
								<h2>Your river progress</h2>
								<figure class="progress">
									<div class="current"></div>
								</figure>
							</div>
							<div class="reward">
								<h2>Your reward</h2>
								<img src="http://placehold.it/130x130" alt="">
							</div>
						</div>
						<div class="how">
							<h2>How it works</h2><i class="fa fa-chevron-down fa-2x"></i>
							<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Dolores, architecto, aperiam, doloribus, perferendis culpa nostrum tempore placeat distinctio odio quibusdam quaerat ducimus atque numquam iusto aut laudantium excepturi sequi dignissimos.</p>
						</div>
					</div>
				</div>

				<div class="element trash">
					<img src="img/game/trash-<?php echo $game->get_level('trash'); ?>.png" alt="">
					<div class="circle">
						<div></div>
					</div>
					<div class="info window small">
						<header>
							<h1>Water usage</h1>
							<div class="level">
								Level
								<span>1</span>
								<span>2</span>
								<span>3</span>
							</div>
						</header>
						<div class="level">
							<div class="progress">
								<h2>Your river progress</h2>
								<figure class="progress">
									<div class="current"></div>
								</figure>
							</div>
							<div class="reward">
								<h2>Your reward</h2>
								<img src="http://placehold.it/130x130" alt="">
							</div>
						</div>
						<div class="how">
							<h2>How it works</h2><i class="fa fa-chevron-down fa-2x"></i>
							<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Dolores, architecto, aperiam, doloribus, perferendis culpa nostrum tempore placeat distinctio odio quibusdam quaerat ducimus atque numquam iusto aut laudantium excepturi sequi dignissimos.</p>
						</div>
					</div>
				</div>

				<div class="element food">
					<img src="img/game/food-<?php echo $game->get_level('food'); ?>.png" alt="">
					<div class="circle">
						<div></div>
					</div>
					<div class="info window small">
						<header>
							<h1>Water usage</h1>
							<div class="level">
								Level
								<span>1</span>
								<span>2</span>
								<span>3</span>
							</div>
						</header>
						<div class="level">
							<div class="progress">
								<h2>Your river progress</h2>
								<figure class="progress">
									<div class="current"></div>
								</figure>
							</div>
							<div class="reward">
								<h2>Your reward</h2>
								<img src="http://placehold.it/130x130" alt="">
							</div>
						</div>
						<div class="how">
							<h2>How it works</h2><i class="fa fa-chevron-down fa-2x"></i>
							<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Dolores, architecto, aperiam, doloribus, perferendis culpa nostrum tempore placeat distinctio odio quibusdam quaerat ducimus atque numquam iusto aut laudantium excepturi sequi dignissimos.</p>
						</div>
					</div>
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