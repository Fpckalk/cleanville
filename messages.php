<?php include_once('inc/header.php') ?>

<div id="menu">
	<i class="fa fa-envelope fa-2x"></i>
</div>

<div class="cancel"></div>

<div role="main">

	<article id="messages">
		<?php foreach ($msg->message() as $message) : ?>
			<div class="window message">
				<section class="message">
					
					<img class="avatar" src="img/uploads/<?php echo strtolower($user->q('name', $message['from_fam'])); ?>.jpg" alt="" />
					
					<time datetime="<?php echo $message['sent']; ?>"><?php echo $message['sent']; ?></time>
					<h1>Family <?php echo $user->q('name', $message['from_fam']); ?></h1>
					<span><?php echo $message['title']; ?></span>
					
					<p><?php echo $message['message']; ?></p>
				</section>
			</div>
		<?php endforeach; ?>

		<div class="popup">
			<h2>Write a message</h2>
			<i class="fa fa-2x fa-times"></i>
			<form id="mail">
				<input type="text" name="recipient" placeholder="To">
				<input type="text" class="subject" name="subject" placeholder="Subject">
				<textarea name="message" class="message" cols="30" rows="10" placeholder="Type your message here..."></textarea>
				<button>Send</button>
			</form>
		</div>

	</article>

</div>

<?php include_once('inc/footer.php') ?>