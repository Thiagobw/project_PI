<?php

include_once "connection.php";


function autenticar (Users $user){
    $cpf=$user->getCpf();
    $password=$user->getPassword();

    $conexao = connect();
    $stmt = $conexao->prepare("SELECT * FROM vendedor where CPF = :CPF and senha= :senha");
    $stmt->bindValue(':CPF', $cpf);
    $stmt->bindValue(':senha', $password);
$stmt->execute();


$result = $stmt->fetchAll();
print_r($result);

}