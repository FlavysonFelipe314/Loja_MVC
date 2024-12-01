<?php

namespace App\repositories;

use App\core\Repository;
use App\models\User;
use PDO;

class UserRepositoryMysql extends Repository{

    public function FindUser($id){
        $sql = $this->pdo->prepare("SELECT * FROM personagem WHERE id = :id");
        $sql->bindValue(":id", $id);
        $sql->execute();

        $data = $sql->fetch(PDO::FETCH_ASSOC);
        
        $user = $this->_generanteUser($data);

        return $user;
    }

    private function _generanteUser($data){
        $user = new User;
        $user->id = $data["id"];
        $user->nome = $data["nome"];
        
        return $user;
    }
}

?>