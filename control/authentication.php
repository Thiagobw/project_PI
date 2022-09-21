<?php 

include_once "../DAO/usuarioBd.php";
include_once "../model/users.php";


$cpf = $_POST['cpf'];
$pass = password_hash($_POST['pass'], PASSWORD_ARGON2I, ['memory_cost' => 2048, 'time_cost' => 4, 'threads' => 3]);

$user= new Users();
$user->setCpf($cpf);
$user->setPassword($pass);

$result = autenticar($user);
$answer = array();
$answer['status'] = false;


if (count($result)>0) {

    $answer['status'] = true;
    session_start();
    $_SESSION['autenticado'] = true;
    $_SESSION['usuario'] = $result;
    
} else{
    
    $answer['msg'] = "usuario/login invalido";

}

echo json_encode($answer);