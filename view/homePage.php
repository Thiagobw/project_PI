<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/bootstrap.css">
    <link rel="stylesheet" href="css/styleHomePage.css">
    <link rel="stylesheet" href="img/icons/fontawesome/css/all.min.css">

    <title>Home Page - LA Imports</title>
</head>
<body>

<header>
    <?php
    include "../view/navbar/navbarHomePage.php";
    include "../view/pop-upAccount.php";
    ?>
</header>


<div class="container-fluid banner">
    <div class="row center">
        <div class="col-12 banner_content_main">
            <img src="img/img_banner1.png" alt="Banner LA Imports" class="img-fluid w-100">
        </div>
    </div>
</div>


<!-- featured products -->
<div class="container-fluid mt-3 mb-3">
    <div class="row justify-content-around">

		<div class="col-11 col-sm-8 col-md-5 col-lg-5 col-xl-3 bg-dark mt-3 mb-3 center prod">
            <img src="img/products/yezzyzebra.png" alt="Mais Vendidos" class="w-100">
        </div>

		<div class="col-11 col-sm-8 col-md-5 col-lg-5 col-xl-3 bg-dark mt-3 mb-3 center prod">
            <img src="img/products/airJordanChicago.png" alt="Mais Vendidos" class="w-100">
        </div>

        <div class="col-11 col-sm-8 col-md-6 col-lg-6 col-xl-3 bg-dark mt-3 mb-3 center prod">
            <img src="img/products/airForce1.png" alt="Mais Vendidos" class="w-100">
        </div>
    </div>

    <div class="row justify-content-around">

        <div class="col-11 col-sm-8 col-md-5 col-lg-5 col-xl-3 bg-dark mt-3 mb-3 center prod">
            <img src="img/products/adidasForum.png" alt="Mais Vendidos" class="w-100">
        </div>

        <div class="col-11 col-sm-8 col-md-5 col-lg-5 col-xl-3 bg-dark mt-3 mb-3 center prod">
            <img src="img/products/new550.png" alt="Mais Vendidos" class= "w-100">
        </div>

        <div class="col-11 col-sm-8 col-md-6 col-lg-6 col-xl-3 bg-dark mt-3 mb-3 center prod">
            <img src="img/products/nikeDunk.png" alt="Mais Vendidos" class="w-100">
        </div>
    </div>
</div>

<div class="about-area">
    <div class="container">
        <div class="row">
            <div class="col-12">
                <h3 class="about-title">Sobre a Luiz alvez Imports</h3>
            </div>

            <div class="col-md-6">
                <img class="img-fluid" src="img/img_logo.png" alt="Luiz Alvez Imports"height="350" width="350">
            </div>
            
            <div class="col-md-6">
                <h3 class="about-subtitle">Uma loja dedicada ao seu estilo e conforto diario!</h3>
                <p>Procura ter modelos que além de conforto, qualidade são muito bonitos.</p>
                <p>Apenas com marcas de grandes nomes procurando dar segurança e confiança para o cliente.</p>
                <p> Outras caracteristicas: </p>

                <ul class="list-about">
                    <li><i class="fas fa-check"></i>Tenis Originais.</li>
                    <li><i class="fas fa-check"></i>Garantia de Fabrica.</li>
                    <li><i class="fas fa-check"></i>Entregas para todos Brasil.</li>
                    <li><i class="fas fa-check"></i>Vendas apenas por encomenda.</li>
                    <li><i class="fas fa-check"></i>Modelos femininos e masculinos.</li>
                </ul>
            </div>
        </div>
    </div>
</div>

<div class="container">
    <div class="row">
        <div class="col-12">
            <h3>contate-nós</h3>
        </div>
        <div class="col-md-6">

        </div>
        <div class="col-md-6">

        </div>
    </div>
</div>

<footer class="container-fluid bg-dark">
    <div class="row">
        <div class="col-12 text-white">
        </div>
    </div>
</footer>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js"></script>
<script src="js/pop-upDisplayControl.js"></script>
<script src="https://code.jquery.com/jquery-3.6.1.js" integrity="sha256-3zlB5s2uwoUzrXK3BT7AX3FyvojsraNFxCc2vC/7pNI=" crossorigin="anonymous"></script>
<script src="js/formsValid.js"></script>
</body>
</html>