<?php

namespace App\controllers;

use App\core\Controller;
use App\services\CrudService;

class HomeController extends Controller{

    public function index(){
        $CrudService = new CrudService;        
        $data = $CrudService->getAllCrud();

        $this->loadTemplate("home/index", $data);
    }


}
?>