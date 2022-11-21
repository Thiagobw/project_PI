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
    <link rel="stylesheet" href="css/styleCart.css">
    <link href="https://fonts.googleapis.com/css?family=Raleway" rel="stylesheet">
    <title>LA Imports - carrinho</title>
</head>
<body>
<header class="row mb-3 mt-2 ml-0 mr-0">
    <div class="col-12 center">
        <h3>Carrinho de Compras</h3>
    </div>
</header>

<main class="container">
    <div class="row">
        <div class="col-12 col-md-7 cart-body">
        <!-- product product in cart -->
            <div class="cart-item">
                <!-- Product information -->
                <div class="row cart-row">
                    <div class="col-12 col-sm-2 pic">
                        
                    <!-- btn btn to remove product -->
                        <a class="btn btn-danger center" id="btnRemove" href="#">X</a>
                        <span>
                            <!-- product image -->
                            <img src="img/products/tenis 1.jpg" alt="">
                        </span>
                    </div>
                    <!-- name product -->
                    <div class="col-12 col-sm-10 desc">
                        <h6> Nome do produto</h6>
                    </div>
                    <div class="cart-row-cell quant">
                        <ul>
                            <li><a href="#">-</a></li>
                            <li>2</li>
                            <li><a href="#">+</a></li>
                        </ul>
                    </div>
                    <div class="cart-row-cell amount">
                        <p>R$ <span>13,87</span></p>
                    </div>
                </div>
            </div>
        </div>
        <!-- full cart information -->
        <footer class="col-12 col-md-5">
            <div class="row center">
                <div class="col-10 col-sm-9 col-md-8 totals">
                    <p class="total-label">Total</p>
                    <p class="total-amount">R$ 
                        
                        <!-- total value of items in cart -->
                        <span>13,87</span>
                    </p>
                </div>
            </div>
            <a class="btn btn-primary mt-3" href="">Finalizar a venda</a>
        </footer>
    </div>
</main>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" 
integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js"></script>
<script src="https://code.jquery.com/jquery-3.6.1.js" integrity="sha256-3zlB5s2uwoUzrXK3BT7AX3FyvojsraNFxCc2vC/7pNI=" crossorigin="anonymous"></script>
</body>
</html>