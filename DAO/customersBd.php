<?php
include_once "connection.php";
include_once $_SERVER["DOCUMENT_ROOT"]."/project_PI/model/Customers.php";


function search_customers() {
    $connection = connect();

    $stmt = $connection -> prepare("SELECT * FROM cliente");
    $stmt -> execute();

    $result = $stmt -> fetchAll();
    $result_cliente = array();

    foreach($result as $registro) {
        $cliente = new Customers();
        $cliente -> setId($registro["id_cliente"]);
        $cliente -> setEmail($registro["email"]);
        $cliente -> setName($registro["nome"]);
        $cliente -> setCpf($registro["CPF"]);

        $result_cliente[] = $cliente;
    }

    return $result_cliente;
}


//registration
function register_customers($cust) {

    try{

        $PDO = connect();

        $sqlReg = " INSERT INTO cliente (nome,CPF,email,telefone) Values (?,?,?,?)";

        $stmt = $PDO -> prepare($sqlReg);
        $stmt -> execute([$cust->getName(), $cust->getCpf(), $cust->getEmail(), $cust->getTell()]);

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

function delet_customers ($cust) {

    try {
        $PDO = connect();

        $sqlDel = "DELETE FROM cliente WHERE id_cliente=?";

        $stmt = $PDO -> prepare($sqlDel);
        $stmt -> execute([$cust->getId()]);
        
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

?>