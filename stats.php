<?php include_once('inc/header.php') ?>
	
	<nav role="aside">
		<ul>
			<li><a href="#/summary">General</a></li>
			<li><a href="#/water">Water</a></li>
			<li><a href="#/energy">Energy</a></li>
			<li><a href="#/food">Food</a></li>
			<li><a href="#/waste">Waste</a></li>
		</ul>
	</nav>

	<article data-route="summary">
		<section>
			<div class="goal">
				<span>Save &euro;<?php echo $user->goal('general'); ?></span>
				<i class="fa fa-edit edit-goal"></i>
				<figure class="progress">
					<svg height="40">
						<rect x="10" y="10" height="30">
					</svg>
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

			<figure class="graph">
				
			</figure>
			
			<aside class="tip">
				<h1>Tip</h1>
				<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Quisque mollis nibh nec fermentum mattis. Duis at lobortis ligula, a tempor massa. Nulla ac accumsan est, ac ullamcorper nulla. Etiam auctor tortor ligula, vitae feugiat mi laoreet a. Maecenas interdum, mi ac fermentum elementum, nibh turpis suscipit libero, eu euismod dui odio in nunc. Nullam vestibulum enim interdum sem rhoncus rhoncus.</p>
				<a href="#">Bekijk meer tips</a>
			</aside>
		</section>
	</article>

	<article data-route="water">
		<section>
			<div class="goal">
				<span>50 euro besparen</span>
			</div>
			<figure class="graph">
				
			</figure>
			<aside class="tip">
				<h1>Tip</h1>
				<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Quisque mollis nibh nec fermentum mattis. Duis at lobortis ligula, a tempor massa. Nulla ac accumsan est, ac ullamcorper nulla. Etiam auctor tortor ligula, vitae feugiat mi laoreet a. Maecenas interdum, mi ac fermentum elementum, nibh turpis suscipit libero, eu euismod dui odio in nunc. Nullam vestibulum enim interdum sem rhoncus rhoncus.</p>
				<a href="#">Bekijk meer tips</a>
			</aside>
		</section>	
	</article>

	<article data-route="energy">
		<section>
			<div class="goal">
				<span>50 euro besparen</span>
			</div>
			<figure class="graph">
				
			</figure>
			<aside class="tip">
				<h1>Tip</h1>
				<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Quisque mollis nibh nec fermentum mattis. Duis at lobortis ligula, a tempor massa. Nulla ac accumsan est, ac ullamcorper nulla. Etiam auctor tortor ligula, vitae feugiat mi laoreet a. Maecenas interdum, mi ac fermentum elementum, nibh turpis suscipit libero, eu euismod dui odio in nunc. Nullam vestibulum enim interdum sem rhoncus rhoncus.</p>
				<a href="#">Bekijk meer tips</a>
			</aside>
		</section>	
	</article>

	<article data-route="food">
		<section>
			<div class="goal">
				<span>50 euro besparen</span>
			</div>
			<figure class="graph">
				
			</figure>
			<aside class="tip">
				<h1>Tip</h1>
				<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Quisque mollis nibh nec fermentum mattis. Duis at lobortis ligula, a tempor massa. Nulla ac accumsan est, ac ullamcorper nulla. Etiam auctor tortor ligula, vitae feugiat mi laoreet a. Maecenas interdum, mi ac fermentum elementum, nibh turpis suscipit libero, eu euismod dui odio in nunc. Nullam vestibulum enim interdum sem rhoncus rhoncus.</p>
				<a href="#">Bekijk meer tips</a>
			</aside>
		</section>	
	</article>

	<article data-route="waste">
		<section>
			<div class="goal">
				<span>50 euro besparen</span>
			</div>
			<figure class="graph">
				
			</figure>
			<aside class="tip">
				<h1>Tip</h1>
				<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Quisque mollis nibh nec fermentum mattis. Duis at lobortis ligula, a tempor massa. Nulla ac accumsan est, ac ullamcorper nulla. Etiam auctor tortor ligula, vitae feugiat mi laoreet a. Maecenas interdum, mi ac fermentum elementum, nibh turpis suscipit libero, eu euismod dui odio in nunc. Nullam vestibulum enim interdum sem rhoncus rhoncus.</p>
				<a href="#">Bekijk meer tips</a>
			</aside>
		</section>	
	</article>


<?php include_once('inc/footer.php') ?>