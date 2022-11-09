<?php

include_once $_SERVER["DOCUMENT_ROOT"]."/project_PI/DAO/connection.php";
include_once $_SERVER["DOCUMENT_ROOT"]."/project_PI/DAO/providersBd.php";
include_once $_SERVER["DOCUMENT_ROOT"]."/project_PI/model/Providers.php";

if(isset($_POST['submitChangeProviders'])) {

    $id = $_POST['idProviderChange'];
    $name = $_POST['changeNameProviders'];
    $cnpj = $_POST['changeCnpjProviders'];
    $email = $_POST['changeEmailProviders'];
    $tel = $_POST['changeTellProviders'];
    
    $prov = new Providers();
    
    $prov ->setId($id);
    $prov ->setName($name);
    $prov ->setCnpj($cnpj);
    $prov ->setEmail($email);
    $prov ->setTell($tel);
    
    $result_update = update_provider($prov);
    
    if ($result_update == true) {
        header('Location: ../view/dashboard/providersPage.php');
    }
    else {
        echo "falha ao atualizar dados";
    }

} else {
    header('Location: ../view/Error404.html');
}
