<?php 

namespace App\services;

use App\models\User;
use App\repositories\UserRepositoryMysql;

class AuthService{

    public function checkToken()
    {
        if(!empty($_SESSION["token"])){
            $token = $_SESSION["token"];
            $UserRepository = new UserRepositoryMysql;
            $user = $UserRepository->findBy('token', $token);

            if($user){
                return $user;
                exit;
            }

        }

        header("Location: ".BASE_DIR."login");
    }

    public function registerUser($name, $password, $email)
    {
        $UserRepository = new UserRepositoryMysql;
        $token = md5(time().rand(0, 9999));
        $hash = password_hash($password, PASSWORD_BCRYPT);

        $User = new User;
        $User->setName($name);
        $User->setPassword($hash);
        $User->setEmail($email);
        $User->setToken($token);

        $UserRepository->create($User);

        $_SESSION["token"] = $token;
    }


    public function logout()
    {
        session_unset();
        session_destroy();
        unset($_SESSION["token"]);
        header("Location: ".BASE_DIR);

    }
}

?>
