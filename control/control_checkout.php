<?php
include_once $_SERVER["DOCUMENT_ROOT"]."/project_PI/DAO/requestsBd.php";
@session_start();
//see you come through cart button!


if(isset($_GET['method'])) {
    $_SESSION['method_selected'] = 'Transf bancária';

}else {
    return header("Location: /project_PI/view/checkout.php");
}

if(isset($_GET['makeOrder'])) {
    
    if(isset($_GET['method'])) {
        $_SESSION['method_selected'] = 'Transf bancária';
    }else {
        return header("Location: /project_PI/view/checkout.php");
    }

    
    if(makeOrder($_SESSION['id_usuario'], $_SESSION['method_selected'], $_GET['subtotal'], $_GET['employe'],
    $_GET['customer'])) {

        return header("Location: /project_PI/view/dashboard/");
    }else{
        echo "n deu"; //return header("Location: /project_PI/view/cart.php");
    }
    
    if(makeOrder($_SESSION['id_usuario'], $_SESSION['method_selected'], $_GET['subtotal'], $_GET['employe'], $_GET['customer']))
    {
        return header("Location: /project_PI/view/dashboard/");
    }else {
        return header("Location: /project_PI/view/cart.php");
    }

}else {
    return header("Location: /project_PI/view/Error404.html");
}

?>