<?php
include_once "connection.php";
include_once "../../model/Employees.php";


function search_employee() {
    $connection = connect();

    $stmt = $connection -> prepare("SELECT * FROM vendedor");
    $stmt -> execute();

    $result = $stmt->fetchAll();
    $resul_search = array();

    foreach($result as $registro){
        $vendedor = new Employees();

        $vendedor -> setName($registro["nome"]);
        $vendedor -> setCpf($registro["CPF"]);
        $vendedor -> setEmail($registro["email"]);
        $vendedor -> setType($registro['tipo']);

        $resul_search[] = $vendedor;
    }

    return $resul_search;
}


function register_employees($emp) {

    try {

        $PDO = connect();

        $sqlReg = " INSERT INTO vendedor (nome,CPF,email,telefone,tipo) Values (?,?,?,?,?)";

        $stmt = $PDO -> prepare($sqlReg);
        $stmt -> execute([$emp->getName(), $emp->setCpf(), $emp->getEmail(), $emp->getTel(), $emp->getType()]);

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