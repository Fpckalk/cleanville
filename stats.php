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

	<div class="darken cancel"></div>

	<div role="main">
		
		<div class="popup">
			<h2>Change your goal</h2>
			<p>This is the average goalsetting, you can change it if you want.</p>
			<i class="fa fa-times fa-2x"></i>
			<form id="goalform">
				<label>Save:</label>
				<figure>
					<span>&euro; 5</span>
					<span>&euro; 100</span>
					<span class="goalvalue">&euro; 15</span>
					<input class="goal" type="range" min="0" max="100" step="1" value="15">
				</figure>
				<label>Start goal at</label>
				<input class="starting-date" type="date" value="<?php echo date('Y-m-d'); ?>">
				<label>End goal at</label>
				<input class="ending-date" type="date" value="<?php echo date('Y-m-d', strtotime('+1 month')); ?>">
				<button>Set new goal</button>
			</form>
		</div>

	
		<nav role="aside">
			<ul>
				<li><a data-nav="summary" href="#/summary">
						<img src="img/icons/general.png" alt="">
						<span>General</span>
				</a></li>
				<li><a data-nav="water" href="#/water">
						<img src="img/icons/water.png" alt="">
						<span>Water</span>
					</a></li>
				<li><a data-nav="energy" href="#/energy">
						<img src="img/icons/energy.png" alt="">
						<span>Energy</span>
					</a></li>
				<li><a data-nav="food" href="#/food">
						<img src="img/icons/food.png" alt="">
						<span>Food</span>
					</a></li>
				<li><a data-nav="waste" href="#/waste">
						<img src="img/icons/waste.png" alt="">
						<span>Waste</span>
					</a></li>
			</ul>
		</nav>

		<article data-route="summary">
			<section>
				<div class="window small w3">
					<div class="goal">
						<?php $summary = $goal->final_goal('summary'); ?>
						<h1>Your goal: <span>Save &euro;<?php echo $summary['milestone']; ?></span></h1>						
						<i class="fa fa-edit edit-goal fa-2x"></i>
						<figure class="full-progress-bar">
							<span class="progress-percentage"><?php echo $goal->percentage($current, $endgoal); ?></span>
							<span>0%</span>
							<span>100%</span>
							<figure class="progress">
								<div class="current"></div>
							</figure>
						</figure>
						<span><?php echo $summary['start_date'] ?></span>
						<span><?php echo $summary['end_date'] ?></span>
					</div>
				</div>
				
				<div class="window small w2">
					<h1>Your savings</h1>
					<span>In &euro;</span>
					<figure class="graph">
						
					</figure>
				</div>
				
				<div class="window small w1">
					<aside>
						<h1>Tip</h1>
						<p>Turn the water heater temperature to the middle setting at around 120° in order to keep the unit from wasting electricity. By wrapping the hot water piping with insulation, you’ll make you system efficient. Just these simple steps can save you 10% on heating costs.</p>
						<button>See more tips</button>
					</aside>
				</div>
			</section>
		</article>

		<article data-route="water">
			<section>
				<div class="window small w3">
					<div class="goal">
						<?php $water = $goal->final_goal('water'); ?>
						<h1>Your goal: <span>Save <?php echo $water['milestone']; ?> liters</span></h1>		
						<i class="fa fa-edit edit-goal fa-2x"></i>
						<figure class="full-progress-bar">
							<span class="progress-percentage"><?php echo $goal->percentage($current, $endgoal); ?></span>
							<span>0%</span>
							<span>100%</span>
							<figure class="progress">
								<div class="current"></div>
							</figure>
						</figure>
						<span><?php echo $water['start_date'] ?></span>
						<span><?php echo $water['end_date'] ?></span>
					</div>
				</div>
				
				<div class="window small w2">
					<h1>Your water usage progress</h1>
					<span>In liters</span>
					<figure class="graph">
						
					</figure>
				</div>
				
				<div class="window small w1">
					<aside>
						<h1>Water usage</h1>
						<span>This week</span>
						<img class="ph" src="img/placeholder/water.png" alt="">
					</aside>
				</div>
			</section>
			<aside class="tip">
				<i class="fa fa-chevron-up fa-2x"></i>
				<h1>Tip</h1>
				<p>Turn the water heater temperature to the middle setting at around 120° in order to keep the unit from wasting electricity. By wrapping the hot water piping with insulation, you’ll make you system efficient. Just these simple steps can save you 10% on heating costs.</p>
			</aside>
		</article>

		<article data-route="energy">
			<section>
				<div class="window small w3">
					<div class="goal">
						<?php $energy = $goal->final_goal('energy'); ?>
						<h1>Your goal: <span>Save <?php echo $energy['milestone']; ?>kWh</span></h1>
						<i class="fa fa-edit edit-goal fa-2x"></i>
						<figure class="full-progress-bar">
							<span class="progress-percentage"><?php echo $goal->percentage($current, $endgoal); ?></span>
							<span>0%</span>
							<span>100%</span>
							<figure class="progress">
								<div class="current"></div>
							</figure>
						</figure>
						<span><?php echo $energy['start_date'] ?></span>
						<span><?php echo $energy['end_date'] ?></span>
					</div>
				</div>
				
				<div class="window small w2">
					<h1>Your energy usage progress</h1>
					<span>In kWh</span>
					<figure class="graph">
						
					</figure>
				</div>
				
				<div class="window small w1">
					<aside>
						<h1>Generated energy</h1>
						<span>This week</span>
						<img class="ph" src="img/placeholder/energy.png" alt="">
					</aside>
				</div>
			</section>
			<aside class="tip">
				<i class="fa fa-chevron-up fa-2x"></i>
				<h1>Tip</h1>
				<p>Turn the water heater temperature to the middle setting at around 120° in order to keep the unit from wasting electricity. By wrapping the hot water piping with insulation, you’ll make you system efficient. Just these simple steps can save you 10% on heating costs.</p>
			</aside>
		</article>

		<article data-route="food">
			<section>
				<div class="window small w3">
					<div class="goal">
						<?php $food = $goal->final_goal('food'); ?>
						<h1>Your goal: <span>Produce <?php echo $food['milestone']; ?> pieces</span></h1>		
						<i class="fa fa-edit edit-goal fa-2x"></i>
						<figure class="full-progress-bar">
							<span class="progress-percentage"><?php echo $goal->percentage($current, $endgoal); ?></span>
							<span>0%</span>
							<span>100%</span>
							<figure class="progress">
								<div class="current"></div>
							</figure>
						</figure>
						<span><?php echo $food['start_date'] ?></span>
						<span><?php echo $food['end_date'] ?></span>
					</div>
				</div>
				
				<div class="window small w2">
					<h1>Your food progress</h1>
					<span>In quantity</span>
					<figure class="graph">
						
					</figure>
				</div>
				
				<div class="window small w1">
					<aside>
						<h1>Produced food</h1>
						<span>This week</span>
						<img class="ph" src="img/placeholder/energy.png" alt="">
					</aside>
				</div>
			</section>
			<aside class="tip">
				<i class="fa fa-chevron-up fa-2x"></i>
				<h1>Tip</h1>
				<p>Turn the water heater temperature to the middle setting at around 120° in order to keep the unit from wasting electricity. By wrapping the hot water piping with insulation, you’ll make you system efficient. Just these simple steps can save you 10% on heating costs.</p>
			</aside>
		</article>

		<article data-route="waste">
			<section>
				<div class="window small w3">
					<div class="goal">
						<?php $trash = $goal->final_goal('waste'); ?>
						<h1>Your goal: <span>Save <?php echo $trash['milestone']; ?>kg</span></h1>		
						<i class="fa fa-edit edit-goal fa-2x"></i>
						<figure class="full-progress-bar">
							<span class="progress-percentage"><?php echo $goal->percentage($current, $endgoal); ?></span>
							<span>0%</span>
							<span>100%</span>
							<figure class="progress">
								<div class="current"></div>
							</figure>
						</figure>
						<span><?php echo $trash['start_date'] ?></span>
						<span><?php echo $trash['end_date'] ?></span>
					</div>
				</div>
				
				<div class="window small w2">
					<h1>Your waste usage progress</h1>
					<span>In kg</span>
					<figure class="graph">
						
					</figure>
				</div>
				
				<div class="window small w1">
					<aside>
						<h1>Waste count</h1>
						<span>This week</span>
						<img class="ph" src="img/placeholder/energy.png" alt="">
					</aside>
				</div>
			</section>
			<aside class="tip">
				<i class="fa fa-chevron-up fa-2x"></i>
				<h1>Tip</h1>
				<p>Turn the water heater temperature to the middle setting at around 120° in order to keep the unit from wasting electricity. By wrapping the hot water piping with insulation, you’ll make you system efficient. Just these simple steps can save you 10% on heating costs.</p>
			</aside>
		</article>

	</div>


<?php include_once('inc/footer.php') ?>