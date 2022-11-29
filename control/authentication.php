<?php
include_once $_SERVER["DOCUMENT_ROOT"]."/project_PI/DAO/usuarioBd.php";

$cpf = $_POST['cpf'];
$password = $_POST['pass'];

$user= new Users();
$user->setCpf($cpf);
$user->setPassword($password);

$result = autenticar($user);
$answer = array();

if (count($result)>0) {

    $answer['status'] = true;
    session_start();
    $_SESSION['autenticado'] = true;
    $_SESSION['usuario'] = $result;
    
} else{
    
    $answer['msg'] = "usuario/login invalido";

}

echo json_encode($answer);