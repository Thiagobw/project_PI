<?php
include_once $_SERVER["DOCUMENT_ROOT"]."/project_PI/DAO/connection.php";
include_once $_SERVER["DOCUMENT_ROOT"]."/project_PI/DAO/productsBd.php";


$id = $_GET["id"];
$prod = getProduct($id);

$result = array();
$result['nome'] = $prod -> getName();
$result['quantidade'] = $prod -> getAmount();
$result['preco'] = $prod -> getPrice();
$result['id'] = $prod -> getId();

echo json_encode($result);