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

            '/produtos' => 'ProductsController@index',
            '/addProduct' => 'ProductsController@cadastro',
            
            '/logout' => 'HomeController@logout'

        ];
    }

}

?>