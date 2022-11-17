<?php
include_once $_SERVER["DOCUMENT_ROOT"]."/project_PI/DAO/productsBd.php";
include_once $_SERVER["DOCUMENT_ROOT"]."/project_PI/model/Products.php";

if(isset($_GET['id'])) {

    $id = $_GET['id'];

    $prov = new Products();

    $prov->setId($id);

    $result_delete = delet_products($prov);

    if($result_delete == true) {
        header('Location: ../view/dashboard/productsPage.php');
    }
    else {
        echo "falha ao deletar";
    }

} else {
    header('Location: ../view/Error404.html');
}