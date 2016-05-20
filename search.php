<?php
require_once 'partials/header.php';

Utils::debug($_GET);

$search = !empty($_GET['search']) ? strip_tags($_GET['search']) : '';
$advanced_search = !empty($_GET['advanced_search']) ? intval($_GET['advanced_search']) : 0;
$recipe = !empty($_GET['recipe']) ? strip_tags($_GET['recipe']) : '';
$type = isset($_GET['type']) && $_GET['type'] != -1 ? intval($_GET['type']) : -1;
$ingredients = !empty($_GET['ingredients']) ? strip_tags($_GET['ingredients']) : '';

$search_results = array();
$count_search_results = 0;

if (!empty($search)) {

	$search_results = Recipe::getList('SELECT * FROM recipe WHERE title LIKE :search OR content LIKE :search OR ingredients LIKE :search', array(':search' => '%'.$search.'%'));

	$count_search_results = count($search_results);

} else if (!empty($advanced_search)) {

	$sql = 'SELECT * FROM recipe WHERE 1 ';

	$bindings = array();
	if (!empty($recipe)) {
		$sql .= 'AND (title LIKE :recipe OR content LIKE :recipe) ';
		$bindings[':recipe'] = '%'.$recipe.'%';
	}
	if ($type != -1) {
		$sql .= 'AND type = :type ';
		$bindings[':type'] = $type;
	}
	if (!empty($ingredients)) {
		$sql .= 'AND ingredients LIKE :ingredients ';
		$bindings[':ingredients'] = '%'.$ingredients.'%';
	}

	//Utils::debug($sql);
	//Utils::debug($bindings);

	$search_results = Recipe::getList($sql, $bindings);
	$count_search_results = count($search_results);
}
?>

		<h1>Recherche</h1>

		<hr>

		<form class="form-inline" action="search.php" method="GET">

			<input type="hidden" name="advanced_search" value="1">

			<div class="form-group">
				<label for="recipe">Nom de recette</label>
				<input type="text" id="recipe" name="recipe" class="form-control" placeholder="Tarte à la framboise" value="<?= $recipe ?>">
			</div>

			<div class="form-group">
				<label for="type">Type de recette</label>
				<select id="type" name="type" class="form-control">
					<option value="-1">...</option>
					<?php
					$type_labels = Recipe::$type_labels;

					foreach($type_labels as $type_id => $type_label) {
						$selected = '';
						if ($type === $type_id) {
							$selected = 'selected';
						}
						//$selected = $type === $type_id ? 'selected' : '';
					?>
					<option <?= $selected ?> value="<?= $type_id ?>"><?= ucfirst($type_label) ?></option>
					<?php } ?>
				</select>
			</div>

			<div class="form-group">
				<label for="ingredients">Ingredient(s)</label>
				<input type="text" id="ingredients" name="ingredients" class="form-control" placeholder="farine, sucre, poulet..." value="<?= $ingredients ?>">
			</div>

			<div class="form-group">
				<button type="submit" class="btn btn-default">
					<span class="glyphicon glyphicon-search" aria-hidden="true"></span> Rechercher
				</button>
			</div>
		</form>

		<?php if (!empty($search) || !empty($advanced_search)) { ?>

			<hr>

			<h2>
				<?= $count_search_results ?> résultat(s) pour la recherche
				<?php if (!empty($search)) { ?>
				&laquo;<?= $search ?>&raquo;
				<?php } ?>
			</h2>

			<div class="search-results list-group">
				<?php
				foreach($search_results as $key => $recipe) {
				?>
				<a href="recipe.php?id=<?= $recipe->id ?>" class="list-group-item clearfix">
					<img width="50" height="65" src="<?= $recipe->picture ?>" class="pull-left" style="margin-right: 20px">
					<div class="content pull-left">
						<h4 class="list-group-item-heading"><?= $recipe->title ?></h4>
    					<p class="list-group-item-text"><?= $recipe->getContent(50) ?></p>
					</div>
				</a>
				<?php } ?>
			</div>

		<?php } ?>

<?php require_once 'partials/footer.php' ?>