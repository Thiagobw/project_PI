<?php
require_once 'Model.php';

class Products {
    private $name;
    private $amount;
    private Model $modelo; 

    public function setName(string $name) {
        return $this->$name = $name;
    }
    public function getName() {
        return $this->name;
    }

    public function setAmount($amount) {
        return $this->$amount = $amount;
    }
    public function getAmount() {
        return $this->amount;
    }
}