<?php

include_once $_SERVER["DOCUMENT_ROOT"]."/project_PI/DAO/connection.php";
include_once $_SERVER["DOCUMENT_ROOT"]."/project_PI/DAO/providersBd.php";
include_once $_SERVER["DOCUMENT_ROOT"]."/project_PI/model/Providers.php";

if(isset($_POST['submitChangeProviders'])) {

    if (!empty($_POST['changeNameProviders']) && !empty($_POST['changeCnpjProviders']) && (!empty($_POST['changeEmailProviders']) || !empty($_POST['changeTellProviders']))) {

        $email;
        $tel;

        if (!empty($_POST['changeEmailProviders'])) {
            $email = $_POST['changeEmailProviders'];
        } else {
            $email = "não informado";
        }

        if (!empty($_POST['changeTellProviders'])) {
            $tel = $_POST['changeTellProviders'];
        } else {
            $tel = "não informado";
        }


        $prov = new Providers();
        
        $prov ->setId($_POST['idProviderChange']);
        $prov ->setName($_POST['changeNameProviders']);
        $prov ->setCnpj($_POST['changeCnpjProviders']);
        $prov ->setEmail($email);
        $prov ->setTell($tel);
        
        if (update_provider($prov)) {
            $success = "Dados do fornecedor atualizados com sucesso!";
            header('Location: ../view/dashboard/providersPage.php?successUpdate='.$success);
        }
        else {
            $error = "Erro ao atualizar os dados!";
            header('Location: ../view/dashboard/providersPage.php?errorUpdate='.$error);
        }

    } else {
        $error2 = "você deve informar: O nome, CNPJ e pelo menos um meio de contato do fornecedor.";
        header('Location: ../view/dashboard/providersPage.php?errorUpdate2='.$error2);
    }



} else {
    header('Location: ../view/Error404.html');
}
