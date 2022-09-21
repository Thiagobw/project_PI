<?php

include_once "connection.php";
include_once "../model/users.php";


function autenticar (Users $user) {
    $cpf=$user->getCpf();
    $pass=$user->getPassword();


    $conexao = connect();

    $stmt = $conexao->prepare("SELECT * FROM usuarios where cpf = :cpf and senha = :senha");
    $stmt->bindValue(':cpf', $cpf);
    $stmt->bindValue(':senha', $pass);
    $stmt->execute();

    $result = $stmt->fetchAll();

    return $result;
}

 function autenticar_email(Users $user) {
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

//   function autenticar(Users $user){
//       $id_telefone=$user->getid_telefone();

//       $conexao = connect();
//       $stmt = $conexao->prepare("SELECT * FROM telefone where id_telefone = :id_telefone")
//       $stmt-> bindvalue(':id_telefone',$id_telefone);
//       $stmt->execute();

//       $result=$stmt->fetchAll();
//       return $result;
//   }

//    function autenticar(Users $user){
//        $Vendedor_id_vendedor=$user->getVendedor_id_vendedor();

//        $conexao = connect();
//        $stmt=$conexao->prepare("SELECT * FROM telefone where Vendedor_id_vendedor= :Vendedor_id_vendedor");
//        $stmt->bindvalue(':Vendedor_id_vendedor',$Vendedor_id_vendedor);
//        $stmt->execute();

//        $result=$stmt->fetchAll();
//        return $result;
//    }

//    function autenticar (Users $user){
//        $id_produtos=$user->getid_produtos();

//        $conexao=connect();
//        $stmt=$conexao->prepare("SELECT * FROM produtos where id_produtos= :id_produtos");
//        $stmt->bindvalue(':id_produtos',$id_produtos);
//        $stmt->execute();

//        $result=$stmt->fetchAll();
//        return $result;
//    }
//     function autenticar (Users $user){
//         $nome_produto = $user->getnome_produto();

//         $conexao=connect();
//         $stmt=$conexao->prepare("SELECT * FROM produtos where nome_produto= nome_produto");
//         $stmt->bindvalue(':nome_produto', $nome_produto);
//         $stmt-> execute();

//         $result=$stmt->fetchAll();
//         return $result;
//     }