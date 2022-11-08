<?php

include_once $_SERVER["DOCUMENT_ROOT"]."/project_PI/DAO/connection.php";
include_once $_SERVER["DOCUMENT_ROOT"]."/project_PI/DAO/employeesBd.php";
include_once $_SERVER["DOCUMENT_ROOT"]."/project_PI/model/employees.php";

$id = $_POST['idEmployeesChange'];
$name = $_POST['changeNameEmployees'];
$cpf = $_POST['changeCpfEmployees'];
$email = $_POST['changeEmailEmployees'];
$tel = $_POST['changeTellEmployees'];

$emp = new Employees();

$emp ->setId($id);
$emp ->setName($name);
$emp ->setCpf($cpf);
$emp ->setEmail($email);
$emp ->setTel($tel);


$result_regist = update_employee($emp);
die(var_dump($result_regist));
if ($result_regist == true) {
    header('Location: ../view/dashboard/employeesPage.php');
}
else {
    echo "falha ao falha ao atualizar dados";
}