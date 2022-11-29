<?php

include_once $_SERVER["DOCUMENT_ROOT"]."/project_PI/DAO/connection.php";
include_once $_SERVER["DOCUMENT_ROOT"]."/project_PI/model/Sales.php";


function search_sales() {
    $conexao = connect();

    $stmt = $conexao->prepare("SELECT * FROM pedido");
    $stmt->execute();

    $result = $stmt->fetchAll();
    $result_sales = array();

    foreach($result as $registro) {
        $sale = new Sales();

        $sale->setId($registro["id_pedido"]);
        $sale->setValueOrder($registro["valor_pedido"]);
        $sale->setPaymentMethod($registro["forma_pagamento"]);
        $sale->setDate($registro["data"]);
        $sale->setUserId($registro["usuario_id"]); //get these relactions too
        $sale->setCustomerId($registro["cliente_id"]);
        $sale->setEmployeeId($registro["vendedor_id"]);

        $result_sales[] = $sale;
    }
    return $result_sales;
}
//makes complete implementation likes to your "CRUD" of db thiago!
//others rules you can do it separately or here for each CRUD
function deleteSale($id)
{
    try {
        $PDO = connect();
        try {
            $PDO->beginTransaction();
            $query = "DELETE FROM pedido WHERE id_pedido = ?";
            $stmt = $PDO->prepare($query);
            $stmt->execute([$id->getId()]);
            $PDO->commit();
            return true;
        } catch (Exception $e) {
            $PDO->rollBack();
            echo $e->getMessage();
            return false;
        }
    } catch (Exception $e) {
        $PDO->rollBack();
        echo $e->getMessage();
        return false;
    }
}
function getSale($id) {

    $connection = connect();

    $stmt = $connection -> prepare("SELECT * FROM pedido WHERE id_pedido=?");
    $stmt -> execute([$id]);

    $result = $stmt -> fetchAll();
    foreach($result as $registro) {
        $sale = new Sales();
        $sale->setId($registro["id_pedido"]);
        $sale->setValueOrder($registro["valor_pedido"]);
        $sale->setPaymentMethod($registro["forma_pagamento"]);
        $sale->setDate($registro["data"]);
        $sale->setUserId($registro["usuario_id"]); //get these relactions too
        $sale->setCustomerId($registro["cliente_id"]);
        $sale->setEmployeeId($registro["vendedor_id"]);
    }
    return $sale;
}