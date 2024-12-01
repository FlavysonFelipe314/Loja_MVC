<?php 

namespace App\core;

class Repository{

    protected $pdo;

    public function __construct()
    {
        $this->pdo = PDO_CONNECTION;
    }

}

?>