<?php
include_once $_SERVER["DOCUMENT_ROOT"] . '/project_PI/DAO/cartBd.php';
if (isset($_SESSION['cart'], $user['id_usuario'])) :
    $cart = $_SESSION['cart'];
    $count = count($cart);
elseif (isset($user['id_usuario'])) :
    $cart = seeCartItems($user['id_usuario']);
    $count = count($cart);
else :
    $count = '0';
endif;
?>
<!-- Navbar -->
<nav class="navbar navbar-expand-lg navbar-light bg-white">
    <!-- Container wrapper -->
    <div class="container-fluid">
        <!-- Navbar brand, logo -->

        <a class="navbar-brand logo" href="#">
            <img class="img-fluid ml-2" src="../view/img/img_logo.png" height="90" width="90" alt="" />
        </a>
        <!-- button responsive -->
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavDarkDropdown" aria-controls="navbarNavDarkDropdown" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>

        <!-- Collapsible wrapper -->
        <div class="collapse navbar-collapse justify-content-between" id="navbarNavDarkDropdown">

            <!-- Left space -->
            <div></div>
            <!-- Left space -->

            <!-- Search form -->
            <form class="d-flex input-group w-auto pesquisa">
                <input type="search" class="form-control w-auto h-auto" placeholder="Pesquisar" aria-label="Search" />
                <button class="btn" type="button" data-mdb-ripple-color="dark">
                    <img class="img-fluid" src="img/icons/search_Icon.png" alt="" height='22' width='22'>
                </button>
            </form>

            <div class=" navbar-nav mb-2 mb-lg-0 mr-3">
                <li class="nav-item mr-1">
                    <a class="nav-link cart" href="/project_PI/view/oldCart.php">
                        <img class="img-fluid" src="img/icons/shopping_cart_FILL0_wght400_GRAD0_opsz40.svg" alt="" height='27' width='27'>
                        <span class="badge badge-danger">
                            <?php echo $count; ?>
                        </span>
                        Carrinho
                    </a>
                </li>
                <li class="nav-item dropdown">
                    <?php
                    if (checkAuth()) :
                    ?>
                        <a class="nav-link menu-cad" href="./dashboard">
                            <i class="fa-regular fa-user" style="color: black !important;"></i> <?php echo $shortName; ?>
                        </a>
                    <?php else : ?>
                        <a class="nav-link dropdown-toggle menu-cad" href="#" id="navbarDropdownMenu" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                            <i class="fa-solid fa-user" style="color: black !important;"></i> Entre ou Cadastre-se
                        </a>
                        <ul class="dropdown-menu" aria-labelledby="navbarDropdownMenu">
                            <li><a class="dropdown-item" href="#" data-bs-toggle="modal" data-bs-target="#pop-upAccount" id="btnLogin">Entrar</a></li>
                            <li>
                                <hr class="dropdown-divider">
                            </li>
                            <li><a class="dropdown-item" href="#" data-bs-toggle="modal" data-bs-target="#pop-upAccount" id="btnRegister">Cadastre-se</a></li>
                        </ul>
                    <?php endif; ?>
                </li>
            </div>
        </div>
        <!-- Collapsible wrapper-->
    </div>
    <!-- Container wrapper -->
</nav>
<!-- Navbar -->