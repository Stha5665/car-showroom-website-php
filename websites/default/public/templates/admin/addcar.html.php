	<section class="right">
	<?php
		//echo 'Car added';
		//This add cars template is 
		// reused with editcar.php
		//This is common layout with editcar 
		if (isset($_SESSION['loggedin']) && $_SESSION['loggedin'] == true) {
		?>

			<h2><?= $heading ?></h2>
			<form method="POST" enctype="multipart/form-data">
				<?php
				// for checking carData send by controller
				if(isset($carData)){
					echo '<input type="hidden" name="id"  value="'.$carData['id'].'" />';
				}
				?>
				<label>Car Model</label>
				<input type="text" name="name" value="<?=$carData['name'] ??''?>" />
				<label>Mileage</label>
				<input type="text" name="mileage" value="<?=$carData['mileage'] ??''?>" />
				<label>Engine type</label>
				<select name="engine_type">
					<?php
					// if engine_type is set
					// the petrol is set for default
					if(isset($carData['engine_type']) && $carData['engine_type'] == "petrol"){
						echo'
						<option value="diesel">diesel </option>
						<option selected="selected" value="petrol">petrol </option>';
					}else{
						// if diesel than set this value
						echo '
						<option value="diesel">diesel </option>
						<option value="petrol">petrol </option>';
					}
					?>
				</select>
				<label>Description</label>
				<textarea name="description"><?=$carData['description'] ??''?></textarea>
				<label>Old Price</label>
				<input type="text" name="old_price" value="<?=$carData['old_price'] ??''?>"/>
				<label>Price</label>
				<input type="text" name="price" value="<?=$carData['price'] ??''?>"/>
                <input type="hidden" name="archive" value="N" />
				<label>Category</label>
                
				<select name="manufacturerId">
                    <?php
					// printing all details in sidebar in dropdown
					foreach ($stmt as $row) {
						if(isset($carData['manufacturerId']) && $carData['manufacturerId'] == $row['id']){
                        	echo '<option selected="selected" value="' . $row['id'] . '">' . $row['name'] . '</option>';
						}else{
                        	echo '<option value="' . $row['id'] . '">' . $row['name'] . '</option>';

						}
					}
                    
                    ?>

	</select>
	<?php
		if(isset($carData['id'])){
// If id of car is present
// displays all cars in the website
			$i = 1;
			while (file_exists('images/cars/' . $carData['id'] .'-'.$i. '.jpg')) {
				echo '<a href="images/cars/' . $carData['id'] .'-'.$i. '.jpg"><img src="images/cars/' . $carData['id'] . '-' .$i.'.jpg" style="width:180px;"/></a>';
				$i++;
			}
		}
		
	?>
				<label>Image</label>

				<input type="file" name="image[]" multiple/>
				<input type="hidden" name="added_by" value="<?=$carData['added_by'] ?? $_SESSION['loggedUsername'] ?>" />

				<input type="submit" name="submit" value="Add Car" />

			</form>
			
		<?php
		}

		else {

			// If user is not login move to homepage
			header("Location:/?page=admin");
		}
	?>
</section>
