<?php
include_once "connection.php";
include_once $_SERVER["DOCUMENT_ROOT"]."/project_PI/model/Fornecedor.php";


function buscar_fornecedor() {
    $conexao = connect();

    $stmt = $conexao->prepare("SELECT * FROM fornecedor");
    $stmt->execute();

    $result = $stmt->fetchAll();
    $resul_fornecedor = array();

    foreach($result as $registro){
        $fornecedor = new Fornecedor();
        $fornecedor->setId_funcionario($registro["id_funcionario"]);
        $fornecedor->setNome($registro["nome"]);
        $fornecedor->setEmail($registro["email"]);
        $fornecedor->setTelefone($registro["telefone"]);

        $resul_fornecedor[] = $fornecedor;
    }


    return $resul_fornecedor;
}