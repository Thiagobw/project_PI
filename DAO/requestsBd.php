<?php
include_once "../model/Cart.php";
include_once "../model/users.php";
include_once "../model/Products.php";
include_once "productsBd.php";
include_once "cartBd.php";
include_once "usuarioBd.php";
include_once "connection.php";

// Parameters is good way to corretly do something without error or mistakes
// This is an example!
function makeOrder(
    $user_id,
    string $payment_method,
    int $subtotal,
    int $employe_id,
    int $customer_id,
    ?string $address = '',
    ?int $address_cep = 0,
    ?int $address_number = 0,
    ?string $address_complement = '' ): bool //here i'm using the total funcionality of PSR to turn code more understoodable'
//You can remove all references of var. behide of them
{
    $dataTime = date('d/m/Y-H:i:s');
    $cart = seeCartItems($user_id);
    //this only verify the method but we can make response API verify to conclude action, UPDATE: and verify the address be set
    if(is_string($payment_method) && empty($address)){
        try{
            $PDO = connect();
            $PDO->beginTransaction();
            $queryPedido = "INSERT INTO pedido 
            (valor_pedido, forma_pagamento, data, usuario_id, vendedor_id, cliente_id) 
            VALUES (?,         ?,            ?,        ?,         ?,           ?)";
            $stmt = $PDO->prepare($queryPedido);
            $stmt->execute([
                $subtotal,
                $payment_method,
                $dataTime,
                $user_id,
                $employe_id,
                $customer_id]);
            $id = $PDO->lastInsertId();
            try{
                //loop for make stock update after valid buy
                foreach($cart as $item){
                    $queryPedidoProduto = "UPDATE pedido_produto SET Pedido_id = ? WHERE idPedido_Produto = ?";
                    $stmt = $PDO->prepare($queryPedidoProduto);
                    $stmt->execute([$id, $item->getId()]);
                    $queryTamanhoQuantidade = "UPDATE tamanho SET quantidade = quantidade - ? WHERE tamanho = ? and id_produto = ?";
                    $stmt = $PDO->prepare($queryTamanhoQuantidade);
                    //using the object to referece query
                    $stmt->execute([$item->getQuantidade(), $item->getTamanho(), $item->getProdutosId()]);
                    $queryRemoveItem = "DELETE FROM pedido_produto WHERE idPedido_Produto = ?";
                    $stmt = $PDO->prepare($queryRemoveItem);
                    $stmt->execute([$item->getId()]);
                }
            }catch (Exception $e){
                $PDO->rollBack();
                echo $e->getMessage();
            }
        }catch (Exception $e){
            $PDO->rollBack();
            echo $e->getMessage();
        }
        $PDO->commit();
        return true;
    }elseif(is_string($payment_method) && !empty($address)) {
        try{
            $PDO = connect();
            $PDO->beginTransaction();
            $queryPedido = "INSERT INTO pedido 
            (valor_pedido, forma_pagamento, data, usuario_id, vendedor_id, cliente_id, endereco, endereco_numero, endereco_cep, complemento) 
            VALUES (?,         ?,            ?,        ?,         ?,           ?,         ?,          ?,               ?,           ?)";
            $stmt = $PDO->prepare($queryPedido);
            $stmt->execute([
                $subtotal,
                $payment_method,
                $dataTime,
                $user_id,
                $employe_id,
                $customer_id,
                $address,
                $address_number,
                $address_cep,
                $address_complement,
            ]);
            $id = $PDO->lastInsertId();
            try{
                //loop for make stock update after valid buy
                foreach($cart as $item){
                    $queryPedidoProduto = "UPDATE pedido_produto SET Pedido_id = ? WHERE idPedido_Produto = ?";
                    $stmt = $PDO->prepare($queryPedidoProduto);
                    $stmt->execute([$id, $item->getId()]);
                    $queryTamanhoQuantidade = "UPDATE tamanho SET quantidade = quantidade - ? WHERE tamanho = ? and id_produto = ?";
                    $stmt = $PDO->prepare($queryTamanhoQuantidade);
                    //using the object to referece query
                    $stmt->execute([$item->getQuantidade(), $item->getTamanho(), $item->getProdutosId()]);
                    $queryRemoveItem = "DELETE FROM pedido_produto WHERE idPedido_Produto = ?";
                    $stmt = $PDO->prepare($queryRemoveItem);
                    $stmt->execute([$item->getId()]);
                }
            }catch (Exception $e){
                $PDO->rollBack();
                echo $e->getMessage();
            }
        }catch (Exception $e){
            $PDO->rollBack();
            echo $e->getMessage();
        }
        $PDO->commit();
        return true;
    }else{
        return false;
    }
}


?>