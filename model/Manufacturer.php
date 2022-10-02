<?php

class Manufacturer {
    private $cnpj;
    private $name;

    public function setName ($name) {
        return $this->name = $name;
    }
    public function getName () {
        return $this->name;
    }

    public function setCnpj ($cnpj) {
        return $this->cnpj = $cnpj;
    }
    public function getCnpj () {
        return $this->cnpj;
    }
}