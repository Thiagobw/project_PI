<?php 

include_once "../DAO/usuarioBd.php";
include_once "../model/users.php";
$cpf=123;
$password=1234;

$user= new Users();
$user->setCpf($cpf);
$user->setPassword($password);

$result = autenticar($user);

if (count($result)>0) {

}

echo json_encode($result);