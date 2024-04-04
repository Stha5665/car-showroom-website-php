	<section class="right">
	<?php
	// show list of the admins
		if (isset($_SESSION['loggedin']) && $_SESSION['loggedin'] == true) {
			?>
				<h2>Admins: </h2>

				<a class="new" href="?page=addAdmin">Add new admin</a>

				<?php
				echo '<table>';
				echo '<thead>';
				echo '<tr>';
				echo '<th>Username</th>';
				echo '<th>Password</th>';
				echo '<th style="width: 10%">Role</th>';
				echo '<th style="width: 5%">&nbsp;</th>';
				echo '<th style="width: 5%">&nbsp;</th>';
				echo '</tr>';
				// all admin users are displayed using loop
				foreach ($admins as $adminUser) {
					echo '<tr>';
					echo '<td>' . $adminUser['username'] . '</td>';
					echo '<td>' . $adminUser['password'] . '</td>';
					echo '<td>' . $adminUser['role'] . '</td>';
					echo '<td><a style="float: right">Edit</a></td>';
					echo '<td><form method="post">
					<input type="hidden" name="id" value="' . $adminUser['id'] . '" />
					<input type="submit" name="submit" value="Delete" />
					</form></td>';
					echo '</tr>';
				}

				echo '</thead>';
				echo '</table>';

			}
			else {
				// if not logged in
				header("Location:/?page=admin");
			}
	?>
	</section>
