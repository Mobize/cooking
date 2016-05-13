Cooking
=============

#### *** DESCRIPTION *** ####

Site de recettes de cuisine, POO, recherche, contact

----------
#### *** CONSEILS *** ####

- ``Tous les templates html sont fournis``
- ``Penser à la balise container lors de la découpe``
- ``Penser à réduire les balises dans l'éditeur de texte pour visualiser rapidement les blocs (flèches dans la colonne de gauche sur chaque parent)``
- ``Au besoin commenter les fermetures de balise sur les gros blocs``

<hr>
#### *** CONSIGNES *** ####

1. Faire la découpe des templates HTML
> **CONSEIL** : Pour chaque page, commencer par renommer le .html en .php et déplacer le .html dans un dossier html

2. Créer un fichier de config et l'inclure à un seul endroit central

3. Gérer la navigation en affichant la page active et afficher l'année courante dans le footer :gift:

4. Créer une base de données ``cooking``
> **CONSEIL** : Penser à l'encodage utf8_general_ci

5. Créer une table ``recipe`` avec les colonnes :
	- id
	- type INT(3) NULL DEFAULT 0
	- title
	- ingredients
	- content
	- picture
	- date

6. Insérer du contenu dans la table ``recipe``
> **CONSEILS** :
> Pour les images, dans le champ picture, insérer le nom de l'image avec son extension (ex: product.png)
> Le champ type peut être rempli aléatoirement
>
> **BONUS** : Adapter un script *_generator.php pour automatiser l'insertion du contenu

7.  Dans le répertoire config, créer un fichier autoload.conf.php, y placer la fonction d'auto_load et l'inclure dans config.conf.php
> c.f. https://github.com/Webforce3/POO/blob/master/config/config.conf.php

8. Créer un répertoire class et y placer la class Db et la class Model
> c.f. https://github.com/Webforce3/POO/blob/master/class/Db.class.php
> c.f. https://github.com/Webforce3/POO/blob/master/class/Model.class.php

9. Créer une class Recipe, qui hérite de la class Model, avec des attributs correspondants aux colonnes de la table cooking.recipe

10. Créer les getters/setters avec les contrôles sur les setters et les formats sur les getters

11. Pour chaque erreur rencontrée sur un setter, lever une Exception avec un message personnalisé

12. Sur la page d'accueil, utiliser la classe Db pour faire une requête qui va chercher 3 recettes au hasard
> https://github.com/Webforce3/POO/blob/master/post.php

13. Faire une boucle sur le résultat de la requête, et à chaque passage dans la boucle :
	- Instancier un objet Recipe
	- Hydratater l'objet
	- Afficher les différentes informations en utilisant les getters

	> https://github.com/Webforce3/POO/blob/master/post.php

14. Sur la page recipe.php :
	- Récupérer et contrôler un identifiant de recette passé en paramètre d'url
	- Faire une requête qui récupère la recette correspondant à l'identifiant
	- Instancier et hidrater un objet Recipe
	- Afficher les différentes informations en utilisant les getters

15. Sur la page recipes.php :
	- Récupérer et contrôler un type passé en paramètre d'url
	- Faire une requête qui récupère les recettes correspondants au type
	- Répéter l'étape 13

16. Sur la page random.php :
	- Faire une requête qui récupère une recette au hasard
	- Instancier et hidrater un objet Recipe
	- Afficher les différentes informations en utilisant les getters

	> **CONSEIL** :
	> Identifier et rassembler les parties communes entre recipe.php et random.php dans une partial recipe-common.php

17. Sur la page search.php, gérer la recherche rapide (formulair de recherche rapide dans partials/navbar.php)
> **BONUS** : Gérer la recherche avancée

18. Gérer la page de contact :
	- Créer une table contact
	- Créer une class contact qui hérite de la class Model
	- Réceptionner et contrôler les champs du formulaire
	- Gestion des erreurs
	- Requête d'insertion
	- Confirmation