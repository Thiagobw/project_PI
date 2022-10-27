<?php

include_once $_SERVER["DOCUMENT_ROOT"]."/project_PI/DAO/employeesBd.php";
include_once $_SERVER["DOCUMENT_ROOT"]."/project_PI/model/employees.php";

$id = $_GET['id'];

$emp = new Employees();

$emp->setId($id);

$result_delete = delet_employees($emp);

if($result_delete == true) {
    header('Location: ../view/dashboard/employeesPage.php');
}
else {
    echo "falha ao deletar";
}