<?php

include_once $_SERVER["DOCUMENT_ROOT"]."/project_PI/DAO/connection.php";
include_once $_SERVER["DOCUMENT_ROOT"]."/project_PI/DAO/providersBd.php";


$id = $_GET["id"];
$prov = getProvider($id);

$result = array();
$result['id'] = $customer -> getId();
$result['nome'] = $customer -> getName();
$result['cnpj'] = $customer -> getCnpj();
$result['email'] = $customer -> getEmail();
$result['tell'] = $customer -> getTell();

echo json_encode($result);