<?php
@session_start();
include_once $_SERVER["DOCUMENT_ROOT"]."/project_PI/control/checkAuth.php";
include_once $_SERVER["DOCUMENT_ROOT"]."/project_PI/DAO/productsBd.php";

$productsList = search_products();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=, initial-scale=1.0">
	<link rel="stylesheet" href="img/icons/fontawesome/css/all.min.css">
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

<!-- products list -->
<main class="container mt-5">
    <?php if (  empty($productsList) == true) { ?>
        <h3>nenhum produto cadastrado para venda!</h3>
    <?php } else { 
        foreach ($productsList as $prod) { 
    ?>
    <div class="row mx-0">
        <div class="col-lg-4 col-md-6 pt-md-0 pt-3">
            <div class="card d-flex flex-column align-items-center">
                <div class="product-name">Nike Tshirts for Men</div>
                <div class="card-img">
                    <img class="img-fluid w-100" src="img/products/tenis 1.jpg" alt="">
                </div>
                <div class="row price">
                    R$ <span> <?php echo $prod->getPrice(); ?></span>
                </div>
                <div class="row">
                    <a class="btn btn-success w-100" href="productSelected.php" id="btn-add">
                        <i class="fa-solid fa-cart-plus"></i> Selecionar
                    </a>
                </div>
            </div>
        </div>
    </div>
<?php }} ?>
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