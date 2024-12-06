<?php 

namespace App\services;

use App\models\Produto;
use App\repositories\ProdutoRepositoryMysql;

class ProdutoService{
    
    public $UserInfo;

    public function __construct()
    {
        $AuthService = new AuthService;
        $this->UserInfo = $AuthService->checkToken();

    }
    
    public function getAllProdutos(){
        $ProdutoRepository = new ProdutoRepositoryMysql;
        $Produto = $ProdutoRepository->findAll();
        return $Produto;
    }
    
    public function getProduto($key, $value){
        $ProdutoRepository = new ProdutoRepositoryMysql;
        $Produto = $ProdutoRepository->findBy($key, $value);
        return $Produto;
    }

    public function insertProduto($name, $price, $description, $photo, $id_user){
        $ProdutoRepository = new ProdutoRepositoryMysql;

        $Produto = new Produto;
        $Produto->setName($name);
        $Produto->setPrice($price);
        $Produto->setDescription($description);
        $Produto->setPhoto($photo);
        $Produto->setIdUser($id_user);

        $ProdutoRepository->create($Produto);
    }

}

?>