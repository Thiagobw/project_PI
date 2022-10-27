<?php

include_once $_SERVER["DOCUMENT_ROOT"]."/project_PI/DAO/connection.php";
include_once $_SERVER["DOCUMENT_ROOT"]."/project_PI/DAO/customersBd.php";
include_once $_SERVER["DOCUMENT_ROOT"]."/project_PI/model/Customers.php";

$name = $_POST['nameCustomers'];
$email = $_POST['emailCustomers'];
$cpf = $_POST['cpfCustomers'];
$tel = $_POST['tellCustomers'];

$cust = new Customers();

$cust->setName($name);
$cust->setCpf($cpf);
$cust->setEmail($email);
$cust->setTell($tel);

$result_regist = register_customers($cust);
if ($result_regist == true) {
    header('Location: ../view/dashboard/customersPage.php');
} else {
    echo "<br/> falha ao cadastrar";
}

?>