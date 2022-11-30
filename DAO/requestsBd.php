<?php
include_once $_SERVER["DOCUMENT_ROOT"]."/project_PI/model/Cart.php";
include_once $_SERVER["DOCUMENT_ROOT"]."/project_PI/model/users.php";
include_once $_SERVER["DOCUMENT_ROOT"]."/project_PI/model/Products.php";
include_once $_SERVER["DOCUMENT_ROOT"]."/project_PI/DAO/productsBd.php";
include_once $_SERVER["DOCUMENT_ROOT"]."/project_PI/DAO/cartBd.php";
include_once $_SERVER["DOCUMENT_ROOT"]."/project_PI/DAO/usuarioBd.php";
include_once $_SERVER["DOCUMENT_ROOT"]."/project_PI/DAO/connection.php";

// Parameters is good way to corretly do something without error or mistakes
// This is an example!
function makeOrder( $user_id, string $payment_method, int $subtotal, int $employe_id, int $customer_id, ?string $address = '',
                    ?int $address_cep = 0, ?int $address_number = 0, ?string $address_complement = '' ): bool //here i'm using the total funcionality of PSR to turn code more understoodable'
//You can remove all references of var. behide of them
{

    $dataTime = date('d/m/Y-H:i:s');
    $cart = seeCartItems($user_id);
    //this only verify the method but we can make response API verify to conclude action, UPDATE: and verify the address be set
    if(is_string($payment_method) && empty($address)) {

        try {

            $PDO = connect();
            $PDO->beginTransaction();

            $stmt = $PDO->prepare("INSERT INTO pedido (valor_pedido, forma_pagamento, data, usuario_id, vendedor_id, cliente_id) 
                            VALUES (?,         ?,            ?,        ?,         ?,           ?)");
            $stmt->execute([ $subtotal, $payment_method, $dataTime, $user_id, $employe_id, $customer_id]);
            $id = $PDO->lastInsertId();


            try{
                //loop for make stock update after valid buy
                foreach($cart as $item) {

                    $stmt = $PDO->prepare("UPDATE pedido_produto SET Pedido_id = ? WHERE idPedido_Produto = ?");
                    $stmt->execute([$id, $item->getId()]);


                    $stmt = $PDO->prepare("UPDATE tamanho SET quantidade = quantidade - ? WHERE tamanho = ? and id_produto = ?");
                    $stmt->execute([$item->getQuantidade(), $item->getTamanho(), $item->getProdutosId()]);


                    $stmt = $PDO->prepare("DELETE FROM pedido_produto WHERE idPedido_Produto = ?");
                    $stmt->execute([$item->getId()]);
                }

            }catch (Exception $e) {

                $PDO->rollBack();
                echo $e->getMessage();
            }
        }catch (Exception $e) {

            $PDO->rollBack();
            echo $e->getMessage();
        }

        $PDO->commit();
        return true;
    }
    elseif(is_string($payment_method) && !empty($address)) {

        try {

            $PDO = connect();
            $PDO->beginTransaction();

            $stmt = $PDO->prepare("INSERT INTO pedido (valor_pedido, forma_pagamento, data, usuario_id, vendedor_id, cliente_id, endereco, endereco_numero, endereco_cep, complemento) 
                        VALUES (?,              ?,             ?,       ?,         ?,           ?,         ?,           ?,              ?,          ?)");
            $stmt->execute([ $subtotal, $payment_method, $dataTime, $user_id, $employe_id, $customer_id, $address, $address_number, $address_cep, $address_complement]);
            
            $id = $PDO->lastInsertId();

            try {

                //loop for make stock update after valid buy
                foreach($cart as $item) {

                    $stmt = $PDO->prepare("UPDATE pedido_produto SET Pedido_id = ? WHERE idPedido_Produto = ?");
                    $stmt->execute([$id, $item->getId()]);


                    $stmt = $PDO->prepare("UPDATE tamanho SET quantidade = quantidade - ? WHERE tamanho = ? and id_produto = ?");
                    $stmt->execute([$item->getQuantidade(), $item->getTamanho(), $item->getProdutosId()]);


                    $stmt = $PDO->prepare("DELETE FROM pedido_produto WHERE idPedido_Produto = ?");
                    $stmt->execute([$item->getId()]);
                }

            }catch (Exception $e) {

                $PDO->rollBack();
                echo $e->getMessage();
            }
        }catch (Exception $e) {

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