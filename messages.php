<?php include_once('inc/header.php') ?>

<div id="menu">
	<img src="img/game/icons/mail.png" alt="">
</div>

<div role="main">
	


	<article class="messages">
		<div class="window">
			<section id="bericht1">
				
				<!--  <img class="avatar" src="img/uploads/<?php echo strtolower($user->q('name')); ?>.jpg" alt=""> -->
				
				
				<img src="img/profiel.jpg"/>
				
				
				<div id="date"> <?php
				// Print the array from getdate()
				print_r(getdate());
				echo "<br><br>";

				// Return date/time info of a timestamp; then format the output
				$mydate=getdate(date("U"));
				echo "$mydate[month] $mydate[mday], $mydate[year]";
				?> </div>
				
				<h1 data-bind="title"></h1>
				<h1 data-bind="naam"></h1>
				
				<p> Lorem ipsum dolor sit amet, consectetur adipiscing elit. Maecenas ornare, risus sed convallis luctus, nulla erat venenatis est, eu pulvinar est magna sit amet turpis. Suspendisse dictum adipiscing libero, non commodo est pellentesque ac. Phasellus accumsan est ac sem molestie pellentesque. Pellentesque a imperdiet eros, nec volutpat dui. Donec nisi mi, dictum vel scelerisque aliquet, tempor a tellus. </p>
			</section>
		</div>
		
		<div class="window">
			<section id="bericht2">
				
				<!--  <img class="avatar" src="img/uploads/<?php echo strtolower($user->q('name')); ?>.jpg" alt=""> -->
				
				<img src="img/profiel.jpg"  />
				
				<div id="date"> <?php
				// Print the array from getdate()
				print_r(getdate());
				echo "<br><br>";

				// Return date/time info of a timestamp; then format the output
				$mydate=getdate(date("U"));
				echo "$mydate[month] $mydate[mday], $mydate[year]";
				?> </div>
				
				<h1 data-bind="naam"></h1>
				<h1 data-bind="title"></h1>
				
				<p> Lorem ipsum dolor sit amet, consectetur adipiscing elit. Maecenas ornare, risus sed convallis luctus, nulla erat venenatis est, eu pulvinar est magna sit amet turpis. </p>
			</section>
		</div>
		
		<div class="window">
			<section id="bericht3">
				
				<!--  <img class="avatar" src="img/uploads/<?php echo strtolower($user->q('name')); ?>.jpg" alt=""> -->
				
				<img src="img/profiel.jpg"/>
				
				<div id="date"> <?php
				// Print the array from getdate()
				print_r(getdate());
				echo "<br><br>";

				// Return date/time info of a timestamp; then format the output
				$mydate=getdate(date("U"));
				echo "$mydate[month] $mydate[mday], $mydate[year]";
				?> </div>
				
				<h1 data-bind="naam"></h1>
				<h1 data-bind="title"></h1>
				
				<p> Lorem ipsum dolor sit amet, consectetur adipiscing elit. Maecenas ornare, risus sed convallis luctus, nulla erat venenatis est, eu pulvinar est magna sit amet turpis. </p>
			</section>
		</div>
		
		
	</div>
</article>

</div>

<?php include_once('inc/footer.php') ?>