
	<?php
	// For admin:
	// Username: Claires
	// password: opensesame

	// For fred
	// username: Fred
	// password: ok
	
	if (isset($_POST['submit'])) {

		foreach($users as $user){
			if (($_POST['password'] == $user['password']) && ($_POST['username'] == $user['username'])) {
				$_SESSION['loggedin'] = true;
				$_SESSION['loggedUsername'] = $user['username'];
				$_SESSION['userRole'] = $user['role'];	
			}
		}
		
	}


	if (isset($_SESSION['loggedin']) && $_SESSION['loggedin'] == true) {
		// admin home of the website to login 
		// if user is logged in
		// following message is shown
	?>
	<section class="right">
	<h2>You are now logged in</h2>
	</section>
	<?php
	}

	else {
		?>
		<main class="admin">
		<h2>Log in</h2>

		<form method="post" style="padding: 40px">

			<label>Enter Username</label>
			<input type="text" name="username" />

			<label>Enter Password</label>
			<input type="password" name="password" />

			<input type="submit" name="submit" value="Log In" />
		</form>
	</main>
	<?php
	}
	?>
