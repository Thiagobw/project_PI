<?php
include_once $_SERVER["DOCUMENT_ROOT"]."/project_PI/DAO/requestsBd.php";
@session_start();
//see you come through cart button!
if (!empty($_GET['checkout'])) {
    if($_SESSION['can_checkout']){
        return header("Location: /project_PI/view/checkout.php");
    } else{
        return header("Location: /project_PI/view/cart.php");
    }
//control view method
}elseif(isset($_GET['method'])) {

    if($_GET['method'] == 'card') {
        $_SESSION['method_selected'] = 'cartão';
        return header("Location: /project_PI/view/checkout.php");

    }elseif($_GET['method'] == 'boleto') {

        $_SESSION['method_selected'] = 'boleto';
        return header("Location: /project_PI/view/checkout.php");

    }elseif($_GET['method'] == 'tB') {

        $_SESSION['method_selected'] = 'transferencia bancaria';
        return header("Location: /project_PI/view/checkout.php");

    }elseif ($_GET['method'] == 'money') {


    } else {
        return header("Location: /project_PI/view/cart.php");
    }

}elseif(isset($_POST['makeOrder'])and !empty($_POST['inputAddress'])) {
    if(makeOrder($_SESSION['id_usuario'],
    $_SESSION['method_selected'],
    $_POST['subtotal'],
    $_POST['employe'],
    $_POST['customer'],
    $_POST['inputAddress'],
    intval($_POST['address_cep']),
    intval($_POST['address_number']),
    $_POST['address_complement'],
    ))
    {
        return header("Location: /project_PI/view/salePage.php");
    }else{
        return header("Location: /project_PI/view/cart.php");
    }
}elseif(isset($_POST['makeOrder'])) {
    if(makeOrder($_SESSION['id_usuario'],
    $_SESSION['method_selected'],
    $_POST['subtotal'],
    $_POST['employe'],
    $_POST['customer'],
    ))
    {
        return header("Location: /project_PI/view/salePage.php");
    }else{
        return header("Location: /project_PI/view/cart.php");
    }
}else{
    return header("Location: /project_PI/view/salePage.php");
}
?>