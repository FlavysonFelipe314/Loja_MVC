<?php

namespace App\controllers;

use App\core\Controller;
use App\services\CrudService;
use Exception;

class CrudController extends Controller {

    
    public function cadastro()
    {
        $this->loadTemplate("crud/cadastro");
    }

    public function crudCreate() 
    {
        if ($_SERVER["REQUEST_METHOD"] === "POST") {

            $nome = filter_input(INPUT_POST, "nome", FILTER_SANITIZE_FULL_SPECIAL_CHARS);
            $email = filter_input(INPUT_POST, "email", FILTER_SANITIZE_EMAIL);

            if (!empty($nome) && !empty($email)) {
                $CrudService = new CrudService;

                try{
                    $CrudService->insertCrud($nome, $email);
                    header("Location: ". BASE_DIR);
                    exit; 
                } catch(Exception $e) {
                    header("Location: ". BASE_DIR ."crud/cadastro");
                    exit;
                }

            } else {
                header("Location: ". BASE_DIR ."crud/cadastro");
                exit;
            }
            
        } 
        
        header("Location: " . BASE_DIR);
        exit;
    }

    public function editar($id)
    {
        $CrudService = new CrudService;
        $crud = $CrudService->getCrudId($id);

        $data = [
            "id" => $crud->id,
            "nome" => $crud->nome,
            "email" => $crud->email
        ];

        $this->loadTemplate("crud/editar", $data);
    }

    public function crudEditar()
    {
        if ($_SERVER["REQUEST_METHOD"] === "POST") {

            $nome = filter_input(INPUT_POST, "nome", FILTER_SANITIZE_FULL_SPECIAL_CHARS);
            $email = filter_input(INPUT_POST, "email", FILTER_SANITIZE_EMAIL);
            $id = filter_input(INPUT_POST, "id");

            if (!empty($nome) && !empty($email) && !empty($id)) {
                $CrudService = new CrudService;

                try{
                    $CrudService->editCrud($nome, $email, $id);
                    header("Location: ". BASE_DIR);
                    exit; 
                } catch(Exception $e) {
                    header("Location: ". BASE_DIR);
                    exit;
                }

            } else {
                header("Location: ". BASE_DIR ."crud/editar");
                exit;
            }
            
        } 
        
        header("Location: " . BASE_DIR);
        exit;    
    }

    public function deletar($id)
    {
        if (!empty($id)) {
            $CrudService = new CrudService;

            try{
                $CrudService->deleteCrud($id);
                header("Location: ". BASE_DIR);
                exit; 
            } catch(Exception $e) {
                header("Location: ". BASE_DIR);
                exit;
            }

        } else {
            header("Location: ". BASE_DIR);
            exit;
        }
    } 
}
