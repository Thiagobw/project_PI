<?php
include_once "connection.php";
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


function register_product($prod) {

    try{
        $PDO = connect();

        try{
            $PDO->beginTransaction();
            $sqlReg = " INSERT INTO produtos (nome_produto,preco_produto) Values (?,?)";
            
            $stmt = $PDO -> prepare($sqlReg);
            $stmt -> execute([$prod->getName(), $prod->getPrice()]);
            
            $id  = $PDO->lastInsertId();

            $PDO->commit();
            if($stmt) {
                return $id ;
            }
            else {
                return false;
            }
        } catch (Exception $e) {
            $PDO->rollback();
            echo $e->getMessage();
            return false;
        }

    } catch (Exception $e) {
        echo $e->getMessage();
        return false;
    }
}


function register_product_size($result_regist_id, $SizeAmountList) {
    try{
        $PDO = connect();

        try{
            $PDO->beginTransaction();
            $sqlRegSize = "INSERT INTO tamanho (tamanho, quantidade, id_produto) values (?,?,?)";
            $stmt = $PDO -> prepare($sqlRegSize);

            foreach ( $SizeAmountList as $list) {
                 $stmt -> execute([$list[0], $list[1], $result_regist_id]);
            }
            $PDO->commit();
            return true;


        } catch (Exception $e) {
            $PDO->rollback();
            echo $e->getMessage();
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

        $sqlDel = "DELETE * FROM produtos WHERE id_produtos=?";

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


function update_product($prod){
    try{

        $PDO = connect();

        $sqlReg = " UPDATE produtos SET nome_produto=?, preco_produto=?, quantidade=? WHERE id_produtos=?";

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


function getProduct($id) {
    $connection = connect();

    $stmt = $connection -> prepare("SELECT * FROM produtos p WHERE p.id_produtos = ?");
    $stmt -> execute([$id]);

    $result = $stmt -> fetchAll();
    die(var_dump($result));
    $prod = new Products();
    foreach($result as $registro) {
        
        $prod -> setId($registro["id_produtos"]);
        $prod -> setName($registro["nome_produto"]);
        $prod -> setPrice($registro["preco_produto"]);
        
        $stmt2 = $connection -> prepare("SELECT * FROM tamanho p WHERE p.id_produto = ?");
        $stmt2 -> execute([$id]);
        $result2 = $stmt -> fetchAll();
        $tam_list = [];
        foreach($result2 as $registro) {
            $tam = $registro['tamanho'];
            $qt = $registro['quantidade'];
            $tam_list[$tam] = $qt;
        }
        $prod->setSize($tam_list);





    }
    return $prod;
}

function delet_tamanho ($tamanho) {

    try {
        $PDO = connect();

        $sqlDel = "DELETE * FROM tamanho WHERE id_tamanho=?";

        $stmt = $PDO -> prepare($sqlDel);
        $stmt -> execute([$tamanho->getId()]);
        
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