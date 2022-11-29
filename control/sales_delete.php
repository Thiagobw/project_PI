<?php 
include_once $_SERVER["DOCUMENT_ROOT"]."/project_PI/DAO/salesBd.php";
include_once $_SERVER["DOCUMENT_ROOT"]."/project_PI/model/Sales.php";
//same as others in these folder for you don't forget why you class
if(isset($_GET['id'])) {

    $id = $_GET['id'];
    $sales = getSale($id); //handle var to object

    $result_delete = deleteSale($sales);//send object, NO string or int to refer id

    if($result_delete == true) {
        header('Location: ../view/dashboard/salesListPage.php');
    }
    else {
        echo "falha ao deletar";
    }

} else {
    header('Location: ../view/Error404.html');
}
?>