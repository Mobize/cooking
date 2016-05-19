<?php
require_once 'partials/header.php';

$recipe = Recipe::get('SELECT * FROM recipe ORDER BY RAND() LIMIT 1');
//Utils::debug($recipe);

include_once 'partials/recipe-common.php';

require_once 'partials/footer.php' ?>