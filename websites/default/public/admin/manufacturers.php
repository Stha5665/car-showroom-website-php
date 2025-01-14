<?php
require '../dbConnect.php';
session_start();
?>
<!DOCTYPE html>
<html>
	<head>
		<link rel="stylesheet" href="/styles.css"/>
		<title>Claires's Cars - Admin</title>
	</head>
	<body>
	<header>
		<section>
			<aside>
				<h3>Opening Hours:</h3>
				<p>Mon-Fri: 09:00-17:30</p>
				<p>Sat: 09:00-17:00</p>
				<p>Sun: Closed</p>
			</aside>
			<img src="/images/logo.png"/>

		</section>
	</header>
	<nav>
		<ul>
		<li><a href="/">Home</a></li>
			<li><a href="/?page=cars">Showroom</a></li>
			<li><a href="/about.html">About Us</a></li>
			<li><a href="/?page=contact">Contact us</a></li>
			<li><a href="/?page=careers">Careers</a></li>
		</ul>
	</nav>
		<img src="/images/randombanner.php"/>
	<main class="admin">

	<section class="left">
		<ul>
			<li><a href="/?page=admin/cars">Cars</a></li>
			<li><a href="manufacturers.php">Manufacturers</a></li>
				<?php
				if(isset($_SESSION['userRole']) && $_SESSION['userRole'] == "admin"){
					echo'<li><a href="/?page=admin/archiveCars">Archived Cars</a></li>
						<li><a href="/?page=showAdmin"> Admins</a></li>
						';
					}?>
                
			<li><a href="/?page=enquiries"> Enquiries</a></li>
            <li><a href="/?page=admin/articles">Articles</a></li>
            <li><a href="/?page=logout"> Log Out</a></li>

		</ul>
	</section>

	<section class="right">

		
		
	<?php

		if (isset($_SESSION['loggedin']) && $_SESSION['loggedin'] == true) {
		?>


			<h2>Manufacturers</h2>

			<a class="new" href="addmanufacturer.php">Add new manufacturer</a>

			<?php
			echo '<table>';
			echo '<thead>';
			echo '<tr>';
			echo '<th>Name</th>';
			echo '<th style="width: 5%">&nbsp;</th>';
			echo '<th style="width: 5%">&nbsp;</th>';
			echo '</tr>';

			$categories = $pdo->query('SELECT * FROM manufacturers');

			foreach ($categories as $category) {
				echo '<tr>';
				echo '<td>' . $category['name'] . '</td>';
				echo '<td><a style="float: right" href="editmanufacturer.php?id=' . $category['id'] . '">Edit</a></td>';
				echo '<td><form method="post" action="deletemanufacturer.php">
				<input type="hidden" name="id" value="' . $category['id'] . '" />
				<input type="submit" name="submit" value="Delete" />
				</form></td>';
				echo '</tr>';
			}

			echo '</thead>';
			echo '</table>';

		}

		else {
			?>
			<h2>Log in</h2>

			<form action="index.php" method="post">
				<label>Username</label>
				<input type="text" name="username" />

				<label>Password</label>
				<input type="password" name="password" />

				<input type="submit" name="submit" value="Log In" />
			</form>
		<?php
		}
	?>

</section>
	</main>

	<footer>
		&copy; Claire's Cars 2018
	</footer>
</body>
</html>
