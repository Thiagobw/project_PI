<?php

include_once $_SERVER["DOCUMENT_ROOT"]."/project_PI/DAO/connection.php";
include_once $_SERVER["DOCUMENT_ROOT"]."/project_PI/DAO/customersBd.php";
include_once $_SERVER["DOCUMENT_ROOT"]."/project_PI/model/Customers.php";

if(isset($_POST['submitCustomers'])) {

    if (!empty($_POST['nameCustomers']) && !empty($_POST['cpfCustomers']) && (!empty($_POST['emailCustomers']) || !empty($_POST['tellCustomers']))) {

        $name = $_POST['nameCustomers'];
        $cpf = $_POST['cpfCustomers'];
        $email;
        $tel;

        if (!empty($_POST['tellCustomers'])) {
            $tel =  $_POST['tellCustomers'];
        } else {
            $tel = "não informado";
        }
        if (!empty($_POST['emailCustomers'])) {
            $email = $_POST['emailCustomers'];
        } else {
            $email = "não informado";
        }

        $cust = new Customers();

        $cust->setName($name);
        $cust->setCpf($cpf);
        $cust->setEmail($email);
        $cust->setTell($tel);

        if (register_customers($cust)) {
            $success = "Cliente cadastrado com sucesso!";
            header('Location: ../view/dashboard/customersPage.php?SuccessRegister='.$success);

        } else {
            $error = "Erro ao cadastrar!";
            header('Location: ../view/dashboard/customersPage.php?ErrorRegister='.$error);
        }

    } else {
        $error2 = "você deve informar: O nome, CPF e pelo menos um meio de contato do cliente.";
        header('Location: ../view/dashboard/customersPage.php?ErrorRegister2='.$error2);
    }

} else {
    header('Location: ../view/Error404.html');
}

?>