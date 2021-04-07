# Un blog fake rapide avec Faker et Twig

Nous allons créer une page d'accueil d'un blog avec des données Fake générées automatiquement.

Nous utiliserons le thèmes boostrap utilisé précédemment pour la mise en forme :

ttps://github.com/startbootstrap/startbootstrap-clean-blog/archive/gh-pages.zip

## Installation des composants

- Créer un nouveau dossier de travail dans votre répertoire web (`www` ou `htdocs`)
- Installez les composants `fakerphp/faker` et ` twig/twig`

## Création de notre arborescence

Principe :

> Créer un dossier `public`, avec une page PHP `index.php` vide pour le moment.
> Créer un dossier `cache`qui servira de système de sauvegarde du moteur de templates twig
> Créer un dossier `views`qui contiendra nos vues.

Dans le dossier **views** nous allons créer un `layout` twig : `base.html.twig`
Dans ce fichier nous allons y mettre le contenu du fichier `index.html` de notre thème récupéré tout à l'heure.

Copier les dossiers des assets du thème téléchargé tout à l'heure dans votre dossier `public` (css, js , img et vendor). 

Le dossier `vendor` du thème contient les librairies externes pour le Front chargés avec **npm**. Pour en savoir plus reportez vous à la documentation du thème qui utilise **npm** et **gulp** pour générer les fichiers du thème et leur emplacement (SASS vers CSS, minification CSS et JS, déplacement des modules chargés avec **npm** de `node_modules` vers le dossier `vendor`).

> Attention de ne pas mélanger le dossier `vendor` de **composer** avec celui du thèmes. Placez bien ce dossier `vendor` du thème dans votre sous dossier `public`.

Dans le fichier `base.html.twig` remplacer tous les articles par un balise **block** de **twig**. Nous lui donnons le nom `body`

> https://twig.symfony.com/doc/2.x/
> https://twig.symfony.com/doc/2.x/functions/block.html

C'est dans ce **block** que viendront s'écrire les données de notre page (nos articles générés).

## Premier travail dans notre **programme** avec Faker

**Dans le fichier `index.php`**

Nous allons dans un premier temps générer des données Fake dans un tableau PHP. 
Ces données vont représenter des articles de notre blog (comme un jeu d'enregistrement d'une requête SQL).
Chaque article sera stocké dans un tableau associatif. 
Nous allons générer 10 articles. Donc utiliser une boucle `for`

Les données à générer pour chaque article sont les suivantes : 

- titre
- contenu 
- date de création
- nom et prénom de l'auteur
- image de l'article

> https://fakerphp.github.io/

affichez ces données avec un `var_dump` et assurez vous d'avoir quelques choses comme ça :
```
[
0=> ['title'=>'Titre','content'=>'le contenu de...','createdAt'=> '2020-04-06 15:00:00', 'Fabien Sellès', 'http://img.jpg'],
1=> ['title'=>'Titre2','content'=>'le contenu de notre article 2...','createdAt'=> '2020-04-06 15:30:00', 'Fabien Sellès', 'http://img2.jpg'],
...
]
```

## Premier travail de rendu avec Twig

Dans le dossier **views** créer un dossier `blog` et dedans un fichier **home.html.twig**

Dans ce fichier il lui faut préciser que cette vue hérite de notre layout **bas.html.twig**. C'est comme de l'héritage en POO. Notre vue **home** pourra maintenant surcharger les blocks de notre vue parent (ou layout).

> https://twig.symfony.com/doc/2.x/tags/extends.html

Dans le fichiers `home.html.twig` nous allons donc mettre la ligne pour `extends` le layout puis les ligne pour surcharger le block body.
Pour le moment dans ce block nous allons y mettre le texte **Hello World**

**Affichage de cette vue à partir de notre fichier index.php**

Dans notre fichier index.php nous allons maintenant charger le moteur de template Twig puis lui dire de rendre la vue `blog/home.html.twig`
Voir la fin de la doc : https://twig.symfony.com/doc/2.x/intro.html#basic-api-usage

## Rendu final de notre page avec Twig

Dans notre vue nous avons surchargé le block body en y affichant **Hello World**.
Nous allons maintenant dans ce block parcourir notre tableau pour afficher nos articles générés avec Faker.

Première étape : passer notre variable à notre vue Twig. 

Lors de l'appel du **render** de twig, le deuxième paramètre est un tableau associatif des données passées à la vue. 

Si nous avons appelé notre tableau d'articles `$articles` nous pouvons passer en deuxième paramètre du render twig le tableau suivant : `['articles' => $articles]`. 
Notre vue Twig aura maintenant accès à une variable `articles`.
Si nous avions besoin d'une autre variable comportant le nombre 10, nous pouvions la passer aussi à la vue comme ceci : `['articles' => $articles, 'autreVar' => 10]`.

Pour tester le fonctionnement vous pouvez faire un dump dans votre vue Twig pour valider qu'elle reçoit bien la variable Twig `articles`.

A la place de `Hello World` vous pouvez mettre l'instruction 
`{{ dump(user) }}` et vous devriez voir le contenu du tableau qui s'affiche dans la page !

Il ne nous reste plus qu'àt parcourir ce ableau avec une boucle for dans notre vue. Et afficher nos articles en respectant la sémantique HTML de notre thème !

> https://twig.symfony.com/doc/2.x/tags/for.html