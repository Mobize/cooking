<?php
include_once 'partials/header.php';

$search = Recipe::search($_GET);

?>

		<h1>Recherche</h1>

		<hr>

		<form class="form-inline" method="GET">

			<input type="hidden" name="advanced_search" value="1">

			<div class="form-group">
				<label for="title">Nom de recette</label>
				<input type="text" id="title" name="title" class="form-control" placeholder="Tarte à la framboise" value="<?= !empty($search->input['title']) ? $search->input['title'] : '' ?>">
			</div>

			<div class="form-group">
				<label for="type">Type de recette</label>
				<select id="type" name="type" class="form-control">
					<option value="">...</option>
					<?php
					foreach(Recipe::$type_labels as $type => $type_label) {
						$selected = !empty($search->input['type']) && $search->input['type'] == $type ? ' selected' : '';
					?>
					<option value="<?= $type ?>"<?= $selected ?>><?= ucfirst($type_label) ?></option>
					<?php } ?>
				</select>
			</div>

			<div class="form-group">
				<label for="ingredients">Ingredient</label>
				<input type="text" id="ingredients" name="ingredients" class="form-control" value="<?= !empty($search->input['ingredients']) ? $search->input['ingredients'] : '' ?>">
			</div>

			<div class="form-group">
				<button type="submit" class="btn btn-default">
					<span class="glyphicon glyphicon-search" aria-hidden="true"></span> Rechercher
				</button>
			</div>
		</form>

		<?php
		if ($search->count > 0) {

			echo '<h2>'.$search->count.' résultat(s) de recherche</h2>';
			echo '<div class="search-results list-group">';

			foreach($search->results as $result) {

				$recipe = new Recipe($result);
			?>
			<a href="recipe.php?id=<?= $recipe->id ?>" class="list-group-item">
				<div class="picture pull-left">
					<img width="60" src="<?= $recipe->getPicture() ?>">
				</div>
				<div class="title pull-left">
					<h4 class="list-group-item-heading"><?= $recipe->getTitle() ?> (<?= Recipe::getTypeLabel($recipe->getType()) ?>)</h4>
					<p class="list-group-item-text">
						<?= $recipe->getContent(100) ?>
					</p>
				</div>
				<div class="clearfix"></div>
			</a>
			<?php
			}
			echo '</div>';
		}
		?>

<?php include_once 'partials/footer.php' ?>