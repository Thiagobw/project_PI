<?php 

include_once "../DAO/usuarioBd.php";
include_once "../model/users.php";
$cpf=123;
$pass=1234;

$user= new Users();
$user->setCpf($cpf);
$user->setPassword($pass);

$result = autenticar($user);

if (count($result)>0) {
    return $result;
}

echo json_encode($result);