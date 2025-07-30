<?php

namespace App\Controller;

use App\Model\Category;
use App\Utils\Utilitaire;

class CategoryController
{

    //Attribut Model Category
    private Category $category;

    public function __construct()
    {
        //Injection de dépendance
        $this->category = new Category();
    }

    public function showAllCategory()
    {
        //Récupération du message de confirmation
        $message = $_GET["message"] ?? "";
        $categories = $this->category->findAllCategory();
        include "App/View/viewAllCategory.php";
    }

    public function addCategory()
    {
        $message = "";
        if (isset($_POST["submit"])) {
            if (!empty($_POST["name"])) {
                $name = Utilitaire::sanitize($_POST["name"]);
                $category = new Category();
                $category->setName($name);
                if (!$category->isCategoryByName()) {
                    $category->saveCategory();
                    header("Location: /task_poo/category/all?message=La category " . $name . " a été ajouté en BDD");
                } else {
                    $message = "La categorie existe déja";
                }
            } else {
                $message = "Veuillez remplir les champs obligatoire";
            }
        }

        include "App/View/viewAddCategory.php";
    }

    public function removeCategory()
    {
        if (!empty($_GET["id"])) {
            $id = Utilitaire::sanitize($_GET["id"]);
            $category = new Category();
            $category->setIdCategory($id);
            $category->deleteCategory($id);
            header("Location: /task_poo/category/all?message=La category a été retirée de la BDD");
        } else {
            $message = "Veuillez remplir les champs obligatoire";
        }

        include "App/View/viewDeleteCategory.php";
    }
}
