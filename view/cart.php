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

<body class="bg-secondary">

    <header>
        <?php
        include "../view/navbar/navbarHomePage.php";
        ?>
    </header>
    
    <section class="container">
        <div class="row center">
            <div class="col-12 bg-white mt-5 rounded-bottom shadow-lg">
                <div class="row mt-2 center">
                    <div class="col-12">
                        <a href="/project_PI/view/salePage.php" class="btn btn-block btn-warning">
                            <i class="fas fa-long-arrow-alt-left me-2"></i>
                            Continuar Comprando!
                        </a>
                    </div>
                    
                    <div class="col-lg-8">
                        <form method="POST" action="/project_PI/control/control_cart.php">
                            <div class="col-12 col-md-7">

                                <!-- product in cart -->
                                <div class="row">
                                    <?php if (!isset($cart) || $cart == 0 || empty($cart)) { ?>
                                                    
                                    <div class="col-12 alert alert-danger center"> Nenhum item no carrinho! </div>
                                        
                                    <?php } else { ?>
                                    <?php foreach ($cart as $item) {
                                        $prod = getProduct($item->getProdutosId());

                                        //deletar quando chegar a 0
                                        if($item->getQuantidade() == 0) { deleteItemCart($item->getId()); }
                                        ?>

                                        <div class="cart-item">
                                            <!-- Product information -->
                                            <div class="row">
                                                <div class="col-12 col-sm-2">
                                                    <!-- btn btn to remove product -->
                                                    <button class="btn btn-danger center" id="btnRemove" href="/project_PI/control/control_cart.php" value="<?php echo $item->getId(); ?>" name="removeItem">X</button>
                                                        <!-- product image, have an disclamer for this in productSelected -->
                                                        <img class="img-fluid h-100" src="../uploads/<?php echo selectImage($prod->getImagemId())->getName() ?>" alt="">
                                                </div>

                                                <!-- name product -->
                                                <div class="col-12 col-sm-7">
                                                    <h6><?php echo $prod->getName(); ?></h6>
                                                    <p class="small"> Tamanho: <?php echo $item->getTamanho(); ?></p>
                                                </div>
                                                
                                                <div class="col-12 col-sm-3">
                                                        <?php if($item->getQuantidade() < 1) {
                                                            } else {
                                                        ?>
                                                        <button name="decreaseItem" value="<?php echo $item->getId(); ?>" href="/project_PI/control/control_cart.php">-</button>

                                                        <?php } ?>

                                                        <li><?php echo $item->getQuantidade(); ?></li>
                                                        
                                                        <button name="increaseItem" value="<?php echo $item->getId(); ?>" href="/project_PI/control/control_cart.php">+</button>
                                                </div>
                                            </div>

                                            
                                            <div class="row">
                                                <div class="cart-row-cell amount">
                                                    <p>R$ 
                                                        <span>
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
                            </footer>
                        </form>
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