<?php
session_start();
// include_once $_SERVER["DOCUMENT_ROOT"] . "/project_PI/control/control_cart.php";
include_once $_SERVER["DOCUMENT_ROOT"] . "/project_PI/DAO/productsBd.php";
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
    <form method="POST" action="/project_PI/control/control_cart.php">

        <main class="container mt-5">
            <?php if (empty($productsList) == true) { ?>
                <h3>nenhum produto cadastrado para venda!</h3>
                <?php } else {
                foreach ($productsList as $prod) { ?>
                    <div class="row mx-0">
                        <div class="col-lg-4 col-md-6 pt-md-0 pt-3">
                            <div class="card d-flex flex-column align-items-center">
                                <div class="product-name"><?php echo $prod->getName() ?></div>
                                <div class="card-img">
                                    <img class="img-fluid w-100" src="img/products/tenis 1.jpg" alt="">
                                </div>
                                <div class="row price">
                                    R$ <span>
                                        <?php echo $prod->getPrice(); ?>
                                    </span>
                                </div>
                                <div>
                                    <label for="quantity">
                                        Quantidade
                                    </label>
                                    <input type="number" name="quantity" value="1" min="1">
                                </div>

                                <div class="row">
                                    <button class="btn w-100" id="btn-add" name="product_id" name="selectSize" value="<?php echo $prod->getId()?>">
                                        <i class="fa-solid fa-cart-plus"></i> Adicionar
                                    </button>
                                </div>
                            </div>
                        </div>
                    </div>
            <?php }
            } ?>
        </main>
    </form>


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

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js"></script>
    <script src="https://code.jquery.com/jquery-3.6.1.js" integrity="sha256-3zlB5s2uwoUzrXK3BT7AX3FyvojsraNFxCc2vC/7pNI=" crossorigin="anonymous"></script>
    <script src="https://kit.fontawesome.com/d368f48e5f.js" crossorigin="anonymous"></script>

    <script>
        const activate = (element) => {
            let itens = document.getElementsByClassName("page-item");
            for (i = 0; i < itens.length; i++) {
                itens[i].classList.remove("activated");
            }
            element.classList.add("activated");
        }
    </script>
</body>

</html>