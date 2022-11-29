<?php

class Sales {
    private $value;
    private $paymentMethod;
    private $date;
    private $user_id;
    private $customer_id;
    private $employee_id;

    public function setUserId($user_id) {
        return $this->user_id = $user_id;
    }
    public function getUserId() {
        return $this->user_id;
    }
    public function setCustomerId($customer_id) {
        return $this->customer_id = $customer_id;
    }
    public function getCustomerId() {
        return $this->customer_id;
    }
    public function setEmployeeId($employee_id) {
        return $this->employee_id = $employee_id;
    }
    public function getEmployeeId() {
        return $this->employee_id;
    }
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