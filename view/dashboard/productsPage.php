<?php
@session_start();
include_once $_SERVER["DOCUMENT_ROOT"]."/project_PI/control/checkAuth.php";
include_once $_SERVER["DOCUMENT_ROOT"]."/project_PI/DAO/Productsbd.php";
include_once $_SERVER["DOCUMENT_ROOT"]."/project_PI/DAO/providersBd.php";

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
                <a href="index.php" class="navbar-brand d-flex d-lg-none me-4">
                    <h2 class="text-primary mb-0"><i class="fa fa-user-edit"></i></h2>
                </a>

                <a href="#" class="sidebar-toggler flex-shrink-0 mt-2 mb-2">
                    <i class="fa fa-bars"></i>
                </a>
            </nav>
            <!-- Navbar End -->

            
            <!-- Table Start -->
            <div class="container-fluid pt-4 px-4">
                <div class="row g-4">
                    
                    <div class="col-12">
                        <div class="bg-secondary rounded h-100 p-4">
                            <div class="row center">
                                <!-- 
                                    ===========================================================================================
                                    
                                    product registration message
                                 -->
                                <!-- successful registration message -->
                                <?php if (isset($_GET['SuccessRegister'])) { ?>
                                        <div class="alert alert-success alert-dismissible fade show d-flex align-items-center" role="alert">
                                            <i class="fa-solid fa-check d-flex align-items-center mr-2"></i>
                                            <strong> <?php echo $_GET['SuccessRegister']; ?> </strong>
                                            <button type="button" class="btn close" data-dismiss="alert" aria-label="Close">
                                                <span aria-hidden="true">&times;</span>
                                            </button>
                                        </div>
                                <?php } ?>
                                <!-- successful registration message -->


                                <!-- error message when registering the product, because of the database -->
                                <?php if (isset($_GET['ErrorRegister'])) { ?>
                                        <div class="alert alert-danger alert-dismissible fade show d-flex align-items-center" role="alert">
                                            <i class="fa-solid fa-triangle-exclamation d-flex align-items-center mr-2"></i>
                                            <strong> <?php echo $_GET['ErrorRegister']; ?> </strong>
                                            <button type="button" class="btn close" data-dismiss="alert" aria-label="Close">
                                                <span aria-hidden="true">&times;</span>
                                            </button>
                                        </div>
                                <?php } ?>
                                <!-- error message when registering the product, because of the database -->


                                <!-- Error when registering because I did not inform the necessary data -->
                                <?php if (isset($_GET['ErrorRegister2'])) { ?>
                                        <div class="alert alert-danger alert-dismissible fade show" role="alert">
                                            <div class="row center">
                                                <i class="fa-solid fa-triangle-exclamation d-flex align-items-center mr-2"></i>
                                                <strong> Erro ao cadastrar! </strong>
                                                <button type="button" class="btn close" data-dismiss="alert" aria-label="Close">
                                                    <span aria-hidden="true">&times;</span>
                                                </button>
                                            </div>
                                            <div class="row center mt-1">
                                            <p class="text-justify text-center font-weight-normal mb-0"><?php echo $_GET['ErrorRegister2']; ?></p>
                                            </div>
                                        </div>
                                <?php } ?>
                                <!-- Error when registering because I did not inform the necessary data -->


                                <!-- 
                                    ===========================================================================================
                                    
                                    product delete message
                                 -->
                                <!-- successful deletion message -->
                                <?php if (isset($_GET['successDelete'])) { ?>
                                        <div class="alert alert-success alert-dismissible fade show d-flex align-items-center" role="alert">
                                            <i class="fa-solid fa-check d-flex d-flex align-items-center mr-2"></i>
                                            <strong> <?php echo $_GET['successDelete']; ?> </strong>
                                            <button type="button" class="btn close" data-dismiss="alert" aria-label="Close">
                                                <span aria-hidden="true">&times;</span>
                                            </button>
                                        </div>
                                <?php } ?>
                                <!-- successful deletion message -->


                                <!-- error message when deleting product -->
                                <?php if (isset($_GET['errorDelete'])) { ?>
                                        <div class="alert alert-danger alert-dismissible fade show d-flex align-items-center" role="alert">
                                            <i class="fa-solid fa-triangle-exclamation d-flex align-items-center mr-2"></i>
                                            <strong> <?php echo $_GET['errorDelete']; ?> </strong>
                                            <button type="button" class="btn close" data-dismiss="alert" aria-label="Close">
                                                <span aria-hidden="true">&times;</span>
                                            </button>
                                        </div>
                                <?php } ?>
                                <!-- error message when deleting product -->

                                <!-- 
                                    ===========================================================================================
                                    
                                    product update message
                                 -->
                                <!-- successful update message -->
                                <?php if (isset($_GET['successUpdate'])) { ?>
                                        <div class="alert alert-success alert-dismissible fade show d-flex align-items-center" role="alert">
                                            <i class="fa-solid fa-check d-flex d-flex align-items-center mr-2"></i>
                                            <strong> <?php echo $_GET['successUpdate']; ?> </strong>
                                            <button type="button" class="btn close" data-dismiss="alert" aria-label="Close">
                                                <span aria-hidden="true">&times;</span>
                                            </button>
                                        </div>
                                <?php } ?>
                                <!-- successful update message -->


                                <!-- database error message -->
                                <?php if (isset($_GET['errorUpdate'])) { ?>
                                        <div class="alert alert-danger alert-dismissible fade show center" role="alert">                
                                            <i class="fa-solid fa-triangle-exclamation d-flex align-items-center mr-2"></i>
                                            <strong class="text-justify text-center"> <?php echo $_GET['errorUpdate']; ?> </strong>
                                            <button type="button" class="btn close" data-dismiss="alert" aria-label="Close">
                                                <span aria-hidden="true">&times;</span>
                                            </button>
                                        </div>
                                <?php } ?>
                                <!-- database error message -->
                                

                                <!-- database error message - 2 -->
                                <?php if (isset($_GET['errorUpdate2'])) { ?>
                                        <div class="alert alert-danger alert-dismissible fade show d-flex align-items-center" role="alert">
                                            <i class="fa-solid fa-triangle-exclamation d-flex align-items-center mr-2"></i>
                                            <strong> <?php echo $_GET['errorUpdate2']; ?> </strong>
                                            <button type="button" class="btn close" data-dismiss="alert" aria-label="Close">
                                                <span aria-hidden="true">&times;</span>
                                            </button>
                                        </div>
                                <?php } ?>
                                <!-- database error message - 2 -->


                                <!-- error message when updating product data -->
                                <?php if (isset($_GET['errorUpdate3'])) { ?>
                                        <div class="alert alert-danger alert-dismissible fade show d-flex align-items-center" role="alert">
                                            <i class="fa-solid fa-triangle-exclamation d-flex align-items-center mr-2"></i>
                                            <strong> <?php echo $_GET['errorUpdate3']; ?> </strong>
                                            <button type="button" class="btn close" data-dismiss="alert" aria-label="Close">
                                                <span aria-hidden="true">&times;</span>
                                            </button>
                                        </div>
                                <?php } ?>
                                <!-- error message when updating product data -->


                                <!-- error message for not having any fields filled in -->
                                <?php if (isset($_GET['errorUpdate4'])) { ?>
                                        <div class="alert alert-danger alert-dismissible fade show" role="alert">
                                            <div class="row center">
                                                <i class="fa-solid fa-triangle-exclamation d-flex align-items-center mr-2"></i>
                                                <strong class="text-center">Erro ao alterar informações!</strong>
                                                <button type="button" class="btn close" data-dismiss="alert" aria-label="Close">
                                                    <span aria-hidden="true">&times;</span>
                                                </button>
                                            </div>
                                            <div class="row center mt-1">
                                            <p class="text-justify text-center font-weight-normal mb-0"><?php echo $_GET['errorUpdate4']; ?></p>
                                            </div>
                                        </div>
                                <?php } ?>
                                <!-- error message for not having any fields filled in -->
                            </div>

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
                                            <th scope="col"> Nome </th>
                                            <th scope="col"> Preço </th>
                                            <th scope="col"> Quantidade em estoque</th>
                                            <th scope="col">Tamanhos</th>
                                            <th scope="col">Fornecedor</th>
                                            <th scope="col">Ações</th>
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
                                            <td> <?php echo "R$ ".$prod -> getPrice().",00";?> </td>
                                            <td> <?php $amountTotal = 0; foreach ($prod -> getSizes_Amounts() as $listAm) { $amountTotal += $listAm[1]."  ";} echo $amountTotal; ?> </td>
                                            <td> <?php foreach ($prod -> getSizes_Amounts() as $listSz) { echo $listSz[0]."  ";} ?> </td>
                                            <!-- getting the provider name with relation of these models -->
                                            <td> <?php echo getProvider($prod->getProviderId())->getName();?> </td>

                                            <td>
                                                <div class="btn-group" role="group" aria-label="Basic example">
                                                    <a class="btn btn-sm btn-plus-action" id="btnAlterProd" data-bs-toggle="modal" data-bs-target="#PopUp_alter" onclick="getProductData(<?php echo $prod -> getId(); ?>)">alterar</a>
                                                    <a class="btn btn-sm btn-plus-action" href="../../control/products_delete.php?id=<?php echo $prod ->getId(); ?>">Excluir</a>
                                                </div>
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
    <!-- Importing popup file -->
    <?php
        require_once "popUps/popUp-register.php";
        include_once "popUps/popUp-change.php";
    ?>
    </div>

    <!-- JavaScript Libraries -->
    <script src="https://code.jquery.com/jquery-3.6.1.js" integrity="sha256-3zlB5s2uwoUzrXK3BT7AX3FyvojsraNFxCc2vC/7pNI=" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0/dist/js/bootstrap.bundle.min.js"></script>
    <script src="../js/bootstrap.min.js"></script>
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

        //product image to register

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

        /**
         * =====================================================
         * 
         * image that will be changed for the product
         */
        let changeImgselected = document.querySelector('#changeImgSelected');
        let changeInputImage = document.querySelector('#changeImgProduct');
        var changeImgSelect = document.querySelector('#changeImgSelect');
        changeInputImage.addEventListener('click', () => {
            changeInputImage.click();
        });
        changeInputImage.addEventListener('change', (e) => {
            
        let reader = new FileReader();
        reader.onload = () => {
            changeImgselected.src = reader.result;
            changeImgSelect.style.display = 'none';
            changeImgselected.style.display = 'flex';
        }
        reader.readAsDataURL(changeInputImage.files[0]);
        })
    </script>
</body>
</html>