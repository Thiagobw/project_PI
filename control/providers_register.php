<?php

include_once "../connection.php";
include_once "../DAO/providersBd.php";
include_once "../Banco Sql/project.sql";

$name = $_POST['name'];
$email = $_POST['email'];
$cnpj = $_POST['cnpj'];
$tell = $_POST['tell'];

$cust = new Provider();

$cust->setName($name);
$cust->setCpf($cnpj);
$cust->setEmail($email);
$cust->setTell($tell);

$result_regist = register_providers($cust);
if ($result_regist == true) {
    header('Location: ../view/dashboard/providersPage.php');
} else {
    echo "falha ao cadastrar";
}

?>
