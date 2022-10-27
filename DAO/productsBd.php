<?php
include_once "connection.php";
include_once $_SERVER["DOCUMENT_ROOT"]."/project_PI/model/Products.php";


function search_products() {
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


function register_products($prod) {

    try{

        $PDO = connect();

        $sqlReg = " INSERT INTO produtos (nome_produto,preco_produto,quantidade,Modelo_idModelo) Values (?,?,?,?)";

        $stmt = $PDO -> prepare($sqlReg);
        $stmt -> execute([$prod->getName(), $prod->getPrice(), $prod->getAmount(), 2]);

        if($stmt) {
            return true;
        }
        else {
            return false;
        }

    } catch (Exception $e) {

        echo $e->getMessage();
        return false;
    }
}