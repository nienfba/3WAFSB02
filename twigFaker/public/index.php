<?php

use Faker\Factory;
use Twig\Environment;
use Twig\Loader\FilesystemLoader;
use Twig\Extra\String\StringExtension;

require('../vendor/autoload.php');

$loader = new FilesystemLoader('../views');
$twig = new Environment($loader,['debug' => true]);//['cache' => '../cache',]
$twig->addExtension(new \Twig\Extension\DebugExtension());
$twig->addExtension(new StringExtension());


$titlePage = 'Game & Code !';

// use the factory to create a Faker\Generator instance
$faker = Factory::create('fr_FR');

$articles = [];

for ($i=0;$i<10;$i++){
    $article = [];
    $article['title'] = $faker->sentence();
    $article['content'] = $faker->realText(600);
    $article['createdAt'] = $faker->date('d/m/Y H:i');
    $article['user'] = $faker->name();
    $article['picture'] = 'https://picsum.photos/300/200?id='.uniqid();
    //$faker->imageUrl(1920, 1080, 'animals');
    $articles[] = $article;
}

echo $twig->render('blog/home.html.twig', ['titlePage' => $titlePage, 'articles'=>$articles]);