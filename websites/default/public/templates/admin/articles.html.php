    <section class="right">
    <?php
    if (isset($_SESSION['loggedin']) && $_SESSION['loggedin'] == true) {
        ?>
        <h2>Articles</h2>
        <a class="new" href="?page=addArticle">Add Article</a>
        <table>
            <thead>
                <tr>
                    <th>Title</th>
                    <th>Description</th>
                    <th>Date Posted</th>
                    <th>Added By</th>
                </tr>
                <?php
                // displaying all data of article
                // using foreach loop
                foreach ($articles as $article) {
                ?>
                <tr>
                    <td><?= $article['title'] ?> </td>
                    <td><?= $article['description'] ?> </td>
                    <td><?= $article['date_posted'] ?> </td>
                    <td><?= $article['added_by'] ?> </td>
                </tr>
                <?php
                }
                ?>
            </thead>
        </table>
    <?php
    }else {
        header("Location:/?page=admin");
    }
    ?>
    </section>

