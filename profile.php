<?php include_once('inc/header.php') ?>

	<div role="main">

		<article data-route="profile">
			<div class="window">
				<img class="avatar" src="img/uploads/<?php echo strtolower($user->q('name', $user->id())); ?>.jpg" alt="">
				<div class="table-wrapper">
					<table>
						<tr>
							<td><i class="fa fa-user fa-2x"></i>Family</td>
							<td><?php echo $user->q('name', $user->id()); ?></td>
						</tr>
						<tr>
							<td><i class="fa fa-users fa-2x"></i>Members</td>
							<td><?php echo $user->q('members', $user->id()); ?></td>
						</tr>
						<tr>
							<td><i class="fa fa-home"></i>Located since</td>
							<td><?php echo $user->q('created', $user->id()); ?></td>
						</tr>
						<tr>
							<td><i class="fa fa-envelope"></i>E-mail</td>
							<td><?php echo $user->q('mail', $user->id()); ?></td>
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
				<img class="avatar" src="img/uploads/<?php echo strtolower($user->q('name', $user->id())); ?>.jpg" alt="">
				<form action="#/profile">
					<label for="family">Family</label><input type="text" value="<?php echo $user->q('name', $user->id()); ?>">
					<label for="members">Members</label><input type="number" value="<?php echo $user->q('members', $user->id()); ?>">
					<label for="mail">E-mail</label><input type="text" value="<?php echo $user->q('mail', $user->id()); ?>">
					<label for="phone">Telephone</label><input type="text" value="+31612443433">
					
					<button class="grey">Cancel</button>
					<button>Save</button>
				</form>
			</div>
	</article>

	</div>

<?php include_once('inc/footer.php') ?>