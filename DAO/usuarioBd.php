<?php

include_once "connection.php";
include_once "../model/users.php";


function autenticar (Users $user) {

    $cpf = $user->getCpf();
    $senha = $user->getPassword();

    $conexao = connect();

    $stmt = $conexao->prepare("SELECT * FROM usuarios where cpf = :cpf and senha = :senha");
    $stmt->bindValue(':cpf', $cpf);
    $stmt->bindValue(':senha', $senha);
    $stmt->execute();
    die(var_dump($cpf, $senha));
    $result = $stmt->fetchAll();

    return $result;

}

 function autenticar_email(Users $user){
    $email=$user->getEmail();

    $conexao = connect();

    $stmt = $conexao->prepare("SELECT * FROM usuarios where email = :email");
    $stmt->bindValue(':email', $email);
    $stmt->execute();

    $result = $stmt->fetchAll();

    return $result;
 }

 function autenticar_cpf(Users $user){
    $cpf=$user->getCpf();

    $conexao = connect();

    $stmt = $conexao->prepare("SELECT * FROM usuarios where cpf = :cpf");
    $stmt->bindValue(':cpf', $cpf);
    $stmt->execute();

    $result = $stmt->fetchAll();

    return $result;
}