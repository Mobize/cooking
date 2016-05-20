		<?php
		if (empty($recipe)) {
			return;
		}

		// On définit un lien retour par defaut sur index.php
		$back_link = 'index.php';
		// Si la page de provenance est définie
		if (!empty($_SERVER['HTTP_REFERER'])) {
			// On écrase la variable $back_link avec la page de provenance définie dans $_SERVER['HTTP_REFERER']
			$back_link = $_SERVER['HTTP_REFERER'];
		}
		?>

		<a href="<?= $back_link ?>" class="btn btn-default">Retour</a>
		<hr>

		<div class="media">
			<div class="media-left">
				<img src="<?= $recipe->getPicture() ?>" width="300">
			</div>
			<div class="media-body">
				<h1><?= $recipe->getTitle() ?></h1>
				<em><?= $recipe->getDate() ?></em>

				<hr>

				<h2>Ingrédients</h2>
				<p>
					<?= $recipe->getIngredients() ?>
				</p>

				<hr>
				<blockquote>
					<?= $recipe->getContent() ?>
				</blockquote>
			</div>
		</div>