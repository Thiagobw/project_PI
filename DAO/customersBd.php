<?php
include_once "connection.php";
include_once "../../model/Customers.php";


function search_customers() {
    $connection = connect();

    $stmt = $connection -> prepare("SELECT * FROM cliente");
    $stmt -> execute();

    $result = $stmt -> fetchAll();
    $result_cliente = array();

    foreach($result as $registro) {
        $cliente = new Customers();

        $cliente -> setEmail($registro["email"]);
        $cliente -> setName($registro["nome"]);
        $cliente -> setCpf($registro["CPF"]);

        $resul_cliente[] = $cliente;
    }

    return $result_cliente;
}