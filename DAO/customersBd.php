<?php
include_once "../../DAO/connection.php";
include_once "../../model/Customers.php";


function search_customers() {
    $connection = connect();

    $stmt = $connection -> prepare("SELECT * FROM cliente");
    $stmt -> execute();

    $result = $stmt -> fetchAll();
    $result_cliente = array();

    foreach($result as $registro) {
        $cliente = new Customers();
<<<<<<< HEAD:DAO/customersBd.php
        $cliente->setName($registro["nome"]);
        $cliente->setCpf($registro["CPF"]);
        $cliente->setEmail($registro["email"]);
        
        $result_cliente[] = $cliente;
=======

        $cliente -> setEmail($registro["email"]);
        $cliente -> setName($registro["nome"]);
        $cliente -> setCpf($registro["CPF"]);

        $resul_cliente[] = $cliente;
>>>>>>> cadastro-de-produtos:DAO/custumersBd.php
    }

    return $result_cliente;
}