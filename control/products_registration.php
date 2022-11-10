<?php

include_once $_SERVER["DOCUMENT_ROOT"]."/project_PI/DAO/connection.php";
include_once $_SERVER["DOCUMENT_ROOT"]."/project_PI/DAO/productsBd.php";
include_once $_SERVER["DOCUMENT_ROOT"]."/project_PI/model/Products.php";

if(isset($_POST['submitProduct'])) {
    
    $img = $_POST['imgProduct'];
    $name = $_POST['nameProduct'];
    $price = $_POST['priceProduct'];
    $amount = $_POST['amountProviders'];


    //https://www.vivaolinux.com.br/topico/PHP/Redimensionar-Imagem-e-salvar-em-Disco
    /*$img = "dunk.png"; //aqui a url da imagem que sera criada a miniatura

    //die ("pp");

    $im = imagecreatefromjpeg($imagem); //criar uma amostra da imagem original

    $largurao = imagesx($im); // pegar a largura da amostra

    $alturao = imagesy($im); // pegar a altura da amostra

    $alturad = 200; // definir a altura da miniatura em px

    $largurad = ($largurao*$alturad)/$alturao; // calcula a largura da imagem a partir da altura da miniatura

    $nova = imagecreatetruecolor($largurad,$alturad); //criar uma imagem em branco

    imagecopyresampled($nova,$im,0,0,0,0,$largurad,$alturad,$largurao,$alturao); //copiar sobre a imagem em branco a amostra diminuindo conforma as especificações da miniatura

    $caminho_arquivo = $_SERVER["DOCUMENT_ROOT"]."/project_PI/view/img";

    imagejpeg($nova, $caminho_arquivo); //cria imagem jpeg

    imagedestroy($nova); //libera a memoria usada na miniatura

    imagedestroy($im); //libera a memoria usada na amostra*/


    $prod = new Products();

    $prod ->setName($name);
    $prod ->setPrice($price);
    $prod ->setAmount($amount);


    $result_regist = register_products($prod);

    if ($result_regist == true) {
        header('Location: ../view/dashboard/productsPage.php');
    }
    else {
        echo "falha ao cadastrar";
    }

} else {
    header('Location: ../view/Error404.html');
}


