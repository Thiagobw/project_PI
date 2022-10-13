<?php

require_once 'Model.php';


class Funcionarios {
    private $name;
    private $cpf;
    private $email;
    private $tipo;

    public function setName(string $name) {
        $this->name = $name;
    }
    public function getName() {
        return $this->name;
    }

    public function setCpf($cpf) {
        $this->cpf = $cpf;
    }
    public function getCpf() {
        return $this->cpf;
    }
    public function setEmail (string $email){
        $this->email = $email;
    }
    public function getEmail (){
        return $this->email;
    }
    public function setTipo(int $tipo){
        $this->tipo = $tipo;
    }
    public function getTipo(){
        return $this->tipo;
    }

}