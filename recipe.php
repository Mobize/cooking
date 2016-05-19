<?php
require_once 'partials/header.php';

$id = 0;
if (!empty($_GET['id'])) {
	$id = intval($_GET['id']);
}

//Equivalent des lignes 4 à 7
//$id = !empty($_GET['id']) ? intval($_GET['id']) : 0;

if (empty($id)) {
	exit('Undefined recipe id');
}

$recipe = Recipe::get('SELECT * FROM recipe WHERE id = :id', array(':id' => $id));

//Utils::debug($recipe);

include_once 'partials/recipe-common.php';

require_once 'partials/footer.php' ?>