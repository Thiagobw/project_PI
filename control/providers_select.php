<?php

include_once $_SERVER["DOCUMENT_ROOT"]."/project_PI/DAO/connection.php";
include_once $_SERVER["DOCUMENT_ROOT"]."/project_PI/DAO/providersBd.php";


$id = $_GET["id"];
$prov = getProvider($id);

$result = array();
$result['id'] = $prov -> getId();
$result['nome'] = $prov -> getName();
$result['cnpj'] = $prov -> getCnpj();
$result['email'] = $prov -> getEmail();
$result['tell'] = $prov -> getTell();

echo json_encode($result);