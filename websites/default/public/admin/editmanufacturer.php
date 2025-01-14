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
				<p>Sun: 10:00-16:00</p>
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
				// The reason is to display additional link in admin view
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


	if (isset($_POST['submit'])) {

		$stmt = $pdo->prepare('UPDATE manufacturers SET name = :name WHERE id = :id ');

		$criteria = [
			'name' => $_POST['name'],
			'id' => $_POST['id']
		];

		$stmt->execute($criteria);
		echo 'Manufacturer Saved';
	}
	else {
		if (isset($_SESSION['loggedin']) && $_SESSION['loggedin'] == true) {

			$currentMan = $pdo->query('SELECT * FROM manufacturers WHERE id = ' . $_GET['id'])->fetch();
		?>


			<h2>Edit Manufacturer</h2>

			<form action="" method="POST">

				<input type="hidden" name="id" value="<?php echo $currentMan['id']; ?>" />
				<label>Name</label>
				<input type="text" name="name" value="<?php echo $currentMan['name']; ?>" />


				<input type="submit" name="submit" value="Save Manufacturer" />

			</form>
			

		<?php
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

	}
	?>


</section>
	</main>
	<footer>
		&copy; Claire's Cars 2018
	</footer>
</body>
</html>
