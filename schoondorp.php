<?php include_once('inc/header.php') ?>
	
	<article id="schoondorp">

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
				<div class="bg"></div>
				<div class="info">
					<div class="family">
						<h3>Family Kalk</h3>
						<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Voluptatem, dolorum, illum dicta expedita perferendis voluptatum quisquam mollitia sunt ipsa molestiae error dolores veniam voluptates dignissimos quas cum sint aspernatur blanditiis.</p>
					</div>
				</div>
				<div class="element village">
					<img src="http://placehold.it/100x100&text=My+House" alt="">
				</div>
			</div>
			
		</div>
	</article>

<?php include_once('inc/footer.php') ?>