<?php
include_once '../DAO/cartBd.php';
include_once '../DAO/usuarioBd.php';
session_start();
if($_POST['sizeSelected']){

    addToCart($_SESSION['product_id'],$_SESSION['id_usuario'],$_SESSION['quantity'], $_POST['sizeSelected'] );
    return header('Location: /project_PI/view/cart.php');
}
$id_usuario = $_SESSION['usuario'];

if($_SESSION['autenticado'] && isset($id_usuario) && isset($_POST['product_id'])){
    //handle session for select size page and how many quantity
    $_SESSION['quantity'] = $_POST['quantity'];
    $_SESSION['product_id'] = $_POST['product_id'];
    $_SESSION['id_usuario'] = $id_usuario['id_usuario'];
    return header('Location: /project_PI/view/productSelected.php');
}
elseif(isset($_POST['removeItem'])) {

    deleteItemCart($_POST['removeItem']);
    return header('Location: /project_PI/view/salePage.php');
}
elseif (isset($_POST['increaseItem']) || isset($_POST['decreaseItem'])) {

    if (isset($_POST['increaseItem'])){
        updateCartItemQuantity($_POST['increaseItem'], '+');
        return header("Location: /project_PI/view/cart.php");
    }
    else {
        updateCartItemQuantity($_POST['decreaseItem'], '-');
        return header("Location: /project_PI/view/cart.php");
    }
}else{
    return header('Location: /project_PI/view/dashboard/');
}
