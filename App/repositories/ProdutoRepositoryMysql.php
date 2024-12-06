<?php

namespace App\repositories;

use App\core\Repository;
use App\interfaces\ProdutoInterface;
use App\models\Produto;
use PDO;

class ProdutoRepositoryMysql extends Repository implements ProdutoInterface{

    public function create(Produto $produto)
    {
        $sql = $this->pdo->prepare("INSERT INTO products
        (name, price, description, photo, id_user) VALUES (:name, :price, :description, :photo, :id_user)");
        $sql->bindValue(":name", $produto->getName());
        $sql->bindValue(":price", $produto->getPrice());
        $sql->bindValue(":description", $produto->getDescription());
        $sql->bindValue(":photo", $produto->getPhoto());
        $sql->bindValue(":id_user", $produto->getIdUser());
        
        $sql->execute();
    }

    public function update(Produto $produto){}

    public function findAll()
    {
        $sql = $this->pdo->prepare("SELECT * FROM products 
        ORDER BY created_at");
        $sql->execute();

        if($sql->rowCount() > 0){
            $data = $sql->fetchAll(PDO::FETCH_ASSOC);

            $array = [];
            foreach($data as $item){
                $produto = $this->_generateProduto($item);
                $array[] = $produto;
            }

            return $array;
        }
        
        return false;
    }

    public function findBy($key, $value)
    {
        $sql = $this->pdo->prepare("SELECT * FROM products WHERE $key = :$key");
        $sql->bindValue(":$key", $value);
        $sql->execute();

        if($sql->rowCount() > 0){
            $data = $sql->fetch(PDO::FETCH_ASSOC);

            $produto = $this->_generateProduto($data);

            return $produto;
            exit;
        }

        return false;
    }

    public function delete($id)
    {
        $sql = $this->pdo->prepare("DELETE * FROM products WHERE id = :id");
        $sql->bindValue(":id", $id);
        $sql->execute();
    }

    public function _generateProduto($data)
    {
        $Produto = new Produto;
        $Produto->setId($data["id"]);
        $Produto->setIdUser($data["id_user"]);
        $Produto->setName($data["name"]);
        $Produto->setPrice($data["price"]);
        $Produto->setDescription($data["description"]);
        $Produto->setPhoto($data["photo"]);

        return $Produto;
    }
}
