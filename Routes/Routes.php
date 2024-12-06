<?php
namespace Routes;

class Routes{

    public static function getRoutes(){

        return  [
            '/' => 'HomeController@index',
            '/home' => 'HomeController@index',

            '/login' => 'HomeController@login',
            '/getLogin' => 'HomeController@getLogin',
            
            '/cadastro' => 'HomeController@cadastro',
            '/getCadastro' => 'HomeController@getCadastro',

            '/produtos' => 'ProdutoController@index',
            '/addProduct' => 'ProdutoController@cadastro',

            '/produto/{id}' => 'ProdutoController@produto',
            
            '/logout' => 'HomeController@logout'

        ];
    }

}

?>