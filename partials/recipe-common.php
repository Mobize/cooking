		<?php
		if (empty($recipe)) {
			return;
		}
		?>

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