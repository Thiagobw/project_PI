<?php
include_once $_SERVER["DOCUMENT_ROOT"]."/project_PI/DAO/requestsBd.php";
@session_start();
//see you come through cart button!

if (isset($_GET['checkout']) || isset($_GET['makeOrder'])) {
    
    if (isset($_GET['checkout'])) {
        return header("Location: /project_PI/view/checkout.php");
    }
    
    if (isset($_GET['makeOrder'])) {
        
        
        if(isset($_GET['method'])) {

            if (!empty(getSelectedMethod())) {
                $_SESSION['method_selected'] = getSelectedMethod();


                if(makeOrder($_SESSION['id_usuario'], $_SESSION['method_selected'], $_GET['subtotal'], $_GET['employe'], $_GET['customer'])) {
                    $success = "Venda efetuada com sucesso!";
                    return header("Location: /project_PI/view/dashboard/salesListPage.php?successSale=".$success);

                }else{
                    $error = "Erro ao efetuar a venda!";
                    return header("Location: /project_PI/view/dashboard/salesListPage.php?errorSale=".$error);
                }

            } else {
                return header("Location: /project_PI/view/checkout.php");
            }

        } else {
            $error2 = "para concluir a venda é necessario selecionar um metodo de pagamento.";
            header("Location: /project_PI/view/checkout.php?errorMethod=".$error2);
        }

    } else {
        return header("Location: /project_PI/view/cart.php");
    }


} else {
    return header("Location: /project_PI/view/Error404.html");
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