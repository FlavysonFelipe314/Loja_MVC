<?php 

namespace App\services;

use App\repositories\UserRepositoryMysql;

class UserService{
    
    private $UserRepository;

    public function __construct()
    {
        $this->UserRepository = new UserRepositoryMysql;
    }

    public function getUser($id){
        $user = $this->UserRepository->FindUser($id);
        return $user;
    }

}

?>