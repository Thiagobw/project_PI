<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/bootstrap.css">
    <link rel="stylesheet" href="css/styleHomePage.css">
    <link rel="stylesheet" href="img/icons/fontawesome/css/all.min.css">

    <!-- bibliotecas para fazer animações: Animate.css  Bounce.js AnimeJS GreenSock (GSAP) Magic Animations Zdog CSShake Hover.css AniJS  -->
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
        <div class="col-11 col-sm-10 col-md-11 col-lg-12 col-xl-10 content_main">
            <div class="row center">

                <div class="col-12 col-lg-5 text-center texts">
                    <h5 class="text-white title-banner mt-4">Descubra o melhor para você na Luiz Alvez Imports!</h5>
                    <p class="text-white text-banner mt-5 mb-4">Conforto, qualidade, estilo, inovação e personalidade tudo que você precisa para seu dia a dia.</p>
                </div>
            
                <div class="col-12 col-sm-11 col-md-10 col-lg-7 col-xl-6 center mt-3" style="padding: 0;">
                    <div class="col-11 col-sm-10 col-md-9 col-lg-8 col-xl-9 content_announcement">
                        <section class="col-12 col-sm-11 col-md-11 col-lg-7 col-xl-8 bg-white shadow">
                            <h5 class="text-center">Marcas que comercializamos</h5>
                            <main class="container-fluid">
                                <div class="carousel slide" data-bs-ride="carousel" id="brandSlide">
                                    <div class="carousel-indicators">
                                        <button type="button" data-bs-target="#brandSlide" data-bs-slide-to="0" class="active" aria-current="true" aria-label="Slide 1"></button>
                                        <button type="button" data-bs-target="#brandSlide" data-bs-slide-to="1" aria-label="Slide 2"></button>
                                        <button type="button" data-bs-target="#brandSlide" data-bs-slide-to="2" aria-label="Slide 3"></button>
                                    </div>
                                    <div class="carousel-inner" style="padding: 0;">
                                        <div class="carousel-item active">
                                            <img class="d-block w-80 center" src="img/brands/Nike-Logo.png" alt="brand nike">
                                        </div>
                                        <div class="carousel-item">
                                            <img class="d-block w-100" src="" alt="brand adidas">
                                        </div>
                                        <div class="carousel-item">
                                            <img class="d-block w-100" src="" alt="brand test">
                                        </div>
                                    </div>
                                    <button class="carousel-control-prev" type="button" data-bs-target="#brandSlide" data-bs-slide="prev">
                                        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                                        <span class="visually-hidden">Previous</span>
                                    </button>
                                    <button class="carousel-control-next" type="button" data-bs-target="#brandSlide" data-bs-slide="next">
                                        <span class="carousel-control-next-icon" aria-hidden="true"></span>
                                        <span class="visually-hidden">Next</span>
                                    </button>
                                </div>
                            </main>
                        </section>
                        
                        <section class="col-12 col-sm-11 col-md-11 col-lg-7 col-xl-8 bg-white center mt-4 shadow">

                        </section>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<main class="container-fluid">
    <div class="row">
        <div class="col-12 col-lg-7 col-xl-6 about">
            <div class="col-12 col-lg-10 col-xl-12 bg-white shadow"> 
            Luiz.alvez_imports foi criada para oferecer os melhores pro dutos com a mais alta qualidadde, produtos estes com os das marcas mais famosas como, Nike, Adidas, Puma, New Balance, Balanciaga, Dolce e Gabbana Bape, Gucci, Louis Vuitton, Vans, Converse, Versace, Lacoste e Schutz 
            <br>
            <h3>sobre a loja</h3>
            L.A Imports é uma loja indepedente....  importamos tenis dos mais diversos modelos e marcas dos paises, x, y e z...
            La_Imports é uma loja dedicada a vendas de tenis casuais, sapatenis, esportivos, de performace, Chunky sneakers e Sneakers. 
            <br>
            e-mail laimports@gmail.com
            <br>
            Localizado em Luiz Alvez
            <br>
            Telefone fixo 47 3377-3256
            <br>
            <!--Aqui podemos botar esses como redes sociais-->  
            Whatsapp 47 99686-7053
            <br>
            Instagram luiz.alvez_imports
            <br>
            Facebook
            <!--link do exemplo https://catalogoapp.mobi/7a9cd4fb-1608-4d05-9db3-05aa3cddcfa3-->
            luiz.alvez_imports
            <br>
            Loja de Atacado, varejo e dropshipping
            <br>
            Linha de Nacional BR
            <br>
            Linha de Importsados
            <br>
            Linha Exclusiva
            <!--Formas de pagamento link de exemplo https://www.reistsouza.com.br/formas-de-pagamento?gclid=CjwKCAjwu5yYBhAjEiwAKXk_eLLk2aZmtdo34UjahYBlFKvZXOCkSTdugsCuPtd7mOy6lfGCbzh7UhoCKkwQAvD_BwE-->
            <br>
            visa
            <br>
            elo
            <br>
            mastercard
            <br>
            hipercard
            <br>
            pix
            <br>
            tranferencia bancaria 
            <br>
            boleto bancario
            <br>
            </div>
        </div>
    </div>
</main>

<footer class="container-fluid bg-dark mt-4">
    <div class="row">
        <div class="col-12">
            txtxtxt
        </div>
    </div>
</footer>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js"></script>
<script src="js/pop-upDisplayControl.js"></script>
<script src="https://code.jquery.com/jquery-3.6.1.js" integrity="sha256-3zlB5s2uwoUzrXK3BT7AX3FyvojsraNFxCc2vC/7pNI=" crossorigin="anonymous"></script>
<script src="js/login-register.js"></script>

<!-- mask for inputs -->
<script>
    //getting input data
    const cpfLog = document.querySelector('#CpfLog');
    const cpfRegist = document.querySelector('#cpf');
    const tell = document.querySelector('#tell');

    //mask for login input
    cpfLog.addEventListener('keypress', () => {
        let cpfLogLength = cpfLog.value.length;

        if (cpfLogLength == 3 || cpfLogLength == 7) {
            cpfLog.value += '.';
        }
        else if (cpfLogLength == 11) {
            cpfLog.value += '-';
        }
    })
    // --------------------------- //


    //mask for registration input
    cpfRegist.addEventListener('keypress', () => {
        let cpfRegistLength = cpfRegist.value.length;

        if(cpfRegistLength == 3 || cpfRegistLength == 7) {
            cpfRegist.value += '.';
        }
        else if (cpfRegistLength == 11) {
            cpfRegist.value += '-';
        }
    })

    // utilizar keyup para tell
    
    tell.addEventListener('keypress', () => {
        let tellLength = tell.value.length;

        if (tellLength == 2) {
            "(" += tell.value += "";
        }
    })
</script>

</body>
</html>