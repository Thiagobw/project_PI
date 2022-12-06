<?php 
include_once $_SERVER["DOCUMENT_ROOT"]."/project_PI/DAO/salesBd.php";
include_once $_SERVER["DOCUMENT_ROOT"]."/project_PI/model/Sales.php";
//same as others in these folder for you don't forget why you class
if(isset($_GET['id'])) {

    $id = $_GET['id'];
    $sales = getSale($id); //handle var to object

    if(deleteSale($sales)) { //send object, NO string or int to refer id
        $success = "Venda excluida com sucesso!";
        header('Location: ../view/dashboard/salesListPage.php?successDelete='.$success);
    }
    else {
        $error = "Erro ao excluir!";
        header('Location: ../view/dashboard/salesListPage.php?errorDelete='.$error);
    }

} else {
    header('Location: ../view/Error404.html');
}
?>