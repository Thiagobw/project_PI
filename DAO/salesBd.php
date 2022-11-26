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

        $result_sales[] = $sale;
    }
    return $result_sales;
}