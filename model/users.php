<?php

class Users {
    
    private $name;
    private $cpf;
    private $tell;
    private $email;
    private $password;

    public function setName($name) {
        return $this->name = $name;
    }

    public function getName() {
        return $this->name;
    }

    public function setEmail($email) {
        return $this->email = $email;
    }

    public function getEmail() {
        return $this->email;
    }

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

    public function setPassword($password) {
        return $this->password = $password;
    }

    public function getPassword() {
        return $this->password;
    }
}