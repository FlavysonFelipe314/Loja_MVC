<?php

namespace App\controllers;

use App\core\Controller;

class GaleriaController extends Controller {

    public function abrir($id, $titulo){    
        echo "titulo: $titulo <br>id: $id";
    }
    
}
