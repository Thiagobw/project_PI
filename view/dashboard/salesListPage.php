<?php
@session_start();
include_once $_SERVER["DOCUMENT_ROOT"] . "/project_PI/control/checkAuth.php";
include_once $_SERVER["DOCUMENT_ROOT"] . "/project_PI/DAO/productsbd.php";
include_once $_SERVER["DOCUMENT_ROOT"] . "/project_PI/DAO/salesBd.php";
include_once $_SERVER["DOCUMENT_ROOT"] . "/project_PI/DAO/usuarioBd.php";
include_once $_SERVER["DOCUMENT_ROOT"] . "/project_PI/DAO/customersBd.php";
include_once $_SERVER["DOCUMENT_ROOT"] . "/project_PI/DAO/employeesBd.php";

$products = search_products();
$sales =  search_sales();
?>
<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="utf-8">
    <title>LA Imports - lista de vendas</title>
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
                <a href="#" class="navbar-brand d-flex d-lg-none me-4">
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
                                    
                                    sales message
                                 -->
                                <!-- successful sale message -->
                                <?php if (isset($_GET['SuccessSale'])) { ?>
                                        <div class="alert alert-success alert-dismissible fade show d-flex align-items-center" role="alert">
                                            <i class="fa-solid fa-check d-flex align-items-center mr-2"></i>
                                            <strong> <?php echo $_GET['SuccessSale']; ?> </strong>
                                            <button type="button" class="btn close" data-dismiss="alert" aria-label="Close">
                                                <span aria-hidden="true">&times;</span>
                                            </button>
                                        </div>
                                <?php } ?>
                                <!-- successful sale message -->

                                <!-- 
                                    ===========================================================================================
                                    
                                    sales delete message
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


                                <!-- error message when deleting sale -->
                                <?php if (isset($_GET['errorDelete'])) { ?>
                                        <div class="alert alert-danger alert-dismissible fade show d-flex align-items-center" role="alert">
                                            <i class="fa-solid fa-triangle-exclamation d-flex align-items-center mr-2"></i>
                                            <strong> <?php echo $_GET['errorDelete']; ?> </strong>
                                            <button type="button" class="btn close" data-dismiss="alert" aria-label="Close">
                                                <span aria-hidden="true">&times;</span>
                                            </button>
                                        </div>
                                <?php } ?>
                                <!-- error message when deleting sale -->
                            </div>

                            <div class="row top-table">
                                <div class="col-12 col-xl-12" style="padding: 0;">
                                    <div class="col-12 col-xl-10 mb-3">
                                        <h6 class=" ml-1 text-center text-white" style="font-size: larger;">Lista de Vendas</h6>
                                    </div>
                                </div>
                            </div>
                            <div class="table-responsive">
                                <table class="table text-secondary">
                                    <thead>
                                        <tr>
                                            <th scope="col">Data</th>
                                            <th scope="col">Valor</th>
                                            <th scope="col">Forma de Pagamento</th>
                                            <th scope="col">Nome do Vendedor</th>
                                            <th scope="col">Nome do Comprador</th>
                                            <th scope="col">Ações</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php
                                        if (empty($sales) == true) {
                                        ?>

                                            <tr>
                                                <td class="text-white text-center" colspan="6">Nenhuma venda cadastrada!</td>
                                            </tr>

                                            <?php


                                        } else {

                                            foreach ($sales as $sale) {

                                            ?>
                                                <tr>
                                                    <td> <?php echo $sale->getDate(); ?> </td>
                                                    <td> <?php echo "R$ " . $sale->getValueOrder() . ",00"; ?> </td>
                                                    
                                                    <td> <?php echo $sale->getPaymentMethod(); ?>
                                                    </td>
                                                    
                                                    <td> <?php echo getEmploye($sale->getEmployeeId())->getName(); ?> </td>
                                                    <td> <?php echo getCustomer($sale->getCustomerId())->getName(); ?> </td>

                                                    

                                                    <td>
                                                        <div class="btn-group" role="group" aria-label="Basic example">
                                                            <a class="btn btn-sm btn-plus-action" href="../../control/sales_delete.php?id=<?php echo $sale->getId(); ?>">Excluir</a>
                                                        </div>
                                                    </td>
                                                </tr>

                                        <?php }
                                        } ?>

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