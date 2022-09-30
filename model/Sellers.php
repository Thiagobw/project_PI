<?php

class Sellers extends Users {
    private $cpf;
    private $tell;

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
}