<?php

include_once $_SERVER["DOCUMENT_ROOT"]."/project_PI/DAO/connection.php";
include_once $_SERVER["DOCUMENT_ROOT"]."/project_PI/DAO/customersBd.php";
include_once $_SERVER["DOCUMENT_ROOT"]."/project_PI/model/Customers.php";

$id = $_POST['idCustomerChange'];
$name = $_POST['changeNameCustomers'];
$email = $_POST['changeEmailCustomers'];
$cpf = $_POST['changeCpfCustomers'];
$tel = $_POST['changeTellCustomers'];


$cust = new Customers();

$cust ->setId($id);
$cust ->setName($name);
$cust ->setEmail($email);
$cust ->setCpf($cpf);
$cust ->setTel($tel);


$result_regist = update_customers($cust);

if ($result_regist == true) {
    header('Location: ../view/dashboard/employeesPage.php');
}
else {
    echo "falha ao cadastrar";
}