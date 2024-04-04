<section class="right">
        <?php
        if(isset($_SESSION['loggedin']) && $_SESSION['loggedin'] == true) {
            // Form for adding job title and description
        ?>
        <h2> Add Job: </h2>
        <form method="POST" enctype="multipart/form-data">
            <label>Job Name: </label>
            <input type="text" name="name" />
            <label>Description:</label>
            <textarea name="description"></textarea>
            <input type="submit" name="submit" value="Add Job" />
        </form>
        <?php
        }
        else {
            header("Location:/?page=admin");
        }
        ?>
</section>
