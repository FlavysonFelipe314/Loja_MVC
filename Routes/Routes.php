<?php
namespace Routes;

class Routes{

    public static function getRoutes(){

        return  [
        
            '/galeria/{id}/{titulo}' => 'GaleriaController@abrir',
            '/add' => 'CrudController@cadastro'
        
        ];
    }

}

?>