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