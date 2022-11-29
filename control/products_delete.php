<?php
include_once $_SERVER["DOCUMENT_ROOT"]."/project_PI/DAO/productsBd.php";
include_once $_SERVER["DOCUMENT_ROOT"]."/project_PI/model/Products.php";

if(isset($_GET['id'])) {

    $id = $_GET['id'];
    $prod = getProduct($id);
    
    $result_delete = delet_product($prod);

    if($result_delete == true) {
        header('Location: ../view/dashboard/productsPage.php');
    }
    else {
        echo "falha ao deletar";
    }

} else {
    header('Location: ../view/Error404.html');
}
