<?php
include_once $_SERVER["DOCUMENT_ROOT"]."/project_PI/DAO/cartBd.php";
include_once $_SERVER["DOCUMENT_ROOT"]."/project_PI/DAO/usuarioBd.php";
@session_start();

//controller route to add after selected
if (isset($_POST['sizeSelected'])) {
    addToCart($_SESSION['product_id'], $_SESSION['id_usuario'], $_SESSION['quantity'], $_POST['sizeSelected']);
    return header('Location: /project_PI/view/cart.php');
}

//controller route of sale page to select/see sizes
$id_usuario = $_SESSION['usuario'];
if ($_SESSION['autenticado'] && isset($id_usuario) && isset($_POST['product_id'])) {
    //handle session for select size page and how many quantity
    $_SESSION['quantity'] = $_POST['quantity'];
    $_SESSION['product_id'] = $_POST['product_id'];
    $_SESSION['id_usuario'] = $id_usuario['id_usuario'];
    return header('Location: /project_PI/view/productSelected.php');


    //each POST of that its are cart management, if you want implement more functions its here!
} elseif (isset($_POST['removeItem'])) {
    deleteItemCart($_POST['removeItem']);
    return header('Location: /project_PI/view/cart.php');

} elseif (isset($_POST['increaseItem']) || isset($_POST['decreaseItem'])) {
    //if you want use case:switch for make logic you can go
    if (isset($_POST['increaseItem'])) {
        updateCartItemQuantity($_POST['increaseItem'], '+');
        return header("Location: /project_PI/view/cart.php");
    } else {
        updateCartItemQuantity($_POST['decreaseItem'], '-');
        return header("Location: /project_PI/view/cart.php");
    }
} else {
    //if you goes there, you have something wrong
    //most probabily on DB or you can't go where you want
    return header('Location: /project_PI/view/');
}