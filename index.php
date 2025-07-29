<?php

include "./env.php";
include "./vendor/autoload.php";

//Analyse de l'URL avec parse_url() et retourne ses composants
$url = parse_url($_SERVER['REQUEST_URI']);
//test si l'url posséde une route sinon on renvoi à la racine
$path = $url['path'] ??  '/';

switch ($url){
    case './task_poo/':
        echo "Bienvenue";
        break;
    case './task_poo/connexion':
        echo "Connexion";
        break;
    case'./task_poo/add':
        echo "La tache a ete ajoutée";
        break;
    default:
        echo '404';
        break;
}