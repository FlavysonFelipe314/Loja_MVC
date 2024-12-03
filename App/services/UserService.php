<?php 

namespace App\services;

use App\repositories\UserRepositoryMysql;

class UserService{
    
    public function getUser($key, $value){

        $UserRepository = new UserRepositoryMysql;
        $user = $UserRepository->findBy($key, $value);
        return $user;
    }

}

?>