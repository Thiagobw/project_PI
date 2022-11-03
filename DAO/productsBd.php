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

        $produto->setId($registro["id_produtos"]);
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
function delet_product ($prod) {

    try {
        $PDO = connect();

        $sqlDel = "DELETE FROM produtos WHERE id_produtos=?";

        $stmt = $PDO -> prepare($sqlDel);
        $stmt -> execute([$prod->getId()]);
        
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


function getProduct($id) {
    $connection = connect();

    $stmt = $connection -> prepare("SELECT * FROM produtos WHERE id_produtos=?");
    $stmt -> execute([$id]);

    $result = $stmt -> fetchAll();
    $result_prod = array();
    $prod = new Products();
    foreach($result as $registro) {
        
        $prod -> setId($registro["id_produtos"]);
        $prod -> setName($registro["nome_produto"]);
        $prod -> setPrice($registro["preco_produto"]);
        $prod ->setAmount($registro['quantidade']);

        
    }
    return $prod;
}

function update_product($prod){
    try{

        $PDO = connect();

        $sqlReg = " UPDATE produtos SET nome_produto=?, preco_produto=?, quantidade=?, WHERE id_fornecedor = ?";

        $stmt = $PDO -> prepare($sqlReg);
        $stmt -> execute([$prod->getName(), $prod->getPrice(), $prod->getAmount(), $prod->getId()]);
       
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