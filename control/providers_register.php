<?php

include_once "../DAO/connection.php";
include_once "../DAO/providersDB.php";


$name = $_POST['nomeProviders'];
$email = $_POST['emailProviders'];
$cnpj = $_POST['cnpjProviders'];
$tell = $_POST['tellProviders'];

$cust = new Providers();

$cust->setName($name);
$cust->setCnpj($cnpj);
$cust->setEmail($email);
$cust->setTell($tell);

$result_regist = search_provider($cust);
if ($result_regist == true) {
    header('Location: ../view/dashboard/providersDB.php');
} else {
    echo "falha ao cadastrar";
}

?>
