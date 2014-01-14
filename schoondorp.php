<?php include_once('inc/header.php') ?>

<?php 
	// Set variables to be used by Javascript
	$current = $goal->current('summary');

	$elements = array('summary', 'water', 'energy', 'food', 'waste');
	$goals = array();
	$progress = array();

	foreach ($elements as $element) {
		$final_goal = $goal->final_goal($element);
		$progression = $data->values($element);

		array_push($goals, $final_goal);
		array_push($progress, $progression);
	}

?>
<script>
	var current = "<?php echo $current ?>",
		summary = "<?php echo $goals[0]['milestone'] ?>",
		water = "<?php echo $goals[1]['milestone'] ?>",
		energy = "<?php echo $goals[2]['milestone'] ?>",
		food = "<?php echo $goals[3]['milestone'] ?>",
		waste = "<?php echo $goals[4]['milestone'] ?>";

	var progress_water = "<?php echo $progress[1] ?>",
		progress_energy = "<?php echo $progress[2] ?>",
		progress_food = "<?php echo $progress[3] ?>",
		progress_waste = "<?php echo $progress[4] ?>";
</script>

	<article id="schoondorp">

		<div class="cancel"></div>

		<aside class="sidebar">
			<div id="pullout">
				<i class="fa fa-chevron-left fa-2x"></i>
			</div>
			<div class="content">
				<h1>Your overview</h1>
				<ul>
					<li class="energy">
						<img src="img/game/icons/energy.png" alt="">
						<span><?php echo $data->values('energy'); ?></span><span>kWh</span>
					</li>
					<li class="water">
						<img src="img/game/icons/water.png" alt="">
						<span><?php echo $data->values('water'); ?></span><span>liter</span>
					</li>
					<li class="food">
						<img src="img/game/icons/food.png" alt="">
						<span><?php echo $data->values('food'); ?></span><span>pieces</span>
					</li>
					<li class="waste">
						<img src="img/game/icons/waste.png" alt="">
						<span><?php echo $data->values('waste'); ?></span><span>kg</span>
					</li>
				</ul>

				<h1>Goals</h1>
				<p>These goals are currently running</p>
				<?php echo $goal->min_goal_progress('water', $current, $goals[0]['milestone']); ?>				
				<?php echo $goal->min_goal_progress('energy', $current, $goals[0]['milestone']); ?>
			</div>
		</aside>
		
		<!-- The Game -->
		<div id="game" class="game local">

			<div id="local" class="visible">
				<div class="bg"></div>

				<span class="help">Zoom out to see your neighbours</span>

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
							<h1>Energy usage</h1>
							<div class="level level-<?php echo $game->get_level('energy'); ?>">
								Level
								<span>1</span>
								<span>2</span>
								<span>3</span>
							</div>
						</header>
						<div class="numbers">
							<figure>
								<span>Total</span>
								<span><?php echo $data->values('energy'); ?></span>
							</figure>
							<figure>
								<span>In</span>
								<span>+8</span>
							</figure>
							<figure>
								<span>Out</span>
								<span>-6</span>
							</figure>
							<figure>
								<span>Growth</span>
								<span>+5%</span>
							</figure>
						</div>
						<div class="level">
							<div>
								<h2>Your house progress</h2>
								<?php echo $game->get_progress('energy', false) ?>
							</div>
							<div class="reward">
								<h2>Your reward</h2>
								<span>Level <?php echo $game->get_next_level('energy'); ?></span>
								<img src="img/game/lvl-icons/energy-<?php echo $game->get_next_level('energy'); ?>.jpg" alt="">
							</div>
						</div>
						<div class="how">
							<h2>How it works</h2><i class="fa fa-chevron-down fa-2x"></i>
							<p>Here you can see your water usage progress. The data is coming from your sensors and will be updated every day. When you saved water your river will grow with 5%. When there is more water out than in, your river level shrinks in size. When in and out are equal, your river stays the same.
Reached 100%? You’ll get a reward!</p>
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
							<div class="level level-<?php echo $game->get_level('water'); ?>">
								Level
								<span>1</span>
								<span>2</span>
								<span>3</span>
							</div>
						</header>
						<div class="numbers">
							<figure>
								<span>Total</span>
								<span><?php echo $data->values('water'); ?></span>
							</figure>
							<figure>
								<span>In</span>
								<span>+8</span>
							</figure>
							<figure>
								<span>Out</span>
								<span>-6</span>
							</figure>
							<figure>
								<span>Growth</span>
								<span>+5%</span>
							</figure>
						</div>
						<div class="level">
							<div>
								<h2>Your river progress</h2>
								<?php echo $game->get_progress('water', false) ?>
							</div>
							<div class="reward">
								<h2>Your reward</h2>
								<span>Level <?php echo $game->get_next_level('water'); ?></span>
								<img src="img/game/lvl-icons/river-<?php echo $game->get_next_level('water'); ?>.jpg" alt="">
							</div>
						</div>
						<div class="how">
							<h2>How it works</h2><i class="fa fa-chevron-down fa-2x"></i>
							<p>Here you can see your water usage progress. The data is coming from your sensors and will be updated every day. When you saved water your river will grow with 5%. When there is more water out than in, your river level shrinks in size. When in and out are equal, your river stays the same.
