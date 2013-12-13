<?php include_once('inc/header.php') ?>

	<div role="main">
	
		<nav role="aside">
			<ul>
				<li><a data-nav="general" href="#/general">General</a></li>
				<li><a data-nav="notifications" href="#/notifications">Notifications</a></li>
				<li><a data-nav="linkedmedia" href="#/linkedmedia">Linked Media</a></li>
				<li><a data-nav="contact" href="#/contact">Contact</a></li>
				<li><a href="./login.php?logout=1">Logout</a></li>
			</ul>
		</nav>

		<article data-route="general">
			<div class="window">
				<h1>General</h1>
				<h2>Language</h2>
				<p>Change your language for the whole app.</p>
				<select name="language" id="">
					<option value="english">English</option>
					<option value="dutch">Nederlands</option>
				</select>

				<h2>Terms and Conditions</h2>
				<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Totam, alias consequuntur voluptate distinctio est. Rem, reiciendis, accusamus consequuntur assumenda maxime fugit ad nam sapiente pariatur odio architecto expedita magni minus.</p>

				<a href="#">Deactivate your account</a>
			</div>	
		</article>

		<article data-route="notifications">
			<div class="window">
				<h1>Your notifications</h1>
				<p>Set your Schoondorp notifications so you're always up to date. E-mail me when:</p>

				<h2>General</h2>
				<input type="checkbox" value="newsupdate"><label for="">There is a new news update</label>
				<input type="checkbox" value="newmessage"><label for="">You've received a new message</label>

				<h2>Other updates</h2>
				<input type="checkbox" value="news"><label for="">Please e-mail me when Schoondorp has new updates and features</label>
				<input type="checkbox" value="digest"><label for="">Send me a monthly digest of recent activity in my network</label>
			</div>
		</article>

		<article data-route="linkedmedia">
			<div class="window">
				<h1>Your linked media</h1>
				<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Nesciunt, corporis, iste impedit blanditiis voluptates cum officiis consectetur eaque nobis deleniti at assumenda aut vero ex quo ducimus nostrum. Quaerat, assumenda!</p>

				<h2>Schoondorp values your privacy:</h2>
				<ul>
					<li>We will not post anything to your wall without permission</li>
					<li>You can specify a unique display name on your Account Settings page</li>
					<li>You can disconnect your Facebook account at any time</li>
				</ul>

				<a href="#">Connect with Facebook</a>
			</div>
		</article>

		<article data-route="contact">
			<div class="window">
				<h1>Let's talk</h1>
				<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Officiis incidunt nemo ea nostrum error nobis voluptas inventore ad illum voluptatum. Animi, repellat, porro quod doloremque vero beatae deleniti vitae aperiam.</p>
				
				<form action="">
					<input type="text" placeholder="Name">
					<textarea name="" id="" cols="30" rows="10" placeholder="Your message"></textarea>
					<button>Send</button>
				</form>
			</div>
		</article>
		
	</div>

<?php include_once('inc/footer.php') ?>