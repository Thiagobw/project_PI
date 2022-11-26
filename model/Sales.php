<?php

class Sales {
    private $value;
    private $paymentMethod;
    private $date;

    public function setValueOrder($value) {
        return $this->value = $value;
    }
    public function getValueOrder() {
        return $this->value;
    }
    public function setPaymentMethod($paymentMethod) {
        return $this->paymentMethod = $paymentMethod;
    }
    public function getPaymentMethod() {
        return $this->paymentMethod;
    }
    public function setId($id) {
        return $this->id = $id;
    }
    public function getId() {
        return $this->id;
    }
    public function setDate($date) {
        return $this->date = $date;
    }
    public function getDate() {
        return $this->date;
    }
}