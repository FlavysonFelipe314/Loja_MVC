<?php

namespace App\interfaces;

use App\Models\Produto;

interface ProdutoInterface {
    public function create(Produto $produto);
    public function update(Produto $produto);
    public function findAll();
    public function findBy($key, $value);
    public function delete($id);
}
