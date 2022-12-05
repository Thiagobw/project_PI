<?php

include_once $_SERVER["DOCUMENT_ROOT"]."/project_PI/DAO/connection.php";
include_once $_SERVER["DOCUMENT_ROOT"]."/project_PI/DAO/customersBd.php";
include_once $_SERVER["DOCUMENT_ROOT"]."/project_PI/model/Customers.php";

if (isset($_POST['submitChangeCustomers']) && isset($_POST['idCustomerChange'])) {
    
    if (!empty($_POST['changeNameCustomers']) && !empty($_POST['changeCpfCustomers'])) {

        $email;
        $tel;
        
        if (!empty($_POST['changeEmailCustomers'])) {
            $email = $_POST['changeEmailCustomers'];
        } else {
            $email = "não informado";
        }

        if (!empty($_POST['changeTellCustomers'])) {
            $tel = $_POST['changeTellCustomers'];
            
        } else {
            $tel = "não informado";
        }

        $cust = new Customers();
        
        $cust ->setId($_POST['idCustomerChange']);
        $cust ->setName($_POST['changeNameCustomers']);
        $cust ->setCpf($_POST['changeCpfCustomers']);
        $cust ->setEmail($email);
        $cust ->setTell($tel);

        if (update_customers($cust)) {
            $success = "Dados do cliente atualizados com sucesso!";
            header('Location: ../view/dashboard/customersPage.php?successUpdate='.$success);
        }
        else {
            $error = "Erro ao atualizar dados!";
            header('Location: ../view/dashboard/customersPage.php?errorUpdate='.$error);
        }

    } else {
        $error2 = "você deve informar: O nome, CPF e pelo menos um meio de contato do cliente.";
        header('Location: ../view/dashboard/customersPage.php?errorUpdate2='.$error2);
    }

} else {
    header('Location: ../view/Error404.html');
}
