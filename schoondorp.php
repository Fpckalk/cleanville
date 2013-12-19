<?php include_once('inc/header.php') ?>

<?php 
	// Set variables to be used by Javascript
	$current = $goal->current('summary');
	$endgoal = $goal->final_goal('summary');
	$endgoal = $endgoal['milestone'];
?>
<script>
	var current = "<?php echo $current ?>",
		goal = "<?php echo $endgoal ?>";
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
						<span><?php echo $data->values('trash'); ?></span><span>kg</span>
					</li>
				</ul>

				<h1>Goals</h1>
				<p>These goals are currently running</p>
				<figure class="full-progress-bar">
					<span class="progress-percentage"><?php echo $goal->percentage($current, $endgoal); ?></span>
					<span>0%</span>
					<span>100%</span>
					<figure class="progress">
						<div class="current"></div>
					</figure>
					<?php $summary = $goal->final_goal('summary'); ?>
					<span>Save <?php echo $summary['milestone']; ?> euros</span>
				</figure>
				<figure class="full-progress-bar">
					<span class="progress-percentage"><?php echo $goal->percentage($current, $endgoal); ?></span>
					<span>0%</span>
					<span>100%</span>
					<figure class="progress">
						<div class="current"></div>
					</figure>
					<?php $water = $goal->final_goal('water'); ?>
					<span>Save <?php echo $water['milestone']; ?> liters</span>
				</figure>
			</div>
		</aside>
		
		<!-- The Game -->
		<div id="game" class="game local">

			<div id="local" class="visible">
				<div class="bg"></div>

				<span>Zoom out to see your neighbours</span>

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
							<figure class="total">
								<span>Total</span>
								<span><?php echo $data->values('energy'); ?></span>
							</figure>
						</div>
						<div class="level">
							<div>
								<h2>Your house progress</h2>

								<figure class="full-progress-bar">
									<span class="progress-percentage"><?php echo $goal->percentage($current, $endgoal); ?></span>
									<span>0%</span>
									<span>100%</span>
									<figure class="progress">
										<div class="current"></div>
									</figure>
								</figure>
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
							<figure class="total">
								<span>Total</span>
								<span><?php echo $data->values('water'); ?></span>
							</figure>
						</div>
						<div class="level">
							<div>
								<h2>Your river progress</h2>

								<figure class="full-progress-bar">
									<span class="progress-percentage"><?php echo $goal->percentage($current, $endgoal); ?></span>
									<span>0%</span>
									<span>100%</span>
									<figure class="progress">
										<div class="current"></div>
									</figure>
								</figure>
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

				<div class="element trash">
					<img src="img/game/trash-<?php echo $game->get_level('trash'); ?>.png" alt="">
					<div class="circle">
						<div></div>
					</div>

					<div class="info window small">
						<header>
							<h1>Trash</h1>
							<div class="level level-<?php echo $game->get_level('trash'); ?>">
								Level
								<span>1</span>
								<span>2</span>
								<span>3</span>
							</div>
						</header>
						<div class="numbers">
							<figure class="total">
								<span>Total</span>
								<span><?php echo $data->values('trash'); ?></span>
							</figure>
						</div>
						<div class="level">
							<div>
								<h2>Your trash progress</h2>

								<figure class="full-progress-bar">
									<span class="progress-percentage"><?php echo $goal->percentage($current, $endgoal); ?></span>
									<span>0%</span>
									<span>100%</span>
									<figure class="progress">
										<div class="current"></div>
									</figure>
								</figure>
							</div>
							<div class="reward">
								<h2>Your reward</h2>
								<span>Level <?php echo $game->get_next_level('trash'); ?></span>
								<img src="img/game/lvl-icons/trash-<?php echo $game->get_next_level('trash'); ?>.jpg" alt="">
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
							<figure class="total">
								<span>Total</span>
								<span><?php echo $data->values('food'); ?></span>
							</figure>
						</div>
						<div class="level">
							<div>
								<h2>Your food progress</h2>

								<figure class="full-progress-bar">
									<span class="progress-percentage"><?php echo $goal->percentage($current, $endgoal); ?></span>
									<span>0%</span>
									<span>100%</span>
									<figure class="progress">
										<div class="current"></div>
									</figure>
								</figure>
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
					<?php endforeach; ?>
				</div>

			</div>
			
		</div>
	</article>

<?php include_once('inc/footer.php') ?>