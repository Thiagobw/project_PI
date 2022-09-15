<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/bootstrap.css">
    <link rel="stylesheet" href="css/styleHomePage.css">
    <link rel="stylesheet" href="img/icons/fontawesome/css/all.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css"/>

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
    <div class="col-12">
        <h3 class="featured_products_title">O melhor para você na Luiz Alves Imports!</h3>
    </div>
    <div class="row justify-content-around" id="row_products_animate1">

		<div class="col-11 col-sm-8 col-md-5 col-lg-5 col-xl-3 mt-3 mb-3 center prod shadow">
            <img src="img/products/yezzyzebra.png" alt="Mais Vendidos" class="w-100">
        </div>

		<div class="col-11 col-sm-8 col-md-5 col-lg-5 col-xl-3 mt-3 mb-3 center prod shadow">
            <img src="img/products/airJordanChicago.png" alt="Mais Vendidos" class="w-100">
        </div>

        <div class="col-11 col-sm-8 col-md-6 col-lg-6 col-xl-3 mt-3 mb-3 center prod shadow">
            <img src="img/products/airForce1.png" alt="Mais Vendidos" class="w-100">
        </div>
    </div>

    <div class="row justify-content-around" id="row_products_animate2">
        <div class="col-11 col-sm-8 col-md-5 col-lg-5 col-xl-3 mt-3 mb-3 center prod shadow">
            <img src="img/products/adidasForum.png" alt="Mais Vendidos" class="w-100">
        </div>

        <div class="col-11 col-sm-8 col-md-5 col-lg-5 col-xl-3 mt-3 mb-3 center prod shadow">
            <img src="img/products/new550.png" alt="Mais Vendidos" class= "w-100">
        </div>

        <div class="col-11 col-sm-8 col-md-6 col-lg-6 col-xl-3 mt-3 mb-3 center prod shadow">
            <img src="img/products/nikeDunk.png" alt="Mais Vendidos" class="w-100">
        </div>
    </div>
</div>

<!--area about the company-->
<div class="about-area">
    <div class="container">
        <div class="row">
            <div class="col-12 mt-4">
                <h3 class="about-title">Sobre a Luiz alvez Imports</h3>
            </div>

            <div class="col-md-6 mb-4" style="padding: 0;">
                <img class="img-fluid w-100" src="img/lojatenis.jpg" alt="Luiz Alvez Imports">
            </div>
            
            <div class="col-md-6 about-text">
                <h3 class="about-subtitle">Uma loja dedicada ao seu estilo e conforto diario!</h3>
                <p class="mt-3">Loja Brasileira de Atacado, varejo e dropshipping, com linhas de Importados, Nacionais e Exclusivos.</p>
                <p>Trabalhamos apenas com marcas grandes, procurando dar segurança e confiança para nossos clientes.</p>
                <p class="mt-4"> Outras caracteristicas: </p>

                <ul class="list-about">
                    <li><i class="fas fa-check"></i>Preços atrativos;</li>
                    <li><i class="fas fa-check"></i>Garantia de Fabrica;</li>
                    <li><i class="fas fa-check"></i>Envio para todo o Brasil;</li>
                    <li><i class="fas fa-check"></i>Vendas apenas por encomenda;</li>
                    <li><i class="fas fa-check"></i>Variedade de modelos femininos e masculinos.</li>
                </ul>
            </div>
        </div>
    </div>
</div>

<!--sale ad area-->
<div class="ad_area">
    <div class="container">
        <div class="row">
            <div class="col-12 mt-4">
                <h3 class="ad_title">Adquira seu tênis</h3>
            </div>

            <div class="col-12">
                <p class="text-center">escrever algo assim... Nos só fazemos vendas atraves de encomendas, portanto para encomendar entre em contato conosco via whatsapp....</p>
                <p class="text-center">e para nós enviar uma mensagem clique no botão abaixo:</p>
                <div class="row center">
                    <a class="w-30" id="btn_wpp" aria-label="Chat on WhatsApp" target="_blank" href="https://wa.me/5547996867053?text=Olá!%20Estou%20interesse%20em%20encomendar%20um%20tênis%20com%20vocês!">
                        <img class="img-fluid w-100" alt="Chat on WhatsApp" src="img/WhatsAppButtonGreenLarge.svg"/>
                    </a>
                </div>
            </div>
        </div>
    </div>
</div>

<!--company contact area-->
<div class="contact-area">
    <div class="container">
        <div class="row">
            <div class="col-12 mt-4">
                <h3 class="contact-title">Fale conosco</h3>
            </div>

            <!--email contact form-->
            <div class="col-md-6">
                <div class="row">
                    <div class="col-12">
                        <h5 class="text-center mb-3">nos envie um email!</h5>
                    </div>
                    <div class="col-12">
                        <form class="input-group center" action="">
                            <div class="col-12 col-xl-10 mt-2">
                                <input class="form-control input-msgm" type="text" placeholder="nome">
                            </div>
                            <div class="col-12 col-xl-10 mt-4">
                                <input class="form-control input-msgm" type="text" placeholder="email">
                            </div>
                            <div class="col-12 col-xl-10 mt-4">
                                <textarea class="form-control input-msgm" name="" id=""placeholder="escreva a mensagem"></textarea>
                            </div>
                            <div class="col-12 col-xl-7 mt-3 mb-4">
                                <input class="btn btn-primary form-control" type="submit" value="enviar">
                            </div>
                        </form>
                    </div>
                </div>
            </div>

            <!--contact information-->
            <div class="col-md-6">
                <div class="col-12 text-left mt-4">
                    <p class="ml-5 title-numer">Telefone</p>
                    <p class="ml-5">47 3377-1069</p>

                    <p class="ml-5 title-whatsapp">Whatsapp</p>
                    <a class="ml-5" id="contact_wpp" aria-label="Chat on WhatsApp" target="_blank" href="https://wa.me/5547996867053?text=Olá!%20Eu%20falo%20com%20Luis%20Alves%20Imports?">
                        +55 (47) 99686-7053
                    </a>

                    <p class="ml-5 mt-3 title-address">Endereço</p>
                    <p class="ml-5 text-address">estamos localizados na cidade Luiz alves</p>
                </div>
            </div>
        </div>
    </div>
</div>

<footer>
    <div class="container">
        <div class="row">

            <!--company social networks-->
            <div class="col-md-6 mt-3 social_networks">
                <h5 class="text-white mt-2">Redes Sociais</h5>            
                <a class="btn" href="https://www.instagram.com/luiz.alvez_imports/" target="_blank"><i id="instagram" class="fa-brands fa-instagram"></i> Instagram</a>
                <br>
                <a class="btn" href=""><i class="fa-brands fa-facebook-f"></i> Facebook</a>
            </div>

            <!-- accepted payment methods-->
            <div class=" col-md-6 mt-3">
                <div class="row">
                    <div class="col-12 mt-2">
                        <h5 class="text-white text-center">Formas de pagamento</h5>
                    </div>

                    <div class="col-12 center mt-2">
                        <img class="mr-1" src="https://images.tcdn.com.br/commerce/assets/store/img/icons/formas_pagamento/pag_peqcartavisatraycheckout.png?50f5886fd37ca2d739f9991be7419369" alt="Visa">
                        <img class="mr-1" src="https://images.tcdn.com.br/commerce/assets/store/img/icons/formas_pagamento/pag_peqelotraycheckout.png?50f5886fd37ca2d739f9991be7419369" alt="Elo">
                        <img class="mr-1" src="https://images.tcdn.com.br/commerce/assets/store/img/icons/formas_pagamento/pag_peqmastercardtraycheckout.png?50f5886fd37ca2d739f9991be7419369" alt="Mastercard">
                        <img class="mr-1" src="https://images.tcdn.com.br/commerce/assets/store/img/icons/formas_pagamento/pag_pd_peqcartaohiper.png?50f5886fd37ca2d739f9991be7419369" alt="Hipercard">
                        <img class="mr-1" src="https://images.tcdn.com.br/commerce/assets/store/img/icons/formas_pagamento/pag_peqpix.png?50f5886fd37ca2d739f9991be7419369" alt="Pix">
                        <img src="https://images.tcdn.com.br/commerce/assets/store/img/icons/formas_pagamento/pag_peqboletotraycheckout.png?50f5886fd37ca2d739f9991be7419369" alt="Boleto bancario">
                    </div>
                </div>
            </div>
            <div class="col-12">

            </div>
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