<?php
require_once 'Model.php';

class Products {
    private $name;
    private $amount;
    private $modelo; //fazer agregação

    public function setName($name) {
        return $this->$name = $name;
    }
    public function getName() {
        return $this->$name;
    }

    public function setAmount($amount) {
        return $this->$amount = $amount;
    }
    public function getAmount() {
        return $this->$amount;
    }

}