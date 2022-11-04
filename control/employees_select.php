<?php

include_once $_SERVER["DOCUMENT_ROOT"]."/project_PI/DAO/connection.php";
include_once $_SERVER["DOCUMENT_ROOT"]."/project_PI/DAO/employeesBd.php";


$id = $_GET["id"];
$emp = getEmploye($id);
die(var_dump($emp));
$result = array();
$result['cpf'] = $emp->getCpf();
$result['tell'] = $emp->getTel();
$result['nome'] = $emp->getName();
$result['email'] = $emp->getEmail();
$result['id'] = $emp->getId();

echo json_encode($result);