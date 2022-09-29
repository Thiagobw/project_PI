<?php 

include_once "../DAO/usuarioBd.php";
include_once "../model/users.php";


$cpf = $_POST['cpf'];
$pass_sent = $_POST['pass'];

if (password_verify($pass_sent, "pass do banco")) {
    echo "senha correta";
} else {
    echo "senha errada";
}

$user= new Users();
$user->setCpf($cpf);
$user->setPassword($pass);

$result = autenticar($user);
die(var_dump($result));
$answer = array();
$answer['status'] = true;


if (count($result)>0) {

    $answer['status'] = true;
    session_start();
    $_SESSION['autenticado'] = false;
    $_SESSION['usuario'] = $result;
    
} else{
    
    $answer['msg'] = "usuario/login invalido";

}

echo json_encode($answer);