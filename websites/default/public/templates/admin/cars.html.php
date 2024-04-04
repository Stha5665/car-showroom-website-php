
	<section class="right">
		
	<?php
// This layout is reusable or used for archive page
// as well as car page
		if (isset($_SESSION['loggedin']) && $_SESSION['loggedin'] == true) {
// if user logged in
			if($tableLayoutFor == 'car-page'){
		?>
			<h2>Cars</h2>
			<a class="new" href="?page=addcar">Add new car</a>
	<?php
			} else{
				echo '<h2> Archived cars </h2>';
			}
	?>
			<?php
			echo '<table>';
			echo '<thead>';
			echo '<tr>';
			echo '<th>Model</th>';
			echo '<th>Description</th>';
			echo '<th style="width: 10%">Price</th>';
			echo '<th style="width: 10%">Added By</th>';
			echo '<th style="width: 5%">&nbsp;</th>';
			echo '<th style="width: 5%">&nbsp;</th>';
			echo '</tr>';

// display the details of the car in tabular form
			foreach ($cars as $car) {
				echo '<tr>';
				echo '<td>' . $car['name'] . '</td>';
				echo '<td>' . $car['description'] . '</td>';
				echo '<td>£' . $car['price'] . '</td>';
				echo '<td>' . $car['added_by'] . '</td>';

				if(isset($_SESSION['userRole']) && $_SESSION['userRole'] == "admin"){
					// admin can only edit and archive cars
					// so the link and archive button are placed with if condition
					if($tableLayoutFor == 'car-page'){
					echo '<td><a style="float: right" href="?page=editcar&carId=' . $car['id'] . '">Edit</a></td>';
					echo '<td><form method="post">
					<input type="hidden" name="archiveId" value="' . $car['id'] . '" />
					<input type="submit" name="submit" value="Archive" />
					</form></td>';
				}else if($tableLayoutFor == 'archive-page'){
					// for archive-page
					// there is restore and delete option
					echo '<td><form method="post">
					<input type="hidden" name="restoreId" value="' . $car['id'] . '" />
					<input type="submit" name="submit" value="Restore" />
					</form></td>';
					echo '<td><form method="post">
					<input type="hidden" name="deleteCarId" value="' . $car['id'] . '" />
					<input type="submit" name="submit" value="Delete" />
					</form></td>';
				}
				}

			
				echo '</tr>';
			}

			echo '</thead>';
			echo '</table>';

		}

		else {
			// if not logged in redirect user
			header("Location:/?page=admin");
		}
	?>

		</section>
