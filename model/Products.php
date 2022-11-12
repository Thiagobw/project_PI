<?php

class Products {
    private $name;
    private $amount;
    private $model;
    private $manufacturer;
    private $price;
    private $id;
    private $size;


    public function setName(string $name) {
        $this -> name = $name;
    }
    public function getName() {
        return $this -> name;
    }


    public function setAmount( $amount) {
        $this -> amount = $amount;
    }
    public function getAmount() {
        return $this -> amount;
    }

    
    public function setModel (string $model) {
        $this-> model -> $model;
    }
    public function getModel () {
        return $this -> model;
    }


    public function setManufacturer (string $manufacturer) {
        $this -> manufacturer = $manufacturer;
    }
    public function getManufacturer () {
        return $this -> manufacturer;
    }
    
    
    public function setPrice(string $price) {
        $this -> price = $price;
    }
    public function getPrice() {
        return $this -> price;
    }
    
    
    public function setId (int $id) {
        $this -> id = $id;
    }
    public function getId() {
        return $this -> id;
    }

    public function setTamanho($size) {
        $this -> size = $size;
    }
    public function getTamanho() {
        return $this -> size;
    }

}