Reached 100%? You’ll get a reward!</p>
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
							<h1>Food usage</h1>
							<div class="level level-<?php echo $game->get_level('food'); ?>">
								Level
								<span>1</span>
								<span>2</span>
								<span>3</span>
							</div>
						</header>
						<div class="numbers">
							<figure>
								<span>Total</span>
								<span><?php echo $data->values('food'); ?></span>
							</figure>
							<figure>
								<span>In</span>
								<span>+8</span>
							</figure>
							<figure>
								<span>Out</span>
								<span>-6</span>
							</figure>
							<figure>
								<span>Growth</span>
								<span>+5%</span>
							</figure>
						</div>
						<div class="level">
							<div>
								<h2>Your food progress</h2>
								<?php echo $game->get_progress('food', false) ?>
							</div>
							<div class="reward">
								<h2>Your reward</h2>
								<span>Level <?php echo $game->get_next_level('food'); ?></span>
								<img src="img/game/lvl-icons/food-<?php echo $game->get_next_level('food'); ?>.jpg" alt="">
							</div>
						</div>
						<div class="how">
							<h2>How it works</h2><i class="fa fa-chevron-down fa-2x"></i>
							<p>Here you can see your water usage progress. The data is coming from your sensors and will be updated every day. When you saved water your river will grow with 5%. When there is more water out than in, your river level shrinks in size. When in and out are equal, your river stays the same.
Reached 100%? You’ll get a reward!</p>
						</div>
					</div>

				</div>


				<div class="element waste">
					<img src="img/game/waste-<?php echo $game->get_level('waste'); ?>.png" alt="">
					<div class="circle">
						<div></div>
					</div>

					<div class="info window small">
						<header>
							<h1>Waste</h1>
							<div class="level level-<?php echo $game->get_level('waste'); ?>">
								Level
								<span>1</span>
								<span>2</span>
								<span>3</span>
							</div>
						</header>
						<div class="numbers">
							<div class="numbers">
							<figure>
								<span>Total</span>
								<span><?php echo $data->values('waste'); ?></span>
							</figure>
							<figure>
								<span>In</span>
								<span>+8</span>
							</figure>
							<figure>
								<span>Out</span>
								<span>-6</span>
							</figure>
							<figure>
								<span>Growth</span>
								<span>+5%</span>
							</figure>
						</div>
						</div>
						<div class="level">
							<div>
								<h2>Your waste progress</h2>
								<?php echo $game->get_progress('waste', false) ?>
							</div>
							<div class="reward">
								<h2>Your reward</h2>
								<span>Level <?php echo $game->get_next_level('waste'); ?></span>
								<img src="img/game/lvl-icons/waste-<?php echo $game->get_next_level('waste'); ?>.jpg" alt="">
							</div>
						</div>
						<div class="how">
							<h2>How it works</h2><i class="fa fa-chevron-down fa-2x"></i>
							<p>Here you can see your water usage progress. The data is coming from your sensors and will be updated every day. When you saved water your river will grow with 5%. When there is more water out than in, your river level shrinks in size. When in and out are equal, your river stays the same.
Reached 100%? You’ll get a reward!</p>
						</div>
					</div>

				</div>

				

			</div>

			<div id="overview">
				
				<div class="popup">
					<h2>Write a message</h2>
					<i class="fa fa-2x fa-times"></i>
					<form id="mailuser">
						<input type="text" name="recipient" value="">
						<input type="text" class="subject" name="subject" placeholder="Subject">
						<textarea name="message" class="message" cols="30" rows="10" placeholder="Type your message here..."></textarea>
						<button>Send</button>
					</form>
				</div>

				<div class="bg"></div>

				<div id="profiles">
					<?php foreach ($fam->family() as $family) : ?>
						<div class="element profile">
							<img src="img/uploads/<?php echo strtolower($user->q('name', $family['ID'])); ?>.jpg" />
							<div class="window small">
								<div class="profile-info">
									<h1>Family <?php echo $family['name']; ?></h1>
									<span><?php echo $family['members']; echo ($family['members'] == 1) ? " member" : " members"; ?></span>
									<i class="mail fa fa-envelope"></i>
									<i class="toggle-progress fa fa-chevron-down"></i>
									<div class="progress-window">

										<span>Level</span>
										
										<img src="img/game/icons/water.png" alt="">
										<?php echo $game->get_progress('water', true); ?>
										<div class="level level-<?php echo $game->get_level('water'); ?>">
											<span>1</span>
											<span>2</span>
											<span>3</span>
										</div>
										
										<img src="img/game/icons/energy.png" alt="">
										<?php echo $game->get_progress('energy', true); ?>
										<div class="level level-<?php echo $game->get_level('energy'); ?>">
											<span>1</span>
											<span>2</span>
											<span>3</span>
										</div>
										
										<img src="img/game/icons/food.png" alt="">
										<?php echo $game->get_progress('food', true); ?>
										<div class="level level-<?php echo $game->get_level('food'); ?>">
											<span>1</span>
											<span>2</span>
											<span>3</span>
										</div>
										
										<img src="img/game/icons/waste.png" alt="">
										<?php echo $game->get_progress('waste', true); ?>
										<div class="level level-<?php echo $game->get_level('waste'); ?>">
											<span>1</span>
											<span>2</span>
											<span>3</span>
										</div>
									</div>

								</div>
							</div>
						</div>
					<?php endforeach; ?>
				</div>

			</div>
			
		</div>
	</article>

<?php include_once('inc/footer.php') ?>