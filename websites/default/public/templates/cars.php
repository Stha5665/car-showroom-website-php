
<main class="admin">

	<section class="left">
		<ul>	
		<?php
		// displaying all manufacturers in sidebar
		foreach($manu as $manufacturer){
			echo '<li><a href="/?page=manufacturer&manufacturerId='.$manufacturer['id'].'&manuName='.$manufacturer['name'].'">'.$manufacturer['name'].'</li>';
		}
		?>
		</ul>


	</section>

	<section class="right">

		<h1><?= $heading ?></h1>

	<ul class="cars">


	<?php
// showing all cars details in showroom page
	foreach ($cars as $car) {
		echo '<li>';
		$i = 1;
		// printing multiple image via while loop
		while (file_exists('images/cars/' . $car['id'] .'-'.$i. '.jpg')) {
			echo '<a href="images/cars/' . $car['id'] .'-'.$i. '.jpg"><img src="images/cars/' . $car['id'] . '-' .$i.'.jpg" /></a>';
			$i++;
		}
		echo '</li>';
		echo '<div class="details">';
		foreach($manu as $manufacturer){
			if($manufacturer['id'] == $car['manufacturerId']){
				echo '<h2>' . $manufacturer['name'] . ' ' . $car['name'] . '</h2>';
			}
		}
		// if old price is not available this Was price will not be shown
		if(isset($car['old_price']) && $car['old_price'] != ''){
			echo '<h3>Was £' . $car['old_price'] . '</h3>';
		}
		echo '<h3>Now £' . $car['price'] . '</h3>';
		echo '<h3>Engine Type: ' . $car['engine_type'] . '
				  ||	Mileage: ' . $car['mileage'] . '</h3>';

		echo '<p>' . $car['description'] . '</p>';

		echo '</div>';
		
	}

	?>



		</ul>
	</section>
</main>

