<?php
include_once $_SERVER["DOCUMENT_ROOT"]."/project_PI/DAO/customersBd.php";
include_once $_SERVER["DOCUMENT_ROOT"]."/project_PI/model/Customers.php";

if(isset($_GET['id'])) {

    $id = $_GET['id'];

    $cust = new Customers();

    $cust->setId($id);

    if(delet_customers($cust)) {
        $success = "Excluido com sucesso!";
        header('Location: ../view/dashboard/customersPage.php?successDelete='.$success);
    }
    else {
        $error = "Erro ao excluir!";
        header('Location: ../view/dashboard/customersPage.php?errorDelete='.$error);
    }
} else {
    header('Location: ../view/Error404.html');
}