<?php
namespace App\controllers;

use App\core\Controller;
use App\services\AuthService;

class ProductsController extends Controller{

    public function index(){        
        $AuthService = new AuthService;
        $userInfo = $AuthService->checkToken();

        $data = [
            'nome' => $userInfo->getName(),
        ];
        
        $this->loadTemplate("products/index", $data);
    }

}
?>