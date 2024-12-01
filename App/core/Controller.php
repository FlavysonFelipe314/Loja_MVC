<?php

namespace App\core;

class Controller{
    public function loadView($viewName, $viewData = []){
        extract($viewData);
        require_once __DIR__ . "/../../views/".$viewName.".php";
    } 

    public function loadTemplate($viewName, $viewData = []){
        require_once __DIR__ . "/../../views/template.php";
    }

    public function loadViewTemplate($viewName, $viewData = []){
        extract($viewData);
        require_once __DIR__ .  "/../../views/".$viewName.".php";
    }

}
?>