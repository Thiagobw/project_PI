<?php

class Providers {
    private $name;
    private $cnpj;
    private $email;
    private $tell;
    private $id;
    

    public function setName(string $name) {
        $this -> name = $name;
    }

    public function getName () {
        return $this -> name;
    }

    public function setCnpj (string $cnpj) {
        $this -> cnpj = $cnpj;
    }

    public function getCnpj () {
        return $this -> cnpj;
    }

    public function setEmail (string $email) {
        $this -> email = $email;
    }

    public function getEmail () {
        return $this -> email;
    }

    public function setTell (string $tell) {
        $this -> tell = $tell;
    }

    public function getTell () {
        return $this -> tell;
    }
    public function setId(int $id) {
        $this -> id = $id;
    }
    
    public function getId () {
        return $this -> id;
    }
}