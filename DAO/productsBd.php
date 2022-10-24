<?php
include_once "connection.php";
include_once "../../model/Products.php";


function buscar_produto(){
    $conexao = connect();

    $stmt = $conexao->prepare("SELECT * FROM produtos");
    $stmt->execute();

    $result = $stmt->fetchAll();
    $resul_produtos = array();

    foreach($result as $registro){
        $produto = new Products();
        $produto->setCodigo($registro["id_produtos"]);
        $produto->setName($registro["nome_produto"]);
        $produto->setAmount($registro["quantidade"]);
        $produto->setPrice($registro["preco_produto"]);

        $resul_produtos[] = $produto;
    }


    return $resul_produtos;
    }