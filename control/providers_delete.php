<?php
include_once $_SERVER["DOCUMENT_ROOT"]."/project_PI/DAO/providersBd.php";
include_once $_SERVER["DOCUMENT_ROOT"]."/project_PI/model/Providers.php";

$id = $_GET['id'];

$prov = new Providers();

$prov -> setId($id);

$result_delete = delet_provider($prov);

if($result_delete == true) {
    header('Location: ../view/dashboard/productsPage.php');
}
else {
    echo "falha ao deletar";
}