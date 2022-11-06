<?php

class Employees {
    private $name;
    private $cpf;
    private $email;
    private $tel;
    private $type;
    private $id;

    public function setName(string $name) {
        $this -> name = $name;
    }
    
    public function getName() {
        return $this -> name;
    }

    public function setCpf(string $cpf) {
        $this -> cpf = $cpf;
    }
    
    public function getCpf() {
        return $this -> cpf;
    }
    
    public function setEmail (string $email) {
        $this -> email = $email;
    }
    
    public function getEmail () {
        return $this -> email;
    }

    public function setType(int $type) {
        $this -> type = $type;
    }
    
    public function getType() {
        return $this -> type;
    }

    public function setTel(string $tel) {
        $this -> tel = $tel;
    }

    public function getTel() {
        return $this -> tel;
    }

    public function setId($id) {
        $this -> id = $id;
    }

    public function getId() {
        return $this -> id;
    }
}