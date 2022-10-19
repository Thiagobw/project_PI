<?php

require_once "Users.php";

class Customers extends Users {
    private $cpf;
    private $tell;
    private $name;
    private $codigoclie;
    private $email;

    public function setCpf($cpf) {
        return $this->cpf = $cpf;
    }

    public function getCpf() {
        return $this->cpf;
    }

    public function setTell($tell) {
        return $this->name = $tell;
    }

    public function getTell() {
        return $this->tell;
    }

    public function setName($name) {
        return $this->name = $name;
    }

    public function getName() {
        return $this->name;
    }

    public function setCodigoclie(String $codigoclie) {
        return $this->codigoclie = $codigoclie;
    }

    public function getCodigoclie() {
        return $this->codigoclie;
    }

    public function setEmail($email) {
        return $this->email = $email;
    }
    
    public function getEmail() {
        return $this->email;
    }


}