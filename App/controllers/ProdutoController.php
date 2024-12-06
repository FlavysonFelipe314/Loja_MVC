<?php
namespace App\controllers;

use App\core\Controller;
use App\services\AuthService;
use App\services\ProdutoService;
use Exception;

class ProdutoController extends Controller{

    public function index()
    {        
        $AuthService = new AuthService;
        $userInfo = $AuthService->checkToken();

        $ProdutoService = new ProdutoService;
        $produtos = $ProdutoService->getAllProdutos();

        $data = [
            "produtos" => $produtos,
            "user" => $userInfo
        ];
        
        $this->loadTemplate("products/index", $data);
    }

    public function cadastro()
    {        
        $AuthService = new AuthService;
        $userInfo = $AuthService->checkToken();

        if($_SERVER["REQUEST_METHOD"] === "POST"){
            $name = filter_input(INPUT_POST, "name", FILTER_SANITIZE_FULL_SPECIAL_CHARS);
            $price = filter_input(INPUT_POST, "price");
            $description = filter_input(INPUT_POST, "description", FILTER_SANITIZE_FULL_SPECIAL_CHARS);
            $photo = $_FILES["photo"];

            try{
                $ProdutoService = new ProdutoService;
                $ProdutoService->insertProduto($name, $price, $description, $photo["tmp_name"], $userInfo->getId());
                $this->loadFlash("sucesso", "Produto Cadastrado com Sucesso");
                header("Location: ".BASE_DIR);
            }
            catch(Exception $e){
                $this->loadFlash("erro", "Algo deu Errado, Tente Novamente");
                header("Location: ".BASE_DIR);
            }
        }
    }

    public function produto($id)
    {        
        $AuthService = new AuthService;
        $userInfo = $AuthService->checkToken();

        $ProdutoService = new ProdutoService;
        $produto = $ProdutoService->getProduto("id", $id);

        $data = [
            "produto" => $produto,
            "user" => $userInfo
        ];
        
        $this->loadTemplate("products/produto", $data);
    }
    
}
?>