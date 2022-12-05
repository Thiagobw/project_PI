<?php

include_once $_SERVER["DOCUMENT_ROOT"]."/project_PI/DAO/connection.php";
include_once $_SERVER["DOCUMENT_ROOT"]."/project_PI/DAO/providersBd.php";
include_once $_SERVER["DOCUMENT_ROOT"]."/project_PI/model/Providers.php";

if(isset($_POST['submitProviders'])) {
    
    if (!empty($_POST['nameProviders']) && !empty($_POST['cnpjProviders']) && (!empty($_POST['emailProviders']) || !empty($_POST['tellProviders']))) {

        $email;
        $tel;

        if (!empty($_POST['emailProviders'])) {
            $email = $_POST['emailProviders'];
        } else {
            $email = "não informado";
        }

        if (!empty($_POST['tellProviders'])) {
            $tel = $_POST['tellProviders'];
        } else {
            $tel = "não informado";
        }

        $prov = new Providers();

        $prov ->setName($_POST['nameProviders']);
        $prov ->setCnpj($_POST['cnpjProviders']);
        $prov ->setEmail($email);
        $prov ->setTell($tel);

        if (register_providers($prov)) {
            $success = "Fornecedor cadastrado com sucesso!";
            header('Location: ../view/dashboard/providersPage.php?SuccessRegister='.$success);
        }
        else {
            $error = "Erro ao cadastrar o fornecedor!";
            header('Location: ../view/dashboard/providersPage.php?errorRegister='.$error);
        }

    } else {
        $error2 = "você deve informar: O nome, CNPJ e pelo menos um meio de contato do Fornecedor.";
        header('Location: ../view/dashboard/providersPage.php?errorRegister2='.$error2);
    }

} else {
    header('Location: ../view/Error404.html');
}
