<?php
include_once "connection.php";
include_once $_SERVER["DOCUMENT_ROOT"]."/project_PI/model/Employees.php";


function search_employee() {
    $connection = connect();

    $stmt = $connection -> prepare("SELECT * FROM vendedor");
    $stmt -> execute();

    $result = $stmt->fetchAll();
    $resul_search = array();

    foreach($result as $registro){
        $vendedor = new Employees();

        $vendedor ->setId($registro['id_vendedor']);
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
        $stmt -> execute([$emp->getName(), $emp->getCpf(), $emp->getEmail(), $emp->getTel(), $emp->getType()]);

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


function delet_employees($emp) {

    try {
        $PDO = connect();

        $sqlDel = "DELETE FROM vendedor WHERE id_vendedor=?";

        $stmt = $PDO -> prepare($sqlDel);
        $stmt -> execute([$emp->getId]);
        
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