<?php

class Products {
    private $name;
    private $amount; /* quantidade */
    private $model; /* modelo */
    private Characteristics $productCharacteristics;
    private Manufacturer $manufacturer; /** fabricante */
    private $price;
    private $codigo;

    public function setName(string $name) {
        $this->name = $name;
    }
    public function getName() {
        return $this->name;
    }

    public function setAmount($amount) {
        $this->amount = $amount;
    }
    public function getAmount() {
        return $this->amount;
    }

    public function setModel ($model) {
        $this-> model -> $model;
    }
    public function getModel () {
        return $this -> model;
    }
    public function setPrice(string $price) {
        $this->price = $price;
    }
    public function getPrice() {
        return $this->price;
    }
    public function setCodigo (string $codigo) {
        $this->codigo = $codigo;
    }
    public function getCodigo() {
        return $this->codigo;
}

}