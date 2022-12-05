<?php

include_once $_SERVER["DOCUMENT_ROOT"]."/project_PI/DAO/connection.php";
include_once $_SERVER["DOCUMENT_ROOT"]."/project_PI/DAO/employeesBd.php";
include_once $_SERVER["DOCUMENT_ROOT"]."/project_PI/model/employees.php";

if(isset($_POST['submitChangeEmployees']) && isset($_POST['idEmployeesChange'])) {

    if (!empty($_POST['changeNameEmployees']) && !empty($_POST['changeCpfEmployees']) && (!empty($_POST['changeEmailEmployees']) || !empty($_POST['changeTellEmployees']))) {
        $email = $_POST['changeEmailEmployees'];
        $tel = $_POST['changeTellEmployees'];

        $emp = new Employees();

        $emp ->setId($_POST['idEmployeesChange']);
        $emp ->setName($_POST['changeNameEmployees']);
        $emp ->setCpf($_POST['changeCpfEmployees']);
        $emp ->setEmail($email);
        $emp ->setTel($tel);


        $result_regist = update_employee($emp);
        if ($result_regist == true) {
            $success = "Dados do funcionario atualizados com sucesso!";
            header('Location: ../view/dashboard/employeesPage.php?successUpdate='.$success);
        }
        else {
            $error = "Erro ao atualizar os dados do funcionario!";
            header('Location: ../view/dashboard/employeesPage.php?errorUpdate='.$error);
        }

    } else {
        $error2 = "você deve informar: O nome, CPF e pelo menos um meio de contato do funcionario.";
        header('Location: ../view/dashboard/employeesPage.php?errorUpdate2='.$error2);
    }
    
} else {
    header('Location: ../view/Error404.html');
}
