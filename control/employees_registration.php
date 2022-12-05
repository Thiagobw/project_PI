<?php

include_once $_SERVER["DOCUMENT_ROOT"]."/project_PI/DAO/connection.php";
include_once $_SERVER["DOCUMENT_ROOT"]."/project_PI/DAO/employeesBd.php";
include_once $_SERVER["DOCUMENT_ROOT"]."/project_PI/model/employees.php";

if(isset($_POST['submitEmployees'])) {

    if (!empty($_POST['nameEmployees']) && !empty($_POST['cpfEmployees']) && (!empty($_POST['emailEmployees']) || !empty($_POST['tellEmployees']))) {
        
        $email = $_POST['emailEmployees'];
        $tel = $_POST['tellEmployees'];

        $emp = new Employees();

        $emp ->setName($_POST['nameEmployees']);
        $emp ->setCpf($_POST['cpfEmployees']);
        $emp ->setEmail($email);
        $emp ->setTel($tel);
        $emp ->setType(2);

        if (register_employees($emp)) {
            $success = "Funcionario cadastrado com sucesso!";
            header('Location: ../view/dashboard/employeesPage.php?SuccessRegister='.$success);
        } else {
            $error = "Erro ao cadastrar!";
            header('Location: ../view/dashboard/employeesPage.php?ErrorRegister='.$error);
        }

    } else {
        $error2 = "você deve informar: O nome, CPF e pelo menos um meio de contato do Funcionario.";
        header('Location: ../view/dashboard/employeesPage.php?ErrorRegister2='.$error2);
    }
    
} else {
    header('Location: ../view/Error404.html');
}
