<?php

include "../model/Users.php";
include "../DAO/cad.php";
include "../DAO/connection.php";

$name = $_POST['name'];
$cpf = $_POST['cpf'];
$tell = $_POST['tell'];
$email = $_POST['email'];
$password = $_POST['password'];

$Users = new Users();

$Users->setName($name);
$Users->setCpf($cpf);
$Users->setTell($tell);
$Users->setEmail($email);
$Users->setPassword($password);

echo "nome: " . $Users->getName() . ", cpf: " . $Users->getCpf() . ", telefone: " . $Users->getTell() . ", email: " . $Users->getEmail() . ", senha: " . $Users->getPassword();