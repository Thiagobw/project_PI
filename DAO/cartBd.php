<?php
include_once "../model/Cart.php";
include_once "../model/users.php";
include_once "../model/Products.php";
include_once "../DAO/productsBd.php";
include_once "connection.php";


function seeCartItems($user): array
{
    $conexao = connect();

    $stmt = $conexao->prepare("SELECT * FROM pedido_produto WHERE usuario_id = :id");
    $stmt->bindValue(':id', $user);
    $stmt->execute();
    $result = $stmt->fetchAll();
    //verifyng returns anything for make loop
    if (!empty($result)) {
        foreach ($result as $registro) {
            $cart = new Cart();

            $cart->setId($registro["idPedido_Produto"]);
            $cart->setTamanho($registro["tamanho"]);
            $cart->setValor($registro["valor"]);
            $cart->setQuantidade($registro["quantidade"]);
            $cart->setProdutosId($registro['Produtos_idProdutos']);

            $result_cart[] = $cart;
        }
        //create empty array! this function need return array declared on side of param ": array"
    } else {
        $result_cart = array();
    }
    return $result_cart;
}


function seeOneCartItems($id): Cart
{
    $conexao = connect();

    $stmt = $conexao->prepare("SELECT * FROM pedido_produto WHERE idPedido_Produto = ?");
    $stmt->execute([$id]);
    $results = $stmt->fetch();
    if (!empty($results)) {
        foreach ($results as $result){
            $cart = new Cart();
        
            $cart->setId($result["idPedido_Produto"]);
            $cart->setTamanho($result["tamanho"]);
            $cart->setValor($result["valor"]);
            $cart->setQuantidade($result["quantidade"]);
            $cart->setProdutosId($result['Produtos_idProdutos']);
        }
        //create empty array! this function need return array declared on side of param ": array"
    } else {
        $cart = new Cart();
    }
    return $cart;
}


function addToCart($prod, $user, $quantity, $sizes)
{
    try {
        $PDO = connect();

        try {
            $price = getProduct($prod)->getPrice();
            $PDO->beginTransaction();
            foreach ($sizes as $size) {
                $sqlReg = "INSERT INTO pedido_produto (tamanho, quantidade, valor, Produtos_idProdutos, usuario_id) VALUES (?,?,?,?,?)";

                $stmt = $PDO->prepare($sqlReg);
                $stmt->execute([
                    $size,
                    $quantity,
                    $price,
                    $prod,
                    $user,
                ]);
                $id = $PDO->lastInsertId();
            }
            $PDO->commit();
            if ($stmt) {
                return $id;
            } else {
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


function deleteItemCart($id)
{
    try {
        $PDO = connect();

        try {
            $PDO->beginTransaction();
            $sqlReg = "DELETE FROM pedido_produto WHERE idPedido_Produto = :id";

            $stmt = $PDO->prepare($sqlReg);
            $stmt->bindValue(':id', $id);
            $stmt->execute();
            $id = $PDO->lastInsertId();
            $PDO->commit();
            if ($stmt) {
                return $id;
            } else {
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


function updateCartItemQuantity($id, $operator)
{
    try {
        $PDO = connect();

        try {
            $PDO->beginTransaction();
            $sqlReg = "UPDATE pedido_produto SET quantidade = quantidade " . $operator . " 1  WHERE idPedido_Produto = :id";
            $stmt = $PDO->prepare($sqlReg);
            $stmt->bindValue(':id', $id);
            $stmt->execute();
            $id = $PDO->lastInsertId();
            $PDO->commit();
            if ($stmt) {
                return $id;
            } else {
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
