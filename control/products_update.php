<?php

include_once $_SERVER["DOCUMENT_ROOT"]."/project_PI/DAO/connection.php";
include_once $_SERVER["DOCUMENT_ROOT"]."/project_PI/DAO/productsBd.php";
include_once $_SERVER["DOCUMENT_ROOT"]."/project_PI/model/Products.php";

$id = $_POST[''];
$name = $_POST[''];
$price = $_POST[''];
$amount = $_POST[''];


$prod = new Products();

$prod ->setId($id);
$prod ->setName($name);
$prod ->setPrice($price);
$prod ->setAmount($amount);


$result_regist = update_product($prod);

if ($result_regist == true) {
    header('Location: ../view/dashboard/productsPage.php');
}
else {
    echo "falha ao cadastrar";
}