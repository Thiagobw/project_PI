<?php
include_once "connection.php";
include_once $_SERVER["DOCUMENT_ROOT"]."/project_PI/model/Providers.php";

function search_provider () {
    $connection = connect();

    $stmt = $connection -> prepare("SELECT * FROM fornecedor");
    $stmt -> execute();

    $result = $stmt->fetchAll();
    $resul_search = array();

    foreach($result as $registro){
        $prov = new Providers();

        $prov -> setName($registro['nome']);
        $prov -> setCnpj($registro['cnpj']);
        $prov -> setEmail($registro['email']);
        $prov -> setTell($registro['telefone']);

        $resul_search[] = $prov;
    }

    return $resul_search;
}


function register_providers($prov) {

    try{

        $PDO = connect();

        $sqlReg = " INSERT INTO fornecedor (nome,cnpj,email,telefone) Values (?,?,?,?)";

        $stmt = $PDO -> prepare($sqlReg);
        $stmt -> execute([$prov->getName(), $prov->getCnpj(), $prov->getEmail(), $prov->getTell()]);

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


function delet_provider($prov) {

    try {
        $PDO = connect();

        $sqlDel = "DELETE FROM produtos WHERE id_produtos=?";

        $stmt = $PDO -> prepare($sqlDel);
        $stmt -> execute([$prov->getId()]);
        
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


function getProvider($id) {
    $connection = connect();

    $stmt = $connection -> prepare("SELECT * FROM fornecedor WHERE id_fornecedor=?");
    $stmt -> execute([$id]);

    $result = $stmt -> fetchAll();
    $result_cliente = array();
    $cust = new Customers();
    foreach($result as $registro) {
        
        $cust -> setId($registro["id_fornecedor"]);
        $cust -> setEmail($registro["email"]);
        $cust -> setName($registro["nome"]);
        $cust -> setCpf($registro["CPF"]);

        
    }
    return $cust;
}