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


function find_products_names($id){
    $conexao = connect();
    $stmt = $conexao->prepare("SELECT nome_produto FROM produtos WHERE id_produtos = :id");
    $stmt->bindValue(':id', $id);
    $stmt->execute();
    return $stmt->fetch();
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


function register_product_size($id, $SizeAmountList) {
    try{
        $PDO = connect();

        try{
            $PDO->beginTransaction();
            $sqlRegSize = "INSERT INTO tamanho (tamanho, quantidade, id_produto) values (?,?,?)";
            $stmt = $PDO -> prepare($sqlRegSize);

            foreach ( $SizeAmountList as $list) {
                 $stmt -> execute([$list[0], $list[1], $id]);
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


function delet_product ($prod): bool
 {

    try {
        $PDO = connect();


        $sqlDel = "DELETE FROM tamanho WHERE id_produto=?";

        $stmt = $PDO -> prepare($sqlDel);
        $stmt -> execute([$prod->getId()]);

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

function seeSizeAvaliable($id): array
{
    //this not same getProduct because his get relaction with tamanho table
    $conexao = connect();
    $stmt = $conexao->prepare("SELECT tamanho, id_tamanho, quantidade FROM tamanho WHERE id_produto = :id");
    $stmt->bindValue(':id', $id);
    $stmt->execute();
    return $stmt->fetchAll();
}
function update_product($prod): bool
{
    try{

        $PDO = connect();

        $stmt = $PDO -> prepare("UPDATE produtos SET nome_produto=?, preco_produto=? WHERE id_produtos=?");
        $stmt -> execute([$prod->getName(), $prod->getPrice(), $prod->getId()]);
    
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


function getProduct($id): Products
{
    $connection = connect();

    $stmt = $connection -> prepare("SELECT * FROM produtos p WHERE p.id_produtos = ?");
    $stmt -> execute([$id]);

    $result = $stmt -> fetchAll();
    $prod = new Products();
    foreach($result as $registro) {
        
        $prod -> setId($registro["id_produtos"]);
        $prod -> setName($registro["nome_produto"]);
        $prod -> setPrice($registro["preco_produto"]);
        
        $stmt2 = $connection -> prepare("SELECT * FROM tamanho p WHERE p.id_produto = ?");
        $stmt2 -> execute([$id]);
        $result2 = $stmt2 -> fetchAll();
        $listSize = [];
        foreach($result2 as $registro) {
            $tam = $registro['tamanho'];
            $qt = $registro['quantidade'];
            $id_tam = $registro['id_tamanho'];
            $listSize[$tam] = $qt;
        }
        $prod->setSize($listSize);

    }
    return $prod;
}


function selectProductToChange($id) {
    try{
        $PDO = connect();

        $stmt = $PDO -> prepare("SELECT * FROM produtos WHERE id_produtos = ?");
        $stmt -> execute([$id]);
        $result = $stmt -> fetchAll();
        
        $prod = new Products();
        
        foreach($result as $registro) {
            $prod -> setId($registro["id_produtos"]);
            $prod -> setName($registro["nome_produto"]);
            $prod -> setPrice($registro["preco_produto"]);
            
            $stmt2 = $PDO -> prepare("SELECT * FROM tamanho p WHERE p.id_produto = ?");
            $stmt2 -> execute([$id]);
            $result2 = $stmt2 -> fetchAll();
            $listSize = array();
            
            foreach($result2 as $registro) {
                $sizeProduct = $registro['tamanho'];
                $amountProduct = $registro['quantidade'];
                $object = new stdClass();
                $object->size = $sizeProduct;
                $object->amount = $amountProduct;
                
                array_push($listSize, $object);
            }
            $prod->setSize($listSize);
        }
        return $prod;
    } catch (Exception $e) {
        echo $e->getMessage();
        return false;
    }
}


function delet_product_sizes ($id) {
    try {
        $PDO = connect();

        $stmt = $PDO -> prepare("DELETE FROM tamanho WHERE id_produto=?");
        $stmt -> execute([$id]);
        
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