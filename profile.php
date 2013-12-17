<?php include_once('inc/header.php') ?>

	<div role="main">

		<article data-route="profile">
			<div class="window">
				<img class="avatar" src="img/uploads/<?php echo strtolower($user->q('name')); ?>.jpg" alt="">
				<div class="table-wrapper">
					<table>
						<tr>
							<td><i class="fa fa-user fa-2x"></i>Family</td>
							<td><?php echo $user->q('name'); ?></td>
						</tr>
						<tr>
							<td><i class="fa fa-home"></i>Located since</td>
							<td><?php echo $user->q('created'); ?></td>
						</tr>
						<tr>
							<td><i class="fa fa-envelope"></i>E-mail</td>
							<td><?php echo $user->q('mail'); ?></td>
						</tr>
						<tr>
							<td><i class="fa fa-phone"></i>Telephone</td>
							<td>+31612443433</td>
						</tr>
					</table>
				</div>
			</div>
		</article>

		<article data-route="edit">
			<div class="window">
				<img class="avatar" src="img/uploads/<?php echo strtolower($user->q('name')); ?>.jpg" alt="">
				<form action="#/profile">
					<label for="family">Family</label><input type="text" value="Schoon">
					<label for="mail">E-mail</label><input type="text" value="schoon@schoondorp.nl">
					<label for="phone">Telephone</label><input type="text" value="+31612443433">
					
					<button class="grey">Cancel</button>
					<button>Save</button>
				</form>
			</div>
	</article>

	</div>

<?php include_once('inc/footer.php') ?>