<?php

include_once $_SERVER["DOCUMENT_ROOT"]."/project_PI/DAO/connection.php";
include_once $_SERVER["DOCUMENT_ROOT"]."/project_PI/DAO/productsBd.php";
include_once $_SERVER["DOCUMENT_ROOT"]."/project_PI/model/Products.php";

if(isset($_POST['submitProduct'])) {

    $name = $_POST['nameProduct'];
    $price = $_POST['priceProduct'];
    $amount = $_POST['amountProviders'];

    $prod = new Products();

    $prod ->setName($name);
    $prod ->setPrice($price);
    $prod ->setAmount($amount);


    $result_regist = register_products($prod);

    if ($result_regist == true) {
        header('Location: ../view/dashboard/productsPage.php');
    }
    else {
        echo "falha ao cadastrar";
    }

} else {
    header('Location: ../view/Error404.html');
}
