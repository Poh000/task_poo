<?php

namespace App\Model;

use App\Utils\Bdd;

class Category
{
    private int $idCategory;
    private string $name;

    private \PDO $connexion;

    public function __construct()
    {
        $this->connexion = (new Bdd())->connectBDD();
    }

    public function getIdCategory(): int
    {
        return $this->idCategory;
    }

    public function setIdCategory(int $id): self
    {
        $this->idCategory = $id;
        return $this;
    }

    public function getName(): string
    {
        return $this->name;
    }

    public function setName(string $name): self
    {
        $this->name = $name;
        return $this;
    }


    public function saveCategory(): void
    {
        try {
            $name = $this->name;
            //Stocker la requête dans une variable
            $request = "INSERT INTO category(name) VALUES (?)";
            //1 préparer la requête
            $req = $this->connexion->prepare($request);
            //2 Bind les paramètres
            $req->bindParam(1, $name, \PDO::PARAM_STR);
            //3 executer la requête
            $req->execute();
            //Capture des erreurs 
        } catch (\Exception $e) {
        }
    }

    public function findAllCategory(): array
    {
        try {
            $request = "SELECT c.id_category AS idCategory, c.name FROM category AS c";
            $req = $this->connexion->prepare($request);
            $req->execute();
            return $req->fetchAll(\PDO::FETCH_CLASS, Category::class);
        } catch (\Exception $e) {
            return [$e->getMessage()];
        }
    }

    public function isCategoryByName()
    {
        try {
            $name = $this->name;
            $request = "SELECT c.id_category FROM category AS c WHERE c.name = ?";
            $req = $this->connexion->prepare($request);
            $req->bindParam(1, $name, \PDO::PARAM_STR);
            $req->execute();
            $data = $req->fetch(\PDO::FETCH_ASSOC);
            if (empty($data)) {
                return false;
            }
            return true;
        } catch (\Exception $e) {
            return false;
        }
    }

    public function deleteCategory($id)
    {
        try {
            $request = "DELETE FROM category WHERE id_category = (?)";
            $req = $this->connexion->prepare($request);
            $req->bindParam(1, $id, \PDO::PARAM_INT);
            $req->execute();
        } catch (\Exception $e) {
            echo $e->getMessage();
        }
    }
}
