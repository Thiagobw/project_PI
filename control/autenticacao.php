<?php 

include_once "../DAO/usuarioBd.php";
include_once "../model/users.php";



$cpf=$_POST['CpfLog'];
$pass=$_POST['passLog'];;

$user= new Users();
$user->setCpf($cpf);
$user->setPassword($pass);

$result = autenticar($user);
$resposta = array();
$resposta['status'] = false;
if (count($result)>0) {
    $resposta['status'] = true;
    session_start();
    $_SESSION['autenticado'] = true;
    $_SESSION['usuario'] = $result;
    
} else{
    $resposta['msg'] = "usuario/login invalido";

}

echo json_encode($resposta);