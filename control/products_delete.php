<?php
include_once $_SERVER["DOCUMENT_ROOT"]."/project_PI/DAO/productsBd.php";
include_once $_SERVER["DOCUMENT_ROOT"]."/project_PI/model/Products.php";

$id = $_GET['id'];

$prod = new Products();

$prod->setId($id);

$result_delete = delet_product($prod);

if($result_delete == true) {
    header('Location: ../view/dashboard/productsPage.php');
}
else {
    echo "falha ao deletar";
}