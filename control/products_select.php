<?php
include_once $_SERVER["DOCUMENT_ROOT"]."/project_PI/DAO/connection.php";
include_once $_SERVER["DOCUMENT_ROOT"]."/project_PI/DAO/productsBd.php";

if(isset($_GET['id'])) {

    $id = $_GET["id"];
    $prod = getProduct($id);
    $result = array();
    $result['nome'] = $prod -> getName();
    $result['preco'] = $prod -> getPrice();
    $result['id'] = $prod -> getId();
    $result['tamanhos'] = $prod -> getSize();

    echo json_encode($result);

} else {
    header('Location: ../view/Error404.html');
}
