<?php
session_start();
include_once $_SERVER["DOCUMENT_ROOT"]."/project_PI/control/checkAuth.php";
include_once $_SERVER["DOCUMENT_ROOT"]."/project_PI/DAO/Productsbd.php";

$productsList = search_products();


?>
<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="utf-8">
    <title>LA Imports - Produtos</title>
    <meta content="width=device-width, initial-scale=1.0" name="viewport">
    <meta content="" name="keywords">
    <meta content="" name="description">

    <!-- Google Web Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Open+Sans:wght@400;600&family=Roboto:wght@500;700&display=swap"> 
    
    <!-- Icon Font Stylesheet -->
    <link rel="stylesheet" href="../img/icons/fontawesome/css/all.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.4.1/font/bootstrap-icons.css">

    <!-- Libraries Stylesheet -->
    <link rel="stylesheet" href="lib/owlcarousel/assets/owl.carousel.min.css">
    <link rel="stylesheet" href="lib/tempusdominus/css/tempusdominus-bootstrap-4.min.css">

    <!-- Customized Bootstrap Stylesheet -->
    <link rel="stylesheet" href="../css/bootstrap.min.css">
    

    <!-- Template Stylesheet -->
    <link rel="stylesheet" href="css/style.css">
</head>

<body>
    <div class="container-fluid position-relative d-flex p-0">
        <!-- Spinner Start -->
        <div id="spinner" class="show bg-dark position-fixed translate-middle w-100 vh-100 top-50 start-50 d-flex align-items-center justify-content-center">
            <div class="spinner-border text-primary" style="width: 3rem; height: 3rem;" role="status">
                <span class="sr-only">Loading...</span>
            </div>
        </div>
        <!-- Spinner End -->


        <!-- Sidebar Start -->
        <?php
            require_once "sidebar.php";
        ?>
        <!-- Sidebar End -->


        <!-- Content Start -->
        <div class="content">
            <!-- Navbar Start -->
            <nav class="navbar navbar-expand bg-secondary navbar-dark sticky-top px-4 py-0">
                <a href="index.html" class="navbar-brand d-flex d-lg-none me-4">
                    <h2 class="text-primary mb-0"><i class="fa fa-user-edit"></i></h2>
                </a>

                <a href="#" class="sidebar-toggler flex-shrink-0">
                    <i class="fa fa-bars"></i>
                </a>

                <div class="navbar-nav align-items-center ms-auto">
                    <div class="nav-item dropdown">
                        <a href="#" class="nav-link dropdown-toggle" data-bs-toggle="dropdown">
                            <i class="fa fa-envelope me-lg-2"></i>
                            <span class="d-none d-lg-inline-flex">Mensagem</span>
                        </a>
                        <div class="dropdown-menu dropdown-menu-end bg-secondary border-0 rounded-0 rounded-bottom m-0">
                            <a href="#" class="dropdown-item">
                                <div class="d-flex align-items-center">
                                    <img class="rounded-circle" src="img/user.jpg" alt="" style="width: 40px; height: 40px;">
                                    <div class="ms-2">
                                        <h6 class="fw-normal mb-0">Jhon te mandou uma mensagem</h6>
                                        <small>Há 12 minutos</small>
                                    </div>
                                </div>
                            </a>
                            <hr class="dropdown-divider">
                            <a href="#" class="dropdown-item">
                                <div class="d-flex align-items-center">
                                    <img class="rounded-circle" src="img/user.jpg" alt="" style="width: 40px; height: 40px;">
                                    <div class="ms-2">
                                        <h6 class="fw-normal mb-0">Jhon te mandou uma mensagem</h6>
                                        <small>Há 15 minutos</small>
                                    </div>
                                </div>
                            </a>
                            <hr class="dropdown-divider">
                            <a href="#" class="dropdown-item">
                                <div class="d-flex align-items-center">
                                    <img class="rounded-circle" src="img/user.jpg" alt="" style="width: 40px; height: 40px;">
                                    <div class="ms-2">
                                        <h6 class="fw-normal mb-0">Jhon te mandou uma mensagem</h6>
                                        <small>Há 20 minutos</small>
                                    </div>
                                </div>
                            </a>
                            <hr class="dropdown-divider">
                            <a href="#" class="dropdown-item text-center">Ver todas mensagem</a>
                        </div>
                    </div>
                    <div class="nav-item dropdown">
                        <a href="#" class="nav-link dropdown-toggle" data-bs-toggle="dropdown">
                            <i class="fa fa-bell me-lg-2"></i>
                            <span class="d-none d-lg-inline-flex">Notificações</span>
                        </a>
                        <div class="dropdown-menu dropdown-menu-end bg-secondary border-0 rounded-0 rounded-bottom m-0">
                            <a href="#" class="dropdown-item">
                                <h6 class="fw-normal mb-0">Perfil auterado</h6>
                                <small>Há 15 minutos</small>
                            </a>
                            <hr class="dropdown-divider">
                            <a href="#" class="dropdown-item">
                                <h6 class="fw-normal mb-0">Novo usuario adicionado</h6>
                                <small>Há 15 minutos</small>
                            </a>
                            <hr class="dropdown-divider">
                            <a href="#" class="dropdown-item">
                                <h6 class="fw-normal mb-0">Senha alterada</h6>
                                <small>Há 15 minutos</small>
                            </a>
                            <hr class="dropdown-divider">
                            <a href="#" class="dropdown-item text-center">Ver todas notificações</a>
                        </div>
                    </div>
                </div>
            </nav>
            <!-- Navbar End -->

            <!-- Importing popup file -->
            <?php
                require_once "popUps/popUp-register.php";
                include_once "popUps/popUp-change.php";
            ?>
            <!-- Table Start -->
            <div class="container-fluid pt-4 px-4">
                <div class="row g-4">
                    
                    <div class="col-12">
                        <div class="bg-secondary rounded h-100 p-4">
                            <div class="row top-table">
                                <div class="col-12 col-xl-12" style="padding: 0;">
                                    <div class="col-12 col-xl-10 mb-3">
                                        <h6 class=" ml-1 text-center text-white" style="font-size: larger;">Lista de Produtos</h6>
                                    </div>
                                    <div class="col-1 btn-register mb-2">
                                        <button type="button" id="btnRegisterProd" data-bs-toggle="modal" data-bs-target="#PopUp_register"><i class="fa-solid fa-gift"></i> +</button>
                                    </div>
                                </div>
                            </div>
                            <div class="table-responsive">
                                <table class="table text-secondary">
                                    <thead>
                                        <tr>
                                            <th scope="col">Nome</th>
                                            <th scope="col">Quantidade em estoque</th>
                                            <th scope="col">Preço</th>
                                            <th scope="col">Tamnhos</th>
                                            <th scope="col"></th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                    <?php 
                                        if (  empty($productsList) == true) {
                                    ?>
                                    
                                    <tr>
                                        <td class="text-white text-center" colspan="6">Nenhum produto cadastrado!</td>
                                    </tr>

                                    <?php 
                                    
                                    } else{

                                     foreach ($productsList as $prod) {
   
                                    ?>
                                        <tr>
                                            <td> <?php echo $prod -> getName(); ?></td>
                                            <td> <?php echo $prod -> getAmountTotal();?> </td>
                                            <td> <?php echo $prod -> getPrice();?> </td>
                                            <td> <?php //echo $prod -> getTamanho();?> </td>

                                            <td class="">
                                                <a class="btn btn-plus-options" href=""><i class="fa-solid fa-plus"></i></a>
                                                <a class="btn btn-plus-options" href="../../control/products_delete.php?id=<?php echo $prod ->getId(); ?>"><i class="fa-solid fa-xmark"></i></a>
                                                <a class="btn btn-plus-options" id="btnAlterProd" data-bs-toggle="modal" data-bs-target="#PopUp_alter" href="" onclick="getProductData(<?php echo $prod -> getId(); ?>)"><i class="fa-solid fa-pen-to-square"></i></a>
                                            </td>
                                        </tr>
                                     
                                     <?php }} ?>

                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- Table End -->
            
        </div>
        <!-- Content End -->


        <!-- Back to Top -->
        <a href="#" class="btn btn-lg btn-primary btn-lg-square back-to-top"><i class="bi bi-arrow-up"></i></a>
    </div>

    <!-- JavaScript Libraries -->
    <script src="https://code.jquery.com/jquery-3.6.1.js" integrity="sha256-3zlB5s2uwoUzrXK3BT7AX3FyvojsraNFxCc2vC/7pNI=" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0/dist/js/bootstrap.bundle.min.js"></script>
    <script src="lib/chart/chart.min.js"></script>
    <script src="lib/easing/easing.min.js"></script>
    <script src="lib/waypoints/waypoints.min.js"></script>
    <script src="lib/owlcarousel/owl.carousel.min.js"></script>
    <script src="lib/tempusdominus/js/moment.min.js"></script>
    <script src="lib/tempusdominus/js/moment-timezone.min.js"></script>
    <script src="lib/tempusdominus/js/tempusdominus-bootstrap-4.min.js"></script>

    <!-- Template Javascript -->
    <script src="js/main.js"></script>

    <script>
            var btn = document.querySelector('#btnRegisterProd');

            btn.addEventListener('click', function() {

            const contentR = document.querySelector('#contentRegisterProd');
            contentR.style.display = 'flex';

            const ttlR = document.querySelector('#ttl-products');
            ttlR.style.display = 'flex';
        })
    </script>

    <script>
        let imgselected = document.querySelector('#imgSelected');
        let inputImage = document.querySelector('#imgProduct');
        var imgSelect = document.querySelector('#imgSelect');
        inputImage.addEventListener('click', () => {
            inputImage.click();
        });
        inputImage.addEventListener('change', (e) => {
            
        let reader = new FileReader();
        reader.onload = () => {
            imgselected.src = reader.result;
            imgSelect.style.display = 'none';
            imgselected.style.display = 'flex';
        }
        reader.readAsDataURL(inputImage.files[0]);
        })
    </script>
</body>
</html>