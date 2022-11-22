<?php
include_once "../model/Cart.php";
include_once "../model/users.php";
include_once "../model/Products.php";
include_once "../DAO/productsBd.php";
include_once "connection.php";
function seeCartItems($user)
{
    $conexao = connect();

    $stmt = $conexao->prepare("SELECT * FROM pedido_produto WHERE usuario_id = :id");
    $stmt->bindValue(':id', $user);
    $stmt->execute();
    $result = $stmt->fetchAll();
    foreach ($result as $registro) {
        $cart = new Cart();

        $cart->setId($registro["idPedido_Produto"]);
        $cart->setTamanho($registro["tamanho"]);
        $cart->setValor($registro["valor"]);
        $cart->setQuantidade($registro["quantidade"]);
        $cart->setProdutosId($registro['Produtos_idProdutos']);

        $resul_cart[] = $cart;
    }
    return $resul_cart;
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
