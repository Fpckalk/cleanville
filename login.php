<?php include_once('inc/header.php') ?>

	<article class="login">
		<div class="window">
			<section role="login">
				<h2>Log in met uw Schoondorp account</h2>
				<form id="login" action="./index.php" method="POST">
					<input type="text" placeholder="Gebruikersnaam" name="user" id="user">
					<input type="password" placeholder="Wachtwoord" name="pass" id="pass">
					<!-- <a href="index.php?login=1">Log in</a> -->
					<input type="submit" value="Log in">
				</form>
			</section>
		</div>
	</article>

<?php include_once('inc/footer.php') ?>