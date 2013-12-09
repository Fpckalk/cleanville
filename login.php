<?php include_once('inc/header.php') ?>

	<article class="login">
		<div class="window">
			<section role="login">
				<form id="login" action="./index.php" method="POST">
					<input type="text" placeholder="Gebruikersnaam" name="user" id="user">
					<input type="password" placeholder="Wachtwoord" name="pass" id="pass">
					<a href="">Forgot your password?</a>
					<button>Log in</button>
				</form>
				<a href="">Create an account</a>
			</section>
		</div>
	</article>

<?php include_once('inc/footer.php') ?>