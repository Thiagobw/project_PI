<?php

class request
{
    private $price;
    private $formpay;
    private $data;

    public function setPrice($price){
        return $this->price = $price;
    }
    public function getPrice(){
        return $this->price;
    }
    public function setFormpay($formpay) {
        return $this->formpay = $formpay;
    }
    public function getFormpay() {
        return $this->frompay;
    }
    public function setData($data) {
        return $this->data = $data;
    }

    public function getData() {
        return $this->data;
    }    
}





?>