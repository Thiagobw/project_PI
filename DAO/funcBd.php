<?php
include_once "../../DAO/connection.php";
include_once "../../model/Funcionarios.php";


function buscar_func() {
    $conexao = connect();

    $stmt = $conexao->prepare("SELECT * FROM vendedor");
    $stmt -> execute();

    $result = $stmt->fetchAll();
    $resul_func = array();

    foreach($result as $registro){
        $vendedor = new Funcionarios();

        $vendedor -> setName($registro["nome"]);
        $vendedor -> setCpf($registro["CPF"]);
        $vendedor -> setEmail($registro["email"]);
        $vendedor -> setTipo($registro['tipo']);

        $resul_func[] = $vendedor;
    }

    return $resul_func;
}