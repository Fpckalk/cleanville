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

	<div role="main">
	
		<nav role="aside">
			<ul>
				<li><a href="#/summary">
						<img src="img/icons/general.png" alt="">
						General
				</a></li>
				<li><a href="#/water">
						<img src="img/icons/water.png" alt="">
						Water
					</a></li>
				<li><a href="#/energy">
						<img src="img/icons/energy.png" alt="">
						Energy
					</a></li>
				<li><a href="#/food">
						<img src="img/icons/food.png" alt="">
						Food
					</a></li>
				<li><a href="#/waste">
						<img src="img/icons/waste.png" alt="">
						Waste
					</a></li>
			</ul>
		</nav>

		<article data-route="summary">
			<section>
				<div class="window small w3">
					<div class="goal">
						<span>Save &euro;<?php echo $user->goal('general'); ?></span>
						<i class="fa fa-edit edit-goal"></i>
						<figure class="progress">
							<div class="current"></div>
						</figure>
					</div>
					<div class="popup">
						<h2>Change your goal</h2>
						<i class="fa fa-times"></i>
						<form>
							<label>Save:</label>
							<input class="goal" type="numeric" placeholder="50">
							<label>Start goal at</label>
							<input class="starting-date" type="date">
							<label>End goal at</label>
							<input class="ending-date" type="date">
							<button>Set new goal</button>
						</form>
					</div>
				</div>
				
				<div class="window small w2">
					<figure class="graph">
						
					</figure>
				</div>
				
				<div class="window small w1">
					<aside class="tip">
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
						<span>Save &euro;<?php echo $user->goal('general'); ?></span>
						<i class="fa fa-edit edit-goal"></i>
						<figure class="progress">
							<div class="current"></div>
						</figure>
					</div>
					<div class="popup">
						<h2>Change your goal</h2>
						<i class="fa fa-times"></i>
						<form>
							<label>Save:</label>
							<input class="goal" type="numeric" placeholder="50">
							<label>Start goal at</label>
							<input class="starting-date" type="date">
							<label>End goal at</label>
							<input class="ending-date" type="date">
							<button>Set new goal</button>
						</form>
					</div>
				</div>
				
				<div class="window small w2">
					<figure class="graph">
						
					</figure>
				</div>
				
				<div class="window small w1">
					<aside class="tip">
						<h1>Tip</h1>
						<p>Turn the water heater temperature to the middle setting at around 120° in order to keep the unit from wasting electricity. By wrapping the hot water piping with insulation, you’ll make you system efficient. Just these simple steps can save you 10% on heating costs.</p>
						<button>See more tips</button>
					</aside>
				</div>
			</section>
		</article>

		<article data-route="energy">
			<section>
				<div class="window small w3">
					<div class="goal">
						<span>Save &euro;<?php echo $user->goal('general'); ?></span>
						<i class="fa fa-edit edit-goal"></i>
						<figure class="progress">
							<div class="current"></div>
						</figure>
					</div>
					<div class="popup">
						<h2>Change your goal</h2>
						<i class="fa fa-times"></i>
						<form>
							<label>Save:</label>
							<input class="goal" type="numeric" placeholder="50">
							<label>Start goal at</label>
							<input class="starting-date" type="date">
							<label>End goal at</label>
							<input class="ending-date" type="date">
							<button>Set new goal</button>
						</form>
					</div>
				</div>
				
				<div class="window small w2">
					<figure class="graph">
						
					</figure>
				</div>
				
				<div class="window small w1">
					<aside class="tip">
						<h1>Tip</h1>
						<p>Turn the water heater temperature to the middle setting at around 120° in order to keep the unit from wasting electricity. By wrapping the hot water piping with insulation, you’ll make you system efficient. Just these simple steps can save you 10% on heating costs.</p>
						<button>See more tips</button>
					</aside>
				</div>
			</section>
		</article>

		<article data-route="food">
			<section>
				<div class="window small w3">
					<div class="goal">
						<span>Save &euro;<?php echo $user->goal('general'); ?></span>
						<i class="fa fa-edit edit-goal"></i>
						<figure class="progress">
							<div class="current"></div>
						</figure>
					</div>
					<div class="popup">
						<h2>Change your goal</h2>
						<i class="fa fa-times"></i>
						<form>
							<label>Save:</label>
							<input class="goal" type="numeric" placeholder="50">
							<label>Start goal at</label>
							<input class="starting-date" type="date">
							<label>End goal at</label>
							<input class="ending-date" type="date">
							<button>Set new goal</button>
						</form>
					</div>
				</div>
				
				<div class="window small w2">
					<figure class="graph">
						
					</figure>
				</div>
				
				<div class="window small w1">
					<aside class="tip">
						<h1>Tip</h1>
						<p>Turn the water heater temperature to the middle setting at around 120° in order to keep the unit from wasting electricity. By wrapping the hot water piping with insulation, you’ll make you system efficient. Just these simple steps can save you 10% on heating costs.</p>
						<button>See more tips</button>
					</aside>
				</div>
			</section>
		</article>

		<article data-route="waste">
			<section>
				<div class="window small w3">
					<div class="goal">
						<span>Save &euro;<?php echo $user->goal('general'); ?></span>
						<i class="fa fa-edit edit-goal"></i>
						<figure class="progress">
							<div class="current"></div>
						</figure>
					</div>
					<div class="popup">
						<h2>Change your goal</h2>
						<i class="fa fa-times"></i>
						<form>
							<label>Save:</label>
							<input class="goal" type="numeric" placeholder="50">
							<label>Start goal at</label>
							<input class="starting-date" type="date">
							<label>End goal at</label>
							<input class="ending-date" type="date">
							<button>Set new goal</button>
						</form>
					</div>
				</div>
				
				<div class="window small w2">
					<figure class="graph">
						
					</figure>
				</div>
				
				<div class="window small w1">
					<aside class="tip">
						<h1>Tip</h1>
						<p>Turn the water heater temperature to the middle setting at around 120° in order to keep the unit from wasting electricity. By wrapping the hot water piping with insulation, you’ll make you system efficient. Just these simple steps can save you 10% on heating costs.</p>
						<button>See more tips</button>
					</aside>
				</div>
			</section>
		</article>

	</div>


<?php include_once('inc/footer.php') ?>