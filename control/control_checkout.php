<?php
include_once $_SERVER["DOCUMENT_ROOT"]."/project_PI/DAO/requestsBd.php";
@session_start();
//see you come through cart button!

if (isset($_GET['checkout']) || isset($_GET['makeOrder'])) {

    if (isset($_GET['checkout'])) {
        header("Location: /project_PI/view/checkout.php");
    }
    
    if (isset($_GET['makeOrder'])) {
        
        
        if(isset($_GET['method'])) {

            if (!empty(getSelectedMethod())) {
                $_SESSION['method_selected'] = getSelectedMethod();


                if(makeOrder($_SESSION['id_usuario'], $_SESSION['method_selected'], $_GET['subtotal'], $_GET['employe'], $_GET['customer'])) {
            
                    return header("Location: /project_PI/view/dashboard/salesListPage.php");
                }else{
                    return header("Location: /project_PI/view/cart.php");
                }

            } else {
                header("Location: /project_PI/view/checkout.php");
            }
        } else {
            header("Location: /project_PI/view/checkout.php");
        }

    } else {
        return header("Location: /project_PI/view/cart.php");
    }


} else {
    header("Location: /project_PI/view/Error404.html");
}


function getSelectedMethod ():string {

    if ($_GET['method'] == "tB") {
        return "Transf bancária";

    } elseif ($_GET['method'] == "blt") {
        return "Boleto";

    } elseif ($_GET['method'] == "pix") {
        return "Pix";

    }elseif ($_GET['method'] == "card") {
        return "Cartão";

    } elseif ($_GET['method'] == "money") {
        return "Dinheiro";

    } else {
        return "";
    }
}

?>