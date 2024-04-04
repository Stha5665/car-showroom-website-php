    <section class="right">
        <?php
        // Admin can add other users/admin
        if(isset($_SESSION['loggedin']) && $_SESSION['loggedin'] == true) {
        ?>
        <!-- form for add admin -->
        <h2> Add admin: </h2>
        <form method="POST" enctype="multipart/form-data">
        <!-- For username -->
            <label>Username: </label>
            <input type="text" name="username" />
            <!-- password -->
            <label>Password:</label>
            <input type="password" name="password" />
            <input type="hidden" name="role" value="user">
            <input type="submit" name="submit" value="Add admin" />
        </form>
        <?php
        }
        else {
            header("Location:/?page=admin");
        }
        ?>
    </section>
