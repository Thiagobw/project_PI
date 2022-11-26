<?php

include_once $_SERVER["DOCUMENT_ROOT"]."/project_PI/DAO/connection.php";
include_once $_SERVER["DOCUMENT_ROOT"]."/project_PI/model/Products.php";


function search_products() {
    $conexao = connect();

    $stmt = $conexao->prepare("SELECT * FROM produtos");
    $stmt->execute();

    $result = $stmt->fetchAll();
    $resul_produtos = array();

    foreach($result as $registro) {
        $produto = new Products();

        $produto->setId($registro["id_produtos"]);
        $produto->setName($registro["nome_produto"]);
        $produto->setPrice($registro["preco_produto"]);

        $resul_produtos[] = $produto;
    }
    return $resul_produtos;
}