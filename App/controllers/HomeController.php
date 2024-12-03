<?php

namespace App\controllers;

use App\core\Controller;
use App\Services\AuthService;
use App\services\UserService;
use Exception;

class HomeController extends Controller{

    public function index(){        
        $AuthService = new AuthService;
        $userInfo = $AuthService->checkToken();
        
        $this->loadTemplate("home/index");
    }

    public function cadastro()
    {        
        $this->loadTemplate("home/cadastro");
    }

    public function getCadastro()
    {        
        if($_SERVER["REQUEST_METHOD"] === "POST"){
            $name = filter_input(INPUT_POST, "name", FILTER_SANITIZE_FULL_SPECIAL_CHARS);
            $email = filter_input(INPUT_POST, "email", FILTER_SANITIZE_URL);
            $password = filter_input(INPUT_POST, "password");
        
            $UserService = new UserService;
            $AuthService = new AuthService;


            if($UserService->getUser("email", $email) === false){
                try{
                    $AuthService->registerUser($name, $password, $email);


                    $this->loadFlash("Sucesso", "Cadastro Realizado Com Sucesso");
                    
                    echo "Cadastrado com Sucesso";

                    header("Location: ".BASE_DIR);

                }
                catch(Exception $e){
                    $this->loadFlash("erro", "Algo deu Errado: $e");
                    header("Location: ".BASE_DIR."cadastro");
                }

            }else{
                $this->loadFlash("erro", "Já existe uma Conta com Esse Nome");
                header("Location: ".BASE_DIR."cadastro");
            }


        }
    }

    public function login()
    {        
        $this->loadTemplate("home/login");
    }


    public function getLogin()
    {        
        $this->loadTemplate("home/cadastro");
    }


    public function logout()
    {
        $AuthService = new AuthService;
        $AuthService->logout();
    }

}
?>