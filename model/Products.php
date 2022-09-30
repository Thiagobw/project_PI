<?php
require_once 'Model.php';

class Products {
    private $name;
    private $amount; /* quantidade */
    private Model $model; /* modelo */
    private Characteristics $productCharacteristics;
    private Manufacturer $manufacturer; /** fabricante */

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

    public function setModel ($modelDescription) {
        $this-> model -> setDescription($modelDescription);
    }
    public function getModel () {
        return $this-> model -> getDescription();
    }

}