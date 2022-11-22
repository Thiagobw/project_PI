<?php
@session_start();
include_once $_SERVER["DOCUMENT_ROOT"]."/project_PI/control/checkAuth.php";
include_once '../DAO/productsBd.php';
// $sizes = getProduct($_SESSION['product_id']);
$sizes = seeSizeAvaliable($_SESSION['product_id']);
$prod = getProduct($_SESSION['product_id']);
// $price = isset($_SESSION['quantity'],$_SESSION['product_id']) ? :
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="img/icons/fontawesome/css/all.min.css">
    <link rel="stylesheet" href="css/bootstrap.css">
    <link rel="stylesheet" href="css/styleSelected.css">
    <title>LA Imports - Tamanho Disponíveis</title>
</head>
<body>
<header class="row mb-3 mt-2 ml-0 mr-0">
    <div class="col-12 center">
        <h3>Produto selecionado</h3>
    </div>
</header>

<main class="container">
    <div class="row">
        <form class="col-12 cart-body" id="productSelected" method="POST" action="/project_PI/control/control_cart.php">
        <!-- product product in cart -->
            <div class="cart-item">
                <!-- Product information -->
                <div class="row cart-row">
                    <div class="col-12 col-sm-2 pic">
                        <span>
                            <!-- product image -->
                            <img class="img-fluid" src="img/products/tenis 1.jpg" alt="">
                        </span>
                    </div>
                    <!-- name product -->
                    <div class="col-12 col-sm-10 desc">
                        <h6><?php echo $prod->getName()//using object example?></h6>
                        <p>Selecione o tamanho</p>
                        <?php //echo var_dump($sizes) ?>
                        <!-- available sizes -->
                        <?php foreach ($sizes as $size) {
                            if($size['quantidade'] == 0){ ?>
                            <?php }else{ ?>
                                <label>
                                    <input type="checkbox" name="sizeSelected[]" value="<?php echo $size['tamanho'] //this to send correctly id by "auto_increment" id of database ?>"> <?php echo $size['tamanho'];?>
                                </label>
                                <?php } ?>
                            <?php
                        } ?>
                    </div>

                    <!-- price product selected -->
                    <div class="cart-row-cell amount">
                        <p>R$ <span><?php echo $prod->getPrice()* $_SESSION['quantity']; ?></span></p>
                    </div>
                </div>
            </div>

            <div class="col-12">
                <div class="row center">

                    <!-- button to cancel selection -->
                    <div class="col-12 col-sm-4 center mt-3 mb-1">
                        <a href="salePage.php" class="btn btn-danger">Cancelar</a>
                    </div>

                    <!-- button to confirm selection -->
                    <div class="col-12 col-sm-4 center mt-2 mb-1">
                        <input type="submit" class="btn btn-success" value="Confirmar">
                    </div>
                </div>
            </div>

        </form>
    </div>
</main>
</body>
</html>