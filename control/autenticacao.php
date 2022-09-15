<?php 

include_once "../DAO/usuarioBd.php";
include_once "../model/users.php";



$cpf=$_POST['CpfLog'];
$pass=$_POST['passLog'];;

$user= new Users();
$user->setCpf($cpf);
$user->setPassword($pass);

$result = autenticar($user);

if (count($result)>0) {
    echo json_encode($result);
}

echo json_encode($result);