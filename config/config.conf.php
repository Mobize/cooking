<?php
require_once 'config/autoload.conf.php';

$current_page = basename($_SERVER['PHP_SELF']); // Ex: index.php

$pages = array(
	'Accueil' => 'index.php',
	'Recette aléatoire' => 'random.php',
	'Recherche' => 'search.php',
	'Contact' => 'contact.php',
	'Les recettes' => array(
		'Les gateaux' => 'recipes.php?type=1',
		'La fast-food' => 'recipes.php?type=2',
		'Les soupes' => 'recipes.php?type=3',
	)
);