<?php

namespace App\controllers;

use App\core\Controller;
use App\services\AuthService;
use App\services\UserService;
use Exception;

class HomeController extends Controller{

    public function index(){        
        $AuthService = new AuthService;
        $userInfo = $AuthService->checkToken();

        $data = [
            'user' => $userInfo,
        ];
        
        $this->loadTemplate("home/index", $data);
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
                $this->loadFlash("erro", "Já existe uma Conta com Esse Email");
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
        if($_SERVER["REQUEST_METHOD"] === "POST"){
            $email = filter_input(INPUT_POST, "email", FILTER_SANITIZE_URL);
            $password = filter_input(INPUT_POST, "password");
        
            $AuthService = new AuthService;
            
            if($AuthService->validateLogin($email, $password)){
                $this->loadFlash("Sucesso", "Login Realizado com Sucesso");
                header("Location: ".BASE_DIR);
                exit;
            }

            $this->loadFlash("erro", "Email ou Senha Incorretos");
            header("Location: ".BASE_DIR."login");


        }
    }


    public function logout()
    {
        $AuthService = new AuthService;
        $AuthService->logout();
    }

}
?>