<?php

include_once "../connection.php";
include_once "../DAO/customersBd.php";
include_once "../model/Customers.php";

$name = $_POST['nameCustomers'];
$email = $_POST['emailCustomers'];
$cpf = $_POST['cpfCustomers'];
$tel = $_POST['tellCustomers'];
die(var_dump($name, $cpf, $email, $tel));
$cust = new Customers();

$cust->setName($name);
$cust->setCpf($cpf);
$cust->setEmail($email);
$cust->setTell($tel);

if (register_customers($cust) == true) {
    header('Location: ../view/dashboard/customersPage.php');
} else {
    echo "falha ao cadastrar";
}

?>