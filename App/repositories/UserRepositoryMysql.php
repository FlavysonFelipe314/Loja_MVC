<?php

namespace App\repositories;

use App\core\Repository;
use App\interfaces\UserInterface;
use App\Models\User;

class UserRepositoryMysql extends Repository implements UserInterface{

    public function create(User $user)
    {
        $sql = $this->pdo->prepare("INSERT INTO users 
        (name, password, email, token) VALUES (:name, :password, :email, :token)");
        $sql->bindValue(":name", $user->getName());
        $sql->bindValue(":password", $user->getPassword());
        $sql->bindValue(":email", $user->getEmail());
        $sql->bindValue(":token", $user->getToken());
        $sql->execute();
    }
    
    public function update(User $user){}
    
    public function findBy($key, $value){
        $sql = $this->pdo->prepare("SELECT * FROM users WHERE $key = :$key");
        $sql->bindValue(":$key", $value);
        $sql->execute();

        if($sql->rowCount() > 0){
            $data = $sql->fetchAll();
        
            foreach($data as $item){
                $user = $this->_generateUser($item);
            }

            return $user;
        }else{
            return false;
        }
    }
    
    public function delete($id){}

    private function _generateUser($data){
        $User = new User;
        $User->setName($data["name"]);
        $User->setName($data["email"]);
        $User->setName($data["password"]);
        $User->setName($data["token"]);

        return $User;
    }
}
