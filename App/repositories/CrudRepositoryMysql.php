<?php

namespace App\repositories;

use App\core\Repository;
use App\models\Crud;
use PDO;

class CrudRepositoryMysql extends Repository{

    public function create(Crud $c)
    {
        $sql = $this->pdo->prepare("INSERT INTO crud (nome, email) VALUES (:nome, :email)");
        $sql->bindValue(":nome", $c->nome);
        $sql->bindValue(":email", $c->email);
        $sql->execute();

        return true;
    }

    public function findAll(){
        $sql = $this->pdo->prepare("SELECT * FROM crud ORDER BY id DESC");
        $sql->execute();

        if($sql->rowCount() > 0){
            $data = $sql->fetchAll(PDO::FETCH_ASSOC);

            $array = [];

            foreach($data as $item){
                $crud = $this->_generanteCrud($item);
                $array[] = $crud;
            }

            return $array;
        }
    }

    public function findById($id){
        $sql = $this->pdo->prepare("SELECT * FROM crud WHERE id = :id");
        $sql->bindValue(":id", $id);
        $sql->execute();

        $data = $sql->fetch(PDO::FETCH_ASSOC);
        $crud = $this->_generanteCrud($data);
        return $crud;
    }

    public function update(Crud $c)
    {
        $sql = $this->pdo->prepare("UPDATE crud SET
        nome = :nome,
        email = :email
        WHERE id = :id");

        $sql->bindValue(":nome", $c->nome);
        $sql->bindValue(":email", $c->email);
        $sql->bindValue(":id", $c->id);
        $sql->execute();

        return true;
    }

    public function delete($id)
    {
        $sql = $this->pdo->prepare("DELETE FROM crud WHERE id = :id");
        $sql->bindValue(":id", $id);
        $sql->execute();
    }


    private function _generanteCrud($data)
    {
        $Crud = new Crud;
        $Crud->id = $data["id"];
        $Crud->nome = $data["nome"];
        $Crud->email = $data["email"];
        
        return $Crud;
    }
}

?>