<?php
include_once $_SERVER["DOCUMENT_ROOT"]."/project_PI/DAO/connection.php";
include_once $_SERVER["DOCUMENT_ROOT"]."/project_PI/DAO/productsBd.php";

if(isset($_GET['id'])) {

    $id = $_GET["id"];
    $prod = selectProductToChange($id);
    $result = array();
    $result['name'] = $prod -> getName();
    $result['price'] = $prod -> getPrice();
    $result['id'] = $prod -> getId();
    $result['sizes'] = $prod -> getSize();

    echo json_encode($result);

} else {
    header('Location: ../view/Error404.html');
}
