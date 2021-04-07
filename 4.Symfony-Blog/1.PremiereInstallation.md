# Installation de symfony

Pour installer Symfony nous pouvons utiliser composer et lui demander d'installer les packages dont nous avons besoin.

Depuis les dernières version de Symfony, il est recommandé d'utiliser directement l'executable de Symfony pour l'installation.

Lors de l'installation de Symfony nous allons pouvoir préciser quels composants seront nécessaire à notre projet en utilisant différente `recettes` d'installation ou différent `squelletes`. 
Par exemple installer une version `lite` du Framework pour une utilisation simple (pas de rendu HTML spécifique).
Ou installer une version complète qui contient les composants nécessaire pour une utilisation de Symfony dans le cadre d'un projet Web. 
C'est cette dernière option que nous allons utiliser maintenant.

## Prérequis 

Avant toute chose vous devez vous assurez que vous disposez des bons prérequis :

> https://symfony.com/doc/current/setup.html#technical-requirements

- PHP 7.2.5 ou > . Et les extensions PHP suivante normalement déjà installées par défaut :  Ctype, iconv, JSON, PCRE, Session, SimpleXML, and Tokenizer;
- Composer dans sa dernière version
- Symfony CLI pour installer Symfony et utiliser le server Web et les fonctionnalités avancées : https://symfony.com/download


Pour valider que tout est bon une fois l'installation de la CLI Symfony, ouvrez un terminal et tapez la ligne de commande : 

```bash
symfony check:requirements
```

Mettre à jour composer :

```bash
composer self-update
```

## Première installation

Pour installer le webSite Skeleton (les composants Symfony de base pour faire un site Web) executez cette ligne de commande. Le téléchargements des packets commence et peut-être un peu long !

> Placez vous dans le dossier parent où vous voulez créer votre projet.
> Inutil d'être dans votre dossier Web (de WAMP, MAMP ou Laragon). Nous n'avons pas besoin de notre serveur Web. Symfony fourni un serveur Web embarqué. A vous de bien ranger votre projet. Privilégiez votre dossier Web tout de même pour retrouver facilement votre projet !

> Remplacez **myDirectoryProjectName** par le nom de votre projet. Qui sera aussi le nom du répertoire. Par exemple Blog.

```bash
symfony new --full myDirectoryProjectName
```

Il est possible de préciser la version installé. La ligne précédente va installer la dernière version de Symfony. Si vous souhaitez installer la version prise en charge à long terme (actuellement la 4.4 LTS) :


```bash
symfony new --full myDirectoryProjectName --version=lts 
```

Il est tout à fait possible d'installer Symfony en passant directement par Composer. Mais de notre côté nous allons utiliser l'outil en ligne de commande de Symfony. Avec Composer il faudrait taper la ligne de commande :

```bash
composer create-project symfony/website-skeleton myDirectoryProjectName
```

## Premiers tests 

Déplacez vous ensuite dans votre dossier Symfony. Vous pouvez jetter un oeil à l'arborescence des fichiers, nous y reviendrons ensemble. Mais vous devez déjà y retrouver vos petits ;)

** Valider le fonctionnament **

On lance le serveur Web embarqué avec Symfony :

```bash
php bin/console server:run
```

Suivez l'url vers localhost proposée. Vous devriez voir la page de fonctionnement de Symfony !
