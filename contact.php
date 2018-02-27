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

            <nav class="navbar navbar-inverse navbar-static-top">
                <div class="container">
                    <div class="navbar-header">
                        <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
                            <span class="sr-only">Navigation</span>
                            <span class="icon-bar"></span>
                            <span class="icon-bar"></span>
                            <span class="icon-bar"></span>
                        </button>
                        <a class="navbar-brand" href="index.php">Quick Cooking</a>
                    </div>
                    <div id="navbar" class="navbar-collapse collapse">
                        <ul class="nav navbar-nav">
                            <li class="active"><a href="index.php">Accueil</a></li>
                            <li><a href="random.php">Recette aléatoire</a></li>
                            <li><a href="search.php">Recherche</a></li>
                            <li><a href="contact.php">Contact</a></li>
                            <li class="dropdown">
                                <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">Les recettes <span class="caret"></span></a>
                                <ul class="dropdown-menu" role="menu">
                                    <li><a href="recipes.php?type=1">Les gateaux</a></li>
                                    <li><a href="recipes.php?type=2">La fast-food</a></li>
                                    <li><a href="recipes.php?type=3">Les soupes</a></li>
                                </ul>
                            </li>
                        </ul>
                        <form class="navbar-form navbar-right" action="search.php" method="GET">
                            <div class="input-group">
                                <input name="search" type="text" class="form-control" placeholder="Recherche rapide...">
                                <span class="input-group-btn">
                                    <button class="btn btn-default" type="submit">
                                        <span class="glyphicon glyphicon-search" aria-hidden="true"></span>
                                    </button>
                                </span>
                            </div>
                        </form>
                    </div>
                </div>
            </nav>

        </div>
    </div>

    <div class="container marketing">

        <h1>Contact</h1>

        <div class="alert alert-danger" role="alert">
            <ul>
                <li>Error label</li>
            </ul>
        </div>

        <form class="form-horizontal" action="" method="POST" novalidate>
            <div class="form-group">
                <label for="name" class="col-sm-2 control-label">Prénom</label>
                <div class="col-sm-3">
                    <input type="text" id="name" name="name" class="form-control" placeholder="Votre prénom" value="">
                </div>
            </div>
            <div class="form-group">
                <label for="email" class="col-sm-2 control-label">Email</label>
                <div class="col-sm-5">
                    <input type="email" id="email" name="email" class="form-control" placeholder="Votre adresse email" value="">
                </div>
            </div>
            <div class="form-group">
                <label for="message" class="col-sm-2 control-label">Message</label>
                <div class="col-sm-5">
                    <textarea id="message" name="message" class="form-control" placeholder="Votre message"></textarea>
                </div>
            </div>
            <div class="form-group">
                <div class="col-sm-offset-2 col-sm-10">
                    <button type="submit" class="btn btn-default">Envoyer</button>
                </div>
            </div>
        </form>

        <footer>
            <p class="pull-right"><a href="#">Haut de page</a></p>
            <p>&copy; 2014 Quick Cooking</p>
        </footer>

    </div><!-- /.container -->

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.2/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.2/js/bootstrap.min.js"></script>

</body>
</html>