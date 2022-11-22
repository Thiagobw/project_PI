<?php

include_once "../DAO/usuarioBd.php";

$cpf = $_POST['cpf'];
$password = $_POST['pass'];

$user= new Users();
$user->setCpf($cpf);
$user->setPassword(password_hash($password, PASSWORD_DEFAULT));

$result = autenticar($user);
$answer = array();
if ($result) {

    $answer['status'] = true;
    session_start();
    $_SESSION['autenticado'] = true;
    $_SESSION['usuario'] = $result;
    
} else{
    
    $answer['msg'] = "usuario/login invalido";

}

echo json_encode($answer);