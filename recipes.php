<?php
require_once 'partials/header.php';

$type = !empty($_GET['type']) ? intval($_GET['type']) : 0;

if (empty($type)) {
	$recipes = Recipe::getList('SELECT * FROM recipe');
} else {
	$recipes = Recipe::getList('SELECT * FROM recipe WHERE type = :type', array(':type' => $type));
}
//Utils::debug($recipes);
?>

		<h1>Les recettes de <?= Recipe::getTypeLabel($type) ?></h1>

		<hr>

		<?php foreach($recipes as $recipe) { ?>
		<div class="media">
			<div class="media-left">
				<a href="#">
					<img class="media-object" src="<?= $recipe->getPicture() ?>" width="100" height="100" alt="...">
				</a>
			</div>
			<div class="media-body">
				<h4 class="media-heading"><?= $recipe->getTitle() ?></h4>
				<blockquote>
					<?= $recipe->getContent(50, ' [...]') ?> <a href="recipe.php?id=<?= $recipe->id ?>">Voir la recette</a>
				</blockquote>
			</div>
		</div>

		<hr>
		<?php } ?>


<?php require_once 'partials/footer.php' ?>