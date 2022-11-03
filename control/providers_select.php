<?php

include_once $_SERVER["DOCUMENT_ROOT"]."/project_PI/DAO/connection.php";
include_once $_SERVER["DOCUMENT_ROOT"]."/project_PI/DAO/providersBd.php";


$id = $_GET["id"];
$prov = getProvider($id);

$result = array();
$result['cpf'] = $customer -> getCpf();
$result['tell'] = $customer -> getTell();
$result['nome'] = $customer -> getName();
$result['email'] = $customer -> getEmail();
$result['id'] = $customer -> getId();

echo json_encode($result);