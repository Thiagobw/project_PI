<?php

include_once $_SERVER["DOCUMENT_ROOT"]."/project_PI/DAO/employeesBd.php";
include_once $_SERVER["DOCUMENT_ROOT"]."/project_PI/model/employees.php";

if (isset($_GET['id'])) {
    
    $emp = new Employees();

    $emp->setId($_GET['id']);
    
    if(delet_employees($emp)) {
        $success = "Excluido com sucesso!";
        header('Location: ../view/dashboard/employeesPage.php?successDelete='.$success);
        
    }else {
        $erro = "Erro ao excluir!";
        header('Location: ../view/dashboard/employeesPage.php?errorDelete='.$error);
    }

} else {
    header('Location: ../view/Error404.html');
}
