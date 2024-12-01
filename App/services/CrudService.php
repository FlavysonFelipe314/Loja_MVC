<?php 

namespace App\services;

use App\models\Crud;
use App\repositories\CrudRepositoryMysql;

class CrudService{
    
    private $CrudRepository;

    public function __construct()
    {
        $this->CrudRepository = new CrudRepositoryMysql;
    }

    public function insertCrud($nome, $email){
        $crud = new Crud;
        $crud->nome = $nome;
        $crud->email = $email;

        $this->CrudRepository->create($crud);
        
    }

    public function getAllCrud(){
        $data = $this->CrudRepository->findAll();   
        return $data;
    }

    public function getCrudId($id){
        $data = $this->CrudRepository->findById($id);   
        return $data;
    }

    public function editCrud($nome, $email, $id){
        $crud = new Crud;
        $crud->id = $id;
        $crud->nome = $nome;
        $crud->email = $email;

        $this->CrudRepository->update($crud);
    }

    public function deleteCrud($id){
        $this->CrudRepository->delete($id);
        return true;
    }

}

?>