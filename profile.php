<?php include_once('inc/header.php') ?>

	<div role="main">

		<article data-route="profile">
			<div class="window">
				<img class="avatar" src="http://placehold.it/150x150" alt="">
				<table>
					<tr>
						<td>Family</td>
						<td>Schoon</td>
					</tr>
					<tr>
						<td>Located since</td>
						<td>2014</td>
					</tr>
					<tr>
						<td>E-mail</td>
						<td>schoon@schoondorp.nl</td>
					</tr>
					<tr>
						<td>Telephone</td>
						<td>+31612443433</td>
					</tr>
				</table>
			</div>
		</article>

		<article data-route="edit">
			<div class="window">
				<img class="avatar" src="http://placehold.it/150x150" alt="">
				<form action="#/profile">
					<label for="family">Family</label><input type="text" value="Schoon">
					<label for="mail">E-mail</label><input type="text" value="schoon@schoondorp.nl">
					<label for="phone">Telephone</label><input type="text" value="+31612443433">
					
					<button>Cancel</button>
					<button>Save</button>
				</form>
			</div>
	</article>

	</div>

<?php include_once('inc/footer.php') ?>