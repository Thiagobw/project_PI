<?php
@session_start();
// include_once $_SERVER["DOCUMENT_ROOT"] . "/project_PI/control/control_cart.php";
include_once $_SERVER["DOCUMENT_ROOT"] . "/project_PI/DAO/productsBd.php";
include_once $_SERVER["DOCUMENT_ROOT"] . "/project_PI/DAO/imagesBd.php";
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

<body class="bg-secondary">

    <header>
        <?php
        require_once "navbar/navbarSalePage.php";
        include "../view/pop-upAccount.php";
        ?>
    </header>

    <!-- products list -->
    <main class="container mt-5">
        <div class="row">
            <?php if (empty($productsList) == true) { ?>

                <!-- message of no product available for sale -->
                <div class="col-12 center">
                    <div class="alert alert-danger" role="alert">
                        <h3 class="text-center">nenhum produto cadastrado para venda!</h3>
                    </div>
                </div>
                <!-- message of no product available for sale -->

                <?php } else {
                    foreach ($productsList as $prod) {
                        $image = selectImage($prod->getImagemId());
                        $sizes = seeSizeAvaliable($prod->getId());
                        ?>


                        <div class="col-lg-4 col-md-6 pl-3 pr-3 pb-3">
                            <form class="shadow" method="POST" action="/project_PI/control/control_cart.php">
                                <div class="card d-flex flex-column align-items-center">
                                    <div class="product-name">
                                        <?php echo $prod->getName() ?>
                                    </div>
                                    
                                    <div class="card-img">
                                        <?php list($l, $a) = getimagesize("../uploads/".$image->getName());
                                        echo "dimensões: ".$l."X".$a;
                                        
                                        ?>

                                        <img class="img-fluid w-100" src="/project_PI/uploads/<?php echo $image->getName(); ?>" alt="">
                                    </div>
                                        
                                    <div class="row price">
                                         R$ <span> <?php echo $prod->getPrice().',00'; ?></span>
                                    </div>

                                    <div class="row mt-2">
                                        <div class="col-12 form-group">
                                        <label class="ml-1" for="quantity">Quantidade </label>
                                        <input class="form-control" type="number" name="quantity" value="1" min="1">
                                        </div>
                                    </div>
                                
                                    <div class="row mt-1">
                                        <div class="col-12 center">
                                            <label class="small font-weight-bold" for="size">
                                                Tamanhos disponiveis:
                                            </label>
                                        </div>
                                        <div class="col-12 center">
                                            <p>
                                                <?php foreach ($sizes as $size) { ?>
                                                <?php if ($size['quantidade'] <= 0) {

                                                    } else { ?>

                                                        <a class="small m-1" id="size">
                                                            <?php echo $size['tamanho']; ?>
                                                        </a>

                                                <?php } ?>
                                                <?php } ?>
                                            </p>
                                        </div>
                                    </div>
                                    
                                    <div class="row">
                                        <button name="product_id" class="btn w-100" id="btn-add" value="<?php echo $prod->getId() ?>" name="selectSize">
                                            <i class="fa-solid fa-cart-plus"></i> Adicionar
                                        </button>
                                    </div>
                                </div>
                            </form>
                        </div>

                <?php }} ?>
        </div>
    </main>
    


    <!-- product pagination -->
    <!--<footer class="container-fluid mt-4 mb-1">
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
    </footer>-->

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