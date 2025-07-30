<?php

include "./env.php";
include "./vendor/autoload.php";

//Analyse de l'URL avec parse_url() et retourne ses composants
$url = parse_url($_SERVER['REQUEST_URI']);
//test si l'url posséde une route sinon on renvoi à la racine
$path = $url['path'] ??  '/';

use App\Controller\HomeController;
use App\Controller\CategoryController;

$homeController = new HomeController();
$categoryController = new CategoryController();

switch ($path){
    case '/task_poo/':
        $homeController->home();
        break;
    case '/task_poo/category/all':
        $categoryController->showAllCategory();
        break;
    case'/task_poo/category/add':
        $categoryController->AddCategory();
        break;
    case'/task_poo/category/delete':
        $categoryController->removeCategory();
        break;
    default:
        echo '404';
        break;
}