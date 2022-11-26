<?php

include_once $_SERVER["DOCUMENT_ROOT"]."/project_PI/DAO/connection.php";
include_once $_SERVER["DOCUMENT_ROOT"]."/project_PI/DAO/employeesBd.php";
include_once $_SERVER["DOCUMENT_ROOT"]."/project_PI/model/employees.php";

if(isset($_POST['submitEmployees'])) {

    $name = $_POST['nameEmployees'];
    $cpf = $_POST['cpfEmployees'];
    $email = $_POST['emailEmployees'];
    $tel = $_POST['tellEmployees'];

    $emp = new Employees();

    $emp ->setName($name);
    $emp ->setCpf($cpf);
    $emp ->setEmail($email);
    $emp ->setTel($tel);
    $emp ->setType(2);

    if (register_employees($emp)) {
        header('Location: ../view/dashboard/employeesPage.php');
    }
    else {
        echo "falha ao cadastrar";
    }

} else {
    header('Location: ../view/Error404.html');
}
