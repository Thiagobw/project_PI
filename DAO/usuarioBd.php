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
return $result;

}

 function autenticar (User $user){
     $numero=$user->getnumero();

     $conexao=connect();
     $stmt = $conexao->prepare("SELECT * FROM telefone where numero = :numero");
     $stmt->bindvalue(':numero', $numero);
$stmt->execute();

$result = $stmt->fetchAll();
return $result;
 }

 function autenticar (Users $user){
     $Cliente_id_cliente=$user->getCliente_id_cliente();

     $conexao = connect();
     $stmt = $conexao->prepare("SELECT * FROM telefone where Cliente_id_cliente= :Cliente_id_cliente")
     $stmt->bindvalue(':Cliente_id_cliente', $Cliente_id_cliente);
     $stmt->execute();

     $result=$stmt->fetchAll();
     return $result;
 }

  function autenticar(Users $user){
      $id_telefone=$user->getid_telefone();

      $conexao = connect();
      $stmt = $conexao->prepare("SELECT * FROM telefone where id_telefone = :id_telefone")
      $stmt-> bindvalue(':id_telefone',$id_telefone);
      $stmt->execute();

      $result=$stmt->fetchAll();
      return $result;
  }

   function autenticar(Users $user){
       $Vendedor_id_vendedor=$user->getVendedor_id_vendedor();

       $conexao = connect();
       $stmt=$conexao->prepare("SELECT * FROM telefone where Vendedor_id_vendedor= :Vendedor_id_vendedor");
       $stmt->bindvalue(':Vendedor_id_vendedor',$Vendedor_id_vendedor);
       $stmt->execute();

       $result=$stmt->fetchAll();
       return $result;
   }

   function autenticar (Users $user){
       $id_produtos=$user->getid_produtos();

       $conexao=connect();
       $stmt=$conexao->prepare("SELECT * FROM produtos where id_produtos= :id_produtos");
       $stmt->bindvalue(':id_produtos',$id_produtos);
       $stmt->execute();

       $result=$stmt->fetchAll();
       return $result;
   }
    function autenticar (Users $user){
        $nome_produto = $user->getnome_produto();

        $conexao=connect();
        $stmt=$conexao->prepare("SELECT * FROM produtos where nome_produto= nome_produto");
        $stmt->bindvalue(':nome_produto', $nome_produto);
        $stmt-> execute();

        $result=$stmt->fetchAll();
        return $result;
    }