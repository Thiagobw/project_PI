<?php
include_once $_SERVER["DOCUMENT_ROOT"]."/project_PI/DAO/customersBd.php";
include_once $_SERVER["DOCUMENT_ROOT"]."/project_PI/model/Customers.php";

if(isset($_GET['id'])) {

    $id = $_GET['id'];

    $cust = new Customers();

    $cust->setId($id);

    $result_delete = delet_customers($cust);

    if($result_delete == true) {
        header('Location: ../view/dashboard/customersPage.php');
    }
    else {
        echo "falha ao deletar";
    }
} else {
    header('Location: ../view/Error404.html');
}