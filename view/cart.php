<?php
include_once '../DAO/cartBd.php';
include_once '../DAO/productsBd.php';
include_once '../DAO/imagesBd.php';
session_start();
function checkAuth()
{
    if (isset($_SESSION['autenticado']) && $_SESSION['autenticado'] == true) {
        return true;
    } else {
        return false;
    }
}
if (checkAuth()) {
    $user = $_SESSION['usuario'];
    $userName = $user['nome'];
    $shortNameArray = explode(' ', $userName, -1);
    if (count($shortNameArray) <= 0) {
        $shortName =  $userName;
    } else {
        $shortName = $shortNameArray[0];
    }
}
$_SESSION['can_checkout'] = false;
$cart = isset($_SESSION['cart']) ? $_SESSION['cart'] : seeCartItems($user['id_usuario']);
?>
<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/bootstrap.css">
    <link rel="stylesheet" href="css/styleCart.css">
    <link rel="stylesheet" href="img/icons/fontawesome/css/all.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css" />

    <title>Checkout - LA Imports</title>
</head>

<body>

    <header>
        <?php
        include "../view/navbar/navbarHomePage.php";
        ?>
    </header>
    
    <section class="h-100 h-custom" style="background-color: #eee;">
        <div class="container py-5 h-100">
            <div class="row d-flex justify-content-center align-items-center h-100">
                <div class="col">
                    <div class="card">
                        <div class="card-body p-4">
                            <div class="row">
                                <div class="col-lg-7">
                                    <h5 class="mb-3"><a href="/project_PI/view/salePage.php" class="text-body">
                                            <i class="fas fa-long-arrow-alt-left me-2">
                                            </i>Continuar Comprando!!</a>
                                    </h5>    
                                    <hr>
                                </div>
                                
                                <div class="col-lg-7">
                                    <form method="POST" action="/project_PI/control/control_cart.php">
                                        <div class="col-12 col-md-7 cart-body">
                                            <!-- product product in cart -->
                                            <div class="cart-item">
                                                <?php if (!isset($cart) || $cart == 0 || empty($cart)) { ?>
                                                    
                                                    <p class="alert alert-danger mb-0">
                                                        Nenhum item no carrinho
                                                    </p>

                                                <?php } else { ?>
                                                <?php foreach ($cart as $item) {
                                                    $prod = getProduct($item->getProdutosId());
                                                    //deletar quando chegar a 0
                                                    if($item->getQuantidade() == 0) {
                                                        deleteItemCart($item->getId());
                                                    }
                                                ?>
                                                
                                                <div class="cart-item">
                                                    <!-- Product information -->
                                                    <div class="row cart-row">
                                                        <div class="col-12 col-sm-2 pic">
                                                            <!-- btn btn to remove product -->
                                                            <button class="btn btn-danger center" id="btnRemove" href="/project_PI/control/control_cart.php" value="<?php echo $item->getId(); ?>" name="removeItem">X</button>
                                                            <span>
                                                                <!-- product image, have an disclamer for this in productSelected -->
                                                                <img src="../uploads/<?php echo selectImage($prod->getImagemId())->getName() ?>" alt="">
                                                            </span>
                                                        </div>


                                                        <!-- name product -->
                                                        <div class="col-12 col-sm-10 desc">
                                                            <h6><?php echo $prod->getName(); ?></h6>
                                                            <p class="small mb-0">
                                                                Tamanho: <?php echo $item->getTamanho(); ?>
                                                            </p>
                                                        </div>
                                                        

                                                        <div class="cart-row-cell quant">
                                                            <ul> <!-- Apagar quando chegar a 0 -->
                                                                <?php if($item->getQuantidade() < 1){
                                                                    }else{?>                                                                        <li><button name="decreaseItem" value="<?php echo $item->getId(); ?>" href="/project_PI/control/control_cart.php">-</button></li>
                                                                <?php } ?>
                                                                <li><?php echo $item->getQuantidade(); ?></li>
                                                                
                                                                <li>
                                                                    <button name="increaseItem" value="<?php echo $item->getId(); ?>" href="/project_PI/control/control_cart.php">+</button>
                                                                </li>
                                                            </ul>
                                                        </div>


                                                        <div class="cart-row-cell amount">
                                                            <p>R$ <span>
                                                                    <?php $multi_item = $item->getValor() * $item->getQuantidade();
                                                                        $sub_total[] = $multi_item;
                                                                        echo $multi_item;
                                                                    ?>
                                                                </span>
                                                            </p>
                                                        </div>
                                                    </div>
                                                </div>
                                                <?php } ?>
                                            </div>
                                        </div>
                                    <?php } ?>
                                    </form>
                                </div>
                                <div class="col-lg-4">
                                    <form action="/project_PI/control/control_checkout.php" method="GET">
                                        <footer class="col-12 col-md-5">
                                            <div class="row center">
                                                <div class="col-10 col-sm-9 col-md-8 totals">
                                                    <p class="total-label">Total</p>
                                                    <p class="total-amount">R$
                                                        <!-- total value of items in cart -->
                                                        <?php if (empty($sub_total)) { ?>
                                                        <?php } else {
                                                            $_SESSION['checkout_subtotal'] = array_sum($sub_total);
                                                            $_SESSION['can_checkout'] = isset($_SESSION['checkout_subtotal']) ? true : false; ?>
                                                            <span><?php echo array_sum($sub_total); ?></span>
                                                        <?php } ?>
                                                    </p>
                                                </div>
                                            </div>
                                            <?php if($_SESSION['can_checkout']){ ?>
                                                <button value="true" class="btn btn-primary mt-3" name="checkout">Finalizar a venda</button>
                                                <?php } ?>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        </div>
    </section>
</body>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js"></script>
<script src="js/pop-upDisplayControl.js"></script>
<script src="js/login-register.js"></script>
<script src="https://code.jquery.com/jquery-3.6.1.js" integrity="sha256-3zlB5s2uwoUzrXK3BT7AX3FyvojsraNFxCc2vC/7pNI=" crossorigin="anonymous"></script>
<script src="js/jquery.mask.min.js"></script>
<script>
    $('#exp').mask('00/0000');
</script>

</html>