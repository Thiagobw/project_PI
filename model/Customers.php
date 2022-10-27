<?php

class Customers {
    private $cpf;
    private $tell;
    private $name;
    private $id;
    private $email;

    public function setCpf($cpf) {
        return $this->cpf = $cpf;
    }

    public function getCpf() {
        return $this->cpf;
    }

    public function setTell($tell) {
        return $this->tell = $tell;
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

    public function setId(int $id) {
        return $this->id = $id;
    }

    public function getId() {
        return $this->id;
    }

    public function setEmail($email) {
        return $this->email = $email;
    }
    
    public function getEmail() {
        return $this->email;
    }


}