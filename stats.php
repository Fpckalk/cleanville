<?php include_once('inc/header.php') ?>
<?php 
	// Set variables to be used by Javascript
	$current = $goal->current('summary');

	$elements = array('summary', 'water', 'energy', 'food', 'waste');
	$goals = array();

	foreach ($elements as $element) {
		$final_goal = $goal->final_goal($element);
		array_push($goals, $final_goal);
	}

?>
<script>
	var current = "<?php echo $current ?>",
		summary = "<?php echo $goals[0]['milestone'] ?>",
		water = "<?php echo $goals[1]['milestone'] ?>",
		energy = "<?php echo $goals[2]['milestone'] ?>",
		food = "<?php echo $goals[3]['milestone'] ?>",
		waste = "<?php echo $goals[4]['milestone'] ?>";
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
						<?php $goal->goal_progress('summary', $current, $goals[0]['milestone']); ?>
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
						<ul>
							<li><p>Turn the water heater temperature to the middle setting at around 120° in order to keep the unit from wasting electricity. By wrapping the hot water piping with insulation, you’ll make you system efficient. Just these simple steps can save you 10% on heating costs.</p></li>
							<li><p>Alias, perspiciatis, eius, illum nemo iure saepe quis quibusdam accusantium molestias animi harum repellendus nesciunt voluptates atque fuga beatae non? Totam, nostrum.</p></li>
							<li><p>Maiores, nulla, deserunt, consequuntur, temporibus aliquam asperiores eligendi aut vitae officia tempora obcaecati ut praesentium autem! Iste deleniti quis doloremque ad quas?</p></li>
						</ul>
						<button>See more tips</button>
					</aside>
				</div>
			</section>
		</article>

		<article data-route="water">
			<section>
				<div class="window small w3">
					<div class="goal">
						<?php $goal->goal_progress('water', $current, $goals[1]['milestone']); ?>
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
						<?php $goal->goal_progress('energy', $current, $goals[2]['milestone']); ?>
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
						<?php $goal->goal_progress('food', $current, $goals[3]['milestone']); ?>
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
						<?php $goal->goal_progress('waste', $current, $goals[4]['milestone']); ?>
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