<!DOCTYPE html>
<html>
	<head>
		<link rel="stylesheet" href="/styles.css"/>
		<title> <?= $title ?> </title>
	</head>
	<body>
	<header>
		<section>
			<aside>
				<!-- for opening time in winter -->
				<?= winterOpentime() ?>
				<!-- for summer -->
				<!-- call summerOpentime() -->

			</aside>
			<img src="/images/logo.png"/>

		</section>
	</header>
	<nav>
		<ul>
			<li><a href="/">Home</a></li>
			<li><a href="?page=cars">Showroom</a></li>
			<li><a href="?page=about">About Us</a></li>
			<li><a href="?page=contact">Contact us</a></li>
			<li><a href="?page=careers">Careers</a></li>
			<li><a href="?page=admin"> Login </a></li>
		</ul>

	</nav>
	<img src="images/randombanner.php"/>
	<?= $outputView ?> 

	<footer>
		&copy; Claire's Cars 2018
	</footer>
</body>
</html>
