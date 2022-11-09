<?php

include_once $_SERVER["DOCUMENT_ROOT"]."/project_PI/DAO/connection.php";
include_once $_SERVER["DOCUMENT_ROOT"]."/project_PI/DAO/providersBd.php";
include_once $_SERVER["DOCUMENT_ROOT"]."/project_PI/model/Providers.php";

if(isset($_POST['submitProviders'])) {

    $name = $_POST['nameProviders'];
    $cnpj = $_POST['cnpjProviders'];
    $email = $_POST['emailProviders'];
    $tel = $_POST['tellProviders'];

    $prov = new Providers();

    $prov ->setName($name);
    $prov ->setCnpj($cnpj);
    $prov ->setEmail($email);
    $prov ->setTell($tel);

    $result_regist = register_providers($prov);

    if ($result_regist == true) {
        header('Location: ../view/dashboard/providersPage.php');
    }
    else {
        echo "falha ao cadastrar";
    }

} else {
    header('Location: ../view/Error404.html');
}
