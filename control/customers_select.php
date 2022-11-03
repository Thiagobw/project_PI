<?php

include_once $_SERVER["DOCUMENT_ROOT"]."/project_PI/DAO/connection.php";
include_once $_SERVER["DOCUMENT_ROOT"]."/project_PI/DAO/customersBd.php";


$id = $_GET["id"];
$customer = getCustomer($id);

$retorno = array();
$retorno['cpf'] = $customer->getCpf();
$retorno['tell'] = $customer->getTell();
$retorno['nome'] = $customer->getName();
$retorno['email'] = $customer->getEmail();
$retorno['id'] = $customer->getId();

echo json_encode($retorno);