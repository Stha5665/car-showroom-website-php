<main class="home">
	<p>Welcome to Claire's Cars, Northampton's specialist in classic and import cars.</p>
	<section class="right">

	<h1>Stories</h1>

	<ul class="cars">
	<?php
// This loop for printing
// all articles in the homepage
	foreach ($articles as $article) {
		echo '<li>';
		$i = 1;
		// This loop displayes multiple images of the article
		while (file_exists('images/articlesImg/' . $article['id'] .'-'.$i. '.jpg')) {
			echo '<a href="images/articlesImg/' . $article['id'] .'-'.$i. '.jpg"><img src="images/articlesImg/' . $article['id'] . '-' .$i.'.jpg" /></a>';
			$i++;
		}

		?>
		</li>
		<div class="details">
			<h2><?=$article['title']?></h2>
			<h3>Posted by: <?=$article['added_by']?></h3>
			<h3><?=$article['date_posted']?></h3>
			<p><?=$article['description']?></p>
		</div>

	<?php
	}
	?>
	</ul>
</section>
</main>
