<?php

include_once "connection.php";


function autenticar (Users $user){
    $cpf=$user->getCpf();
    $password=$user->getPassword();

    $conexao = connect();
    $stmt = $conexao->prepare("SELECT * FROM usuario where login = :login and senha= :senha");
    $stmt->bindValue(':login', $cpf);
    $stmt->bindValue(':senha', $password);
$stmt->execute();


$result = $stmt->fetchAll();

return $result;

}