<?php include_once('inc/header.php') ?>

	<article data-route="usage">
		<nav>
			<ul>
				<li><a href="#">Overzicht</a></li>
				<li><a href="#">Water</a></li>
				<li><a href="#">Energie</a></li>
				<li><a href="#">Voedsel</a></li>
				<li><a href="#">Afval</a></li>
			</ul>
		</nav>
		<section data-bind="overzicht">
			<div class="goal">
				<span>50 euro besparen</span>
			</div>
			<figure class="graph">
				<img src="http://lorempixel.com/500/300" alt="placeholder">
				<input type="range" min="jaar" max="dag">
			</figure>
			<aside class="tip">
				<h1>Tip</h1>
				<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Quisque mollis nibh nec fermentum mattis. Duis at lobortis ligula, a tempor massa. Nulla ac accumsan est, ac ullamcorper nulla. Etiam auctor tortor ligula, vitae feugiat mi laoreet a. Maecenas interdum, mi ac fermentum elementum, nibh turpis suscipit libero, eu euismod dui odio in nunc. Nullam vestibulum enim interdum sem rhoncus rhoncus.</p>
				<a href="#">Bekijk meer tips</a>
			</aside>
		</section>
		<section data-bind="water"></section>
		<section data-bind="energie"></section>
		<section data-bind="voedsel"></section>
		<section data-bind="afval"></section>
	</article>

<?php include_once('inc/footer.php') ?>