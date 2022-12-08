<?php

class Products {
    private $name;
    private $amountTotal;
    private $model;
    private $price;
    private $id;
    private $sizes;
    private $imageId;
    private $imgName;
    private $providerId;
    private $Sizes_Amounts;

    function setSizes_Amounts( array $sizes_amounts) {
        $this->Sizes_Amounts = $sizes_amounts;
    }
    function getSizes_Amounts () {
        return $this->Sizes_Amounts;
    }
    function setImgName(string $nameImg) {
        $this->imgName = $nameImg;
    }

    function getImgName () {
        return $this->imgName;
    }

    public function setProviderId(int $providerId) {
        $this-> providerId = $providerId;
    }
    public function getProviderId() {
        return $this-> providerId;
    }
    public function setImagemId(int $imageId) {
        $this-> imageId = $imageId;
    }
    public function getImagemId() {
        return $this-> imageId;
    }
    public function setSize(array $listSize) {
        $this-> sizes = $listSize;
    }
    public function getSize() {
        return $this-> sizes;
    }
    public function setName(string $name) {
        $this -> name = $name;
    }
    public function getName() {
        return $this -> name;
    }
    public function setAmount(array $amountTotal) {
        $this -> amountTotal = $amountTotal;
    }
    public function getAmount() {
        return $this -> amountTotal;
    }
    public function setModel (string $model) {
        $this-> model -> $model;
    }
    public function getModel () {
        return $this -> model;
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
}

