<?php
include_once '../DAO/cartBd.php';
include_once '../DAO/usuarioBd.php';
session_start();
if($_POST['sizeSelected']){
    // return var_dump($_POST['sizeSelected']);
    addToCart($_SESSION['product_id'],$_SESSION['id_usuario'],$_SESSION['quantity'], $_POST['sizeSelected'] );
    return header('Location: /project_PI/view/cart.php');
}
//controller route of sale page to select/see sizes
$id_usuario = $_SESSION['usuario'];
if($_SESSION['autenticado'] && isset($id_usuario) && isset($_POST['product_id'])){
    //handle session for select size page and how many quantity
    $_SESSION['quantity'] = $_POST['quantity'];
    $_SESSION['product_id'] = $_POST['product_id'];
    $_SESSION['id_usuario'] = $id_usuario['id_usuario'];
    return header('Location: /project_PI/view/productSelected.php');
}elseif(isset($_POST['removeItem'])) {
    deleteItemCart($_POST['removeItem']);
    return header('Location: /project_PI/view/salePage.php');
}elseif (isset($_POST['increaseItem']) || isset($_POST['decreaseItem'])) {
    if (isset($_POST['increaseItem'])){
        updateCartItemQuantity($_POST['increaseItem'], '+');
        return header("Location: /project_PI/view/cart.php");
    }else{
        updateCartItemQuantity($_POST['decreaseItem'], '-');
        return header("Location: /project_PI/view/cart.php");
    }
}else{
    return header('Location: /project_PI/view/');
}

//References of DB functions
//addToCart($_POST['product_id'],);
// if(isset($_POST['product']) && isset($_POST['quantity'])){
//     if(isset($_SESSION['cart_product'])){
//     $_SESSION['cart_product'] .= $_POST['product'];
//     $_SESSION['cart_qty'] = $_POST['qty'];
//     header('Location: /project_PI/view/cart.php');
//     }elseif(!isset($_SESSION['cart'])) {
//     $_SESSION['cart_product'] = $_POST['product'];
//     $_SESSION['cart_qty'] = $_POST['quantity'];
//     header('Location: /project_PI/view/cart.php');
//     }
// }else{
//     header('Location: /project_PI/view/salePage.php');
// }
// function addToCart(Users $user){
//     $prod = $_POST['product_id'];
//     $qty = $_POST['quantity'];
//     $size = $_POST['size'];
//     $price = getProduct($prod)->getPrice();
//     if(!isset($_SESSION['autenticado'])){
//         header("Location: /project_PI/view/salePage.php");
//     }else {
//         $conexao = connect();
//         $query = $conexao->prepare("INSERT INTO pedido_produto (tamanho, quantidade, valor, Produtos_idProdutos, usuario_id) VALUES (:tamanho, :quantidade, :valor, :Produtos_idProdutos, :usuario_id)");
//         $query->bindValue(':tamanho', $size);
//         $query->bindValue(':quantidade', $qty);
//         $query->bindValue(':Produtos_idProdutos', $prod);
//         $query->bindValue(':usuario_id', $user->getId());
//         $query->bindValue(':valor', $price);
//         $query->execute();
//         return header('/project_PI/view/cart.php');
//     }
// }
