<?php
@session_start();
include_once $_SERVER["DOCUMENT_ROOT"]."/project_PI/control/checkAuth.php";
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
    <title>Document</title>
</head>
<body>
<header class="row mb-3 mt-2 ml-0 mr-0">
    <div class="col-12 center">
        <h3>Produto selecionado</h3>
    </div>
</header>
<main class="container">
    <div class="row">
        <div class="col-12 cart-body">
        <!-- product product in cart -->
            <div class="cart-item">
                <!-- Product information -->
                <div class="row cart-row">
                    <div class="cart-row-cell pic">
                        <span>
                            <!-- product image -->
                            <img src="img/products/tenis 1.jpg" alt="">
                        </span>
                    </div>
                    <!-- name product -->
                    <div class="cart-row-cell desc">
                        <h6> Nome do produto</h6>
                    </div>
                    <div class="cart-row-cell amount">
                        <p>R$ <span>13,87</span></p>
                    </div>
                </div>
            </div>

            <div class="col-12">
                <div class="row center">

                    <!-- button to cancel selection -->
                    <div class="col-12 col-sm-4 center mt-3 mb-1">
                        <a href="" class="btn btn-danger">Cancelar</a>
                    </div>

                    <!-- button to confirm selection -->
                    <div class="col-12 col-sm-4 center mt-2 mb-1">
                        <a href="" class="btn btn-success">Confirmar</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</main>
</body>
</html>