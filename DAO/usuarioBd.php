<?php

include_once "connection.php";
include_once "../model/users.php";


function autenticar (Users $user) {

    $cpf = $user->getCpf();
    $pass_sent = $user->getPassword();
    
    $conexao = connect();
    
    $stmt = $conexao->prepare("SELECT * FROM usuarios where cpf = :cpf");
    $stmt->bindValue(':cpf', $cpf);
    $stmt->execute();
    $result = $stmt->fetchAll();
    if(count($result)>0){
        $actualPass = $result[0]['senha'];
        if(password_verify($pass_sent, $actualPass)){
            return $result[0];
        } else {
            return false;
        }
    } else {
        return false;
    }


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