<?php
include_once $_SERVER["DOCUMENT_ROOT"]."/project_PI/DAO/providersBd.php";
include_once $_SERVER["DOCUMENT_ROOT"]."/project_PI/model/Providers.php";

if(isset($_GET['id'])) {

    $id = $_GET['id'];

    $prov = new Providers();

    $prov->setId($id);

    if(delet_provider($prov)) {
        $success = "Excluido com sucesso!";
        header('Location: ../view/dashboard/providersPage.php?successDelete='.$success);
    }
    else {
        $error = "Erro ao excluir!";
        header('Location: ../view/dashboard/providersPage.php?ErrorDelete='.$error);
    }

} else {
    header('Location: ../view/Error404.html');
}
