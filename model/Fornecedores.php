<?php

class Fornecedor {
    private $id_funcionario;
    private $nome;
    private $email;
    private $telefone;

    public function setNome(string $nome) {
        $this -> nome = $nome;
    }
    public function getNome() {
        return $this -> nome;
    }


    public function setId_funcionario(int $id_funcionario) {
        $this -> amount = $id_funcionario;
    }
    public function getId_funcionario() {
        return $this -> id_funcionario;
    }

    
    public function setEmail (string $email) {
        $this-> email = $email;
    }
    public function getEmail () {
        return $this -> email;
    }
    
    public function setTelefone(string $telefone) {
        $this -> telefone = $telefone;
    }
    public function getTelefone() {
        return $this -> telefone;
    }
    
}