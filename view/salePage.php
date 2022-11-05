<?php
session_start();
include_once $_SERVER["DOCUMENT_ROOT"]."/project_PI/control/checkAuth.php";
include_once $_SERVER["DOCUMENT_ROOT"]."/project_PI/DAO/productsBd.php";

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=, initial-scale=1.0">
    
    <link rel="stylesheet" href="css/bootstrap.css">

    <link rel="stylesheet" href="css/styleSalePage.css">

    <title>LA Imports - Vender</title>
</head>
<body>

<header>
    <?php
    require_once "navbar/navbarSalePage.php";
    ?>
</header>

<!-- products -->
<main class="mt-1">
    <div class="container-fluid center">
        <div class="col-12 col-sm-11 col-md-11 col-lg-10 col-xl-11">
            <div class="row justify-content-around">

                <div class="col-11 col-sm-6 col-md-6 col-lg-4 col-xl-3 col-xxl-2 bg-prod">
                    <div class="row">
                        <div class="col-12 col-sm-11 col-xl-10 bg-white prod mt-4">
                            <div class="row center mb-2 mt-2">
                                <img class="img-fluid img" src="img/products/tenis 1.jpg" alt="">
                            </div>

                            <div class="col-12 dividing-line"></div>

                            <div class="row mt-3">
                                <div class="col-12 ">

                                    <p class="text-center">Nike Air Jordan High 1 Tie Dye - unissex</p>
                                    <p class="text-center price">R$ <span>400,00</span></p>
                                </div>
                            </div>
                            <div class="row center mb-2">
                                <div class="col-12 btn-group center">
                                    <button class="btn btnADD"><span><img class="img-fluid" src="img/icons/icon_AddShoppingCart.png" alt="" height='27' width='27'></span> Adicionar ao carrinho</button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </div>
</main>

<!-- product pagination -->
<footer class="container-fluid mt-4 mb-1">
    <div class="col-12 center">
        <nav style="border: none !important;">
            <ul class="pagination">
                <li class="page-item">
                    <a class="page-link" href="">
                        <span aria-hidden="true">&laquo;</span>
                    </a>
                </li>
                <li class="page-item activated"><a class="page-link" href="">1</a></li>
                <li class="page-item"><a class="page-link" href="">2</a></li>
                <li class="page-item"><a class="page-link" href="">3</a></li>
                <li class="page-item">
                    <a class="page-link" href="">
                        <span aria-hidden="true">&raquo;</span>
                    </a>
                </li>
            </ul>
        </nav>
    </div>
</footer>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" 
integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js"></script>
<script src="https://code.jquery.com/jquery-3.6.1.js" integrity="sha256-3zlB5s2uwoUzrXK3BT7AX3FyvojsraNFxCc2vC/7pNI=" crossorigin="anonymous"></script>
<script src="https://kit.fontawesome.com/d368f48e5f.js" crossorigin="anonymous"></script>

<script>
    const activate = (element) => {
        let itens = document.getElementsByClassName("page-item");
        for (i = 0; i<itens.length; i++) {
            itens[i].classList.remove("activated");
        }
        element.classList.add("activated");
    }
</script>
</body>
</html>