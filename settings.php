<?php include_once('inc/header.php') ?>

	<div role="main" id="settings">
	
		<nav role="aside">
			<ul>
				<li><a data-nav="general" href="#/general">
					<img src="img/icons/setting-general.png" alt="">
					<span>General</span>
				</a></li>
				<li><a data-nav="notifications" href="#/notifications">
					<img src="img/icons/setting-notifications.png" alt="">
					<span>Notifications</span>
				</a></li>
				<li><a data-nav="linkedmedia" href="#/linkedmedia">
					<img src="img/icons/setting-linked.png" alt="">
					<span>Linked Media</span>
				</a></li>
				<li><a data-nav="contact" href="#/contact">
					<img src="img/icons/setting-contact.png" alt="">
					<span>Contact</span>
				</a></li>
				<li><a class="logout" href="./login.php?logout=1">
					<span>Logout</span>
				</a></li>
			</ul>
		</nav>

		<article data-route="general">
			<div class="window">
				<h1>General</h1>
				<h3>Language</h3>
				<p>Change your language for the whole app.</p>
				<select name="language" id="">
					<option value="english">English</option>
					<option value="dutch">Nederlands</option>
				</select>

				<h3>Terms and Conditions</h3>
				<p>You are responsible for your use of Schoondorp, for any content you post to the Schoondorp, and for any consequences thereof. The content you submit, or display can be viewed by other users of this service.</p>
				<p>You should only provide content that you are comfortable sharing with others under these Terms. Any information that you provide to Schoondorp is subject to our Privacy Policy, which governs our collection and use of your information.</p>
				
				<p>App version 1.0<br />Made by De Kern</p>

				<a href="#" id="deactivate">Deactivate your account</a>
			</div>	
		</article>

		<article data-route="notifications">
			<div class="window">
				<h1>Your notifications</h1>
				<p>Set your Schoondorp notifications so you're always up to date.<br />E-mail me when:</p>

				<h3>General</h3>
				<input type="checkbox" name="newsupdate" value="newsupdate"><label for="newsupdate">There is a new news update</label>
				<input type="checkbox" name="newmessage" value="newmessage"><label for="newmessage">I've received a new message</label>

				<h3>Other updates</h3>
				<input type="checkbox" name="news" value="news"><label for="news">Please e-mail me when Schoondorp has new updates and features</label>
				<input type="checkbox" name="digest" value="digest"><label for="digest">Send me a monthly digest of recent activity in my network</label>
			</div>
		</article>

		<article data-route="linkedmedia">
			<div class="window">
				<h1>Your linked media</h1>
				<p>Linking your Schoondorp account to Facebook is the easiest way to experience Schoondorp. When you link your account, we’ll let you know when your friends join Schoondorp. Please note we will not post anything to your wall without your permission.</p>

				<h3>Schoondorp values your privacy:</h3>
				<ul>
					<li>We will not post anything to your wall without permission</li>
					<li>You can specify a unique display name on your Account Settings page</li>
					<li>You can disconnect your Facebook account at any time</li>
				</ul>

				<button>
					<span class="fa-stack fa-lg">
						<i class="fa fa-square fa-stack-2x"></i>
						<i class="fa fa-facebook fa-stack-1x"></i>
					</span>
					Connect with Facebook
				</button>
			</div>
		</article>

		<article data-route="contact">
			<div class="window">
				<h1>Let's talk</h1>
				<p>Please feel free to contact us through this form. We are more than happy to get in touch with you! Naturally, we welcome any constructive feedback and suggestions about our application. This is highly appreciated!</p>
				
				<form action="">
					<input type="text" placeholder="Name">
					<textarea name="" id="" cols="30" rows="10" placeholder="Your message"></textarea>
					<button>Send</button>
				</form>
			</div>
		</article>
		
	</div>

<?php include_once('inc/footer.php') ?>