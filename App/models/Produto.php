<?php

namespace App\models;

class Produto
{
    private $id;
    private $name;
    private $price;
    private $description;
    private $photo;
    private $id_user;

    // Setters
    public function setId($id)
    {
        $this->id = $id;
    }

    public function setName($name)
    {
        $this->name = $name;
    }

    public function setPrice($price)
    {
        $this->price = $price;
    }

    public function setDescription($description)
    {
        $this->description = $description;
    }

    public function setPhoto($photo)
    {
        $this->photo = $photo;
    }

    public function setIdUser($id_user)
    {
        $this->id_user = $id_user;
    }

    // Getters
    public function getId()
    {
        return $this->id;
    }

    public function getName()
    {
        return $this->name;
    }

    public function getPrice()
    {
        return $this->price;
    }

    public function getDescription()
    {
        return $this->description;
    }

    public function getPhoto()
    {
        return $this->photo;
    }

    public function getIdUser()
    {
        return $this->id_user;
    }
}

?>
