<?php include_once('inc/header.php') ?>

	<div role="main">
		<article class="login">
			<div class="window">
				<section role="login">
					<h1>Don't panic, we got you covered</h1>
					<p>Give us the e-mail address you use to log in to Schoondorp and we’ll send you instructions for resetting your password. Yes, it’s just that easy.</p>
					<form id="forgot" action="login.php">
						<input type="mail" placeholder="E-mail" name="mail" id="mail">
						<button>Send</button>
					</form>
				</section>
			</div>
		</article>
	</div>

<?php include_once('inc/footer.php') ?>