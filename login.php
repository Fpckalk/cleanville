<?php include_once('inc/header.php') ?>

	<div role="main">

		<article class="login">
			<div class="window">
				<section role="login">
					<form id="login" action="./index.php" method="POST">
						<input type="email" placeholder="Gebruikersnaam" name="user" id="user">
						<input type="password" placeholder="Wachtwoord" name="pass" id="pass">
						<a href="forgot.php">Forgot your password?</a>
						<button>Log in</button>
					</form>
					<a href="">Create an account</a>
				</section>
			</div>
		</article>

	</div>

<?php include_once('inc/footer.php') ?>