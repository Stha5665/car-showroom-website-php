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
		</ul>

	</nav>
	<img src="images/randombanner.php"/>
    <main class="admin">

	    <section class="left">
            <ul>
                <li><a href="?page=admin/cars">Cars</a></li>
                <li><a href="admin/manufacturers.php">Manufacturers</a></li>
				<?php
				if(isset($_SESSION['userRole']) && $_SESSION['userRole'] == "admin"){
					// If user is admin then make this link visible in sidebar
					echo'<li><a href="?page=admin/archiveCars">Archived Cars</a></li>
						<li><a href="?page=showAdmin"> Admins</a></li>
						<li><a href="?page=addJob">Add Job </a></li>
						';
					}?>
                
				<li><a href="?page=enquiries"> Enquiries</a></li>
                <li><a href="?page=admin/articles">Articles</a></li>
                <li><a href="?page=logout"> Log Out</a></li>
            </ul>
	    </section>
	    <?= $outputView ?> 
	</main>					
	<footer>
		&copy; Claire's Cars 2018
	</footer>
</body>
</html>
