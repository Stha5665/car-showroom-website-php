<section class="right">
        <?php
        if(isset($_SESSION['loggedin']) && $_SESSION['loggedin'] == true) {
            // if user is logged in then display this form
        ?>
        <h2> Add Article: </h2>
        <form method="POST" enctype="multipart/form-data">
            <label>Title: </label>
            <input type="text" name="title" />
            <label>Description:</label>
            <textarea name="description"></textarea>
            <label>Images: </label>
            <input type="file" name="image[]" multiple/>
			<input type="hidden" name="date_posted" value="<?=date("Y-m-d")?>" />
			<input type="hidden" name="added_by" value="<?=$_SESSION['loggedUsername']?>" />
            <input type="submit" name="submit" value="Add Article" />
        </form>
        <?php
        }
        else {
            // if not then redirect to homepage or ask to login
            header("Location:/?page=admin");
        }
        ?>
    </section>
