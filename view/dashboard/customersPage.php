<?php
@session_start();
include_once $_SERVER["DOCUMENT_ROOT"]."/project_PI/control/checkAuth.php";
include_once ('../../DAO/customersBd.php');

$customersList = search_customers();
?>
<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="utf-8">
    <title>LA Imports - Clientes</title>
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
                    <div class="col-12 col-sm-12 col-xl-12">
                        <div class="bg-secondary rounded h-100 p-4">
                            <div class="row center">
                                <!-- 
                                    ===========================================================================================
                                    
                                    customers registration message
                                 -->
                                 <!-- successful registration message -->
                                <?php if (isset($_GET['SuccessRegister'])) { ?>
                                    <div>
                                        <div class="alert alert-success alert-dismissible fade show d-flex align-items-center" role="alert">
                                            <i class="fa-solid fa-check d-flex align-items-center mr-2"></i>
                                            <strong> <?php echo $_GET['SuccessRegister']; ?> </strong>
                                            <button type="button" class="btn close" data-dismiss="alert" aria-label="Close">
                                                <span aria-hidden="true">&times;</span>
                                            </button>
                                        </div>
                                    </div>
                                <?php } ?>
                                <!-- successful registration message -->

                                <?php if (isset($_GET['ErrorRegister'])) { ?>
                                        <div class="alert alert-danger alert-dismissible fade show d-flex align-items-center" role="alert">
                                            <i class="fa-solid fa-triangle-exclamation d-flex align-items-center mr-2"></i>
                                            <strong> <?php echo $_GET['ErrorRegister']; ?> </strong>
                                            <button type="button" class="btn close" data-dismiss="alert" aria-label="Close">
                                                <span aria-hidden="true">&times;</span>
                                            </button>
                                        </div>
                                <?php } ?>

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

                                <!-- 
                                    ===========================================================================================
                                    customer delete message
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

                                <!-- error message when deleting customer -->
                                <?php if (isset($_GET['errorDelete'])) { ?>
                                        <div class="alert alert-danger alert-dismissible fade show d-flex align-items-center" role="alert">
                                            <i class="fa-solid fa-triangle-exclamation d-flex align-items-center mr-2"></i>
                                            <strong> <?php echo $_GET['errorDelete']; ?> </strong>
                                            <button type="button" class="btn close" data-dismiss="alert" aria-label="Close">
                                                <span aria-hidden="true">&times;</span>
                                            </button>
                                        </div>
                                <?php } ?>
                                <!-- error message when deleting customer -->

                                <!-- 
                                    ===========================================================================================
                                    customer update message
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


                                <!-- error message for not having any fields filled in -->
                                <?php if (isset($_GET['errorUpdate2'])) { ?>
                                        <div class="alert alert-danger alert-dismissible fade show" role="alert">
                                            <div class="row center">
                                                <i class="fa-solid fa-triangle-exclamation d-flex align-items-center mr-2"></i>
                                                <strong class="text-center">Erro ao alterar informa????es!</strong>
                                                <button type="button" class="btn close" data-dismiss="alert" aria-label="Close">
                                                    <span aria-hidden="true">&times;</span>
                                                </button>
                                            </div>
                                            <div class="row center mt-1">
                                            <p class="text-justify text-center font-weight-normal mb-0"><?php echo $_GET['errorUpdate2']; ?></p>
                                            </div>
                                        </div>
                                <?php } ?>
                                <!-- error message for not having any fields filled in -->
                            </div>

                            <div class="row top-table">
                                <div class="col-12 col-xl-12" style="padding: 0;">
                                    <div class="col-12 col-xl-10 mb-3">
                                        <h6 class=" ml-1 text-center text-white" style="font-size: larger;">Lista de Clientes</h6>
                                    </div>
                                    <div class="col-1 btn-register mb-2">
                                        <button type="button" id="btnRegisterCust" data-bs-toggle="modal" data-bs-target="#PopUp_register"><i class="fa-solid fa-user"></i> +</button>
                                    </div>
                                </div>
                            </div>
                            <div class="table-responsive">
                                <table class="table table-hover text-secondary">
                                    <thead class="text-center">
                                        <tr>
                                            <th scope="col">Nome do cliente</th>
                                            <th scope="col">CPF</th>
                                            <th scope="col">Email</th>
                                            <th scope="col">Telefone</th>
                                            <th scope="col">A????es</th>
                                        </tr>
                                    </thead>

                                    <tbody class="text-center">
                                        <?php
                                        if (empty($customersList) == true) {
                                        ?>

                                        <tr>
                                            <td class="text-white text-center" colspan="6">Nenhum Cliente cadastrado!</td>
                                        </tr>
                                        
                                        <?php

                                        } else{

                                        foreach($customersList as $cliente) {

                                        ?>
                                            <tr>
                                                <td> <?php echo $cliente -> getName(); ?></td>
                                                <td> <?php echo $cliente -> getCpf();?> </td>
                                                <td> <?php echo $cliente -> getEmail();?> </td>
                                                <td> <?php echo $cliente -> getTell();?> </td>

                                                <td>
                                                    <div class="btn-group" role="group" aria-label="Basic example">
                                                        <a class="btn btn-sm btn-plus-action" id="btnAlterCust" data-bs-toggle="modal" data-bs-target="#PopUp_alter" onclick="getCustomerData(<?php echo $cliente -> getId(); ?>)">alterar</a>
                                                        <a class="btn btn-sm btn-plus-action" href="../../control/customers_delete.php?id=<?php echo $cliente -> getId(); ?>">Excluir</a>
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
    var btn = document.querySelector('#btnRegisterCust');

    btn.addEventListener('click', function() {
        
        const contentR = document.querySelector('#contentRegisterCust');
        contentR.style.display = 'flex';
        
        const ttlR = document.querySelector('#ttl-customers');
        ttlR.style.display = 'flex';
    })
</script>

<script>

    let cpf = document.querySelector('#cpfCustomers');

    cpf.addEventListener('input', () => {
        let cpfRegistLength = cpfRegist.value.length;

        if (cpfRegistLength == 3 || cpfRegistLength == 7) {
            cpfRegist.value += '.';
        } else if (cpfRegistLength == 11) {
            cpfRegist.value += '-';
        }
    })
</script>
</body>
</html>