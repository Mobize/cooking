<?php require_once 'config/config.conf.php' ?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<meta name="description" content="">
	<meta name="author" content="">
	<link rel="icon" href="img/favicon.ico">

	<title>Quick Cooking</title>

	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.2/css/bootstrap.min.css">
	<link href="css/styles.css" rel="stylesheet">

</head>
<body>
	<div class="navbar-wrapper">
		<div class="container">

			<?php include 'partials/navbar.php' ?>

		</div>
	</div>

	<?php
	if ($current_page == 'index.php') {
		include 'partials/slider.php';
	}
	?>

	<div class="container marketing">