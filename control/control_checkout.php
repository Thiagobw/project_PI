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
    if($_GET['method'] == 'card'){
        $_SESSION['method_selected'] = 'Cartão';
        //return header("Location: /project_PI/view/checkout.php");

    }elseif($_GET['method'] == 'boleto') {
        $_SESSION['method_selected'] = 'Boleto';
        //return header("Location: /project_PI/view/checkout.php");

    }elseif($_GET['method'] == 'pix') {
        $_SESSION['method_selected'] = 'Pix';
        

    }elseif($_GET['method'] == 'tB') {
        $_SESSION['method_selected'] = 'Transf bancária';


    }elseif($_GET['method'] == 'money') {
        $_SESSION['method_selected'] = 'Dinheiro';
        

    }else{
        return header("Location: /project_PI/view/checkout.php");
    }

}elseif(isset($_POST['makeOrder'])and !empty($_POST['inputAddress'])) {
    if(makeOrder($_SESSION['id_usuario'], $_SESSION['method_selected'], $_POST['subtotal'], $_POST['employe'], $_POST['customer'], $_POST['inputAddress'], intval($_POST['address_cep']), intval($_POST['address_number']), $_POST['address_complement']))
    {
        echo "deu certo"; //return header("Location: /project_PI/view/salePage.php");
    }else{
        echo "n deu"; //return header("Location: /project_PI/view/cart.php");
    }

}elseif(isset($_POST['makeOrder'])) {

    if(makeOrder($_SESSION['id_usuario'], $_SESSION['method_selected'], $_POST['subtotal'], $_POST['employe'], $_POST['customer']))
    {
        echo "true";//return header("Location: /project_PI/view/salePage.php");
    }else{
        echo "false"; //return header("Location: /project_PI/view/cart.php");
    }

}else {
    return header("Location: /project_PI/view/salePage.php");
}
?>