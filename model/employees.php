<?php

class Employees {
    private $name;
    private $cpf;
    private $email;
    private $type;

    public function setName(string $name) {
        $this -> name = $name;
    }
    
    public function getName() {
        return $this -> name;
    }

    public function setCpf($cpf) {
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

}