<?php

include_once $_SERVER["DOCUMENT_ROOT"]."/project_PI/DAO/connection.php";
include_once $_SERVER["DOCUMENT_ROOT"]."/project_PI/DAO/productsBd.php";
include_once $_SERVER["DOCUMENT_ROOT"]."/project_PI/model/Products.php";

$id = $_POST['idProductChange'];
$name = $_POST['changeNameProduct'];
$price = $_POST['changePriceProduct'];
$amount = $_POST['changeAmountProviders'];

$prod = new Products();

$prod ->setId($id);
$prod ->setName($name);
$prod ->setPrice($price);
$prod ->setAmount($amount);


$result_update = update_product($prod);

if ($result_update == true) {
    header('Location: ../view/dashboard/productsPage.php');
}
else {
    echo "falha ao falha ao atualizar dados";
}