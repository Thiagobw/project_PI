<?php
include_once $_SERVER["DOCUMENT_ROOT"]."/project_PI/DAO/productsBd.php";
include_once $_SERVER["DOCUMENT_ROOT"]."/project_PI/model/Products.php";

if(isset($_GET['id'])) {

    $id = $_GET['id'];
    $prod = getProduct($id);

    if(delet_product($prod)) {
        $success = "Produto Excluido com sucesso!";
        header('Location: ../view/dashboard/productsPage.php?successDelete='.$success);
    }
    else {
        $error = "Erro ao Excluir!";
        header('Location: ../view/dashboard/productsPage.php?errorDelete='.$error);
    }

} else {
    header('Location: ../view/Error404.html');
}
