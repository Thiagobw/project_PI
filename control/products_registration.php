<?php

include_once $_SERVER["DOCUMENT_ROOT"]."/project_PI/DAO/connection.php";
include_once $_SERVER["DOCUMENT_ROOT"]."/project_PI/DAO/productsBd.php";
include_once $_SERVER["DOCUMENT_ROOT"]."/project_PI/model/Products.php";


$name = $_POST['nameProduct'];
$price = $_POST['priceProduct'];
$amount = $_POST['amountProviders'];

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

<?php

$imagem = "imagem.jpg"; //aqui a url da imagem que sera criada a miniatura

header("Content-type: image/jpeg"); // Cabeçalho do Script para informar o tipo da imagem lembrando que se for gerar uma imagem ig vc tem que mudar o cabeçalho isso serve para qualquer tipo de imagem

$im = imagecreatefromjpeg($imagem); //criar uma amostra da imagem original

$largurao = imagesx($im); // pegar a largura da amostra

$alturao = imagesy($im); // pegar a altura da amostra

$alturad = 100; // definir a altura da miniatura em px

$largurad = ($largurao*$alturad)/$alturao; // calcula a largura da imagem a partir da altura da miniatura

$nova = imagecreatetruecolor($largurad,$alturad); //criar uma imagem em branco

imagecopyresampled($nova,$im,0,0,0,0,$largurad,$alturad,$largurao,$alturao); //copiar sobre a imagem em branco a amostra diminuindo conforma as especificações da miniatura

imagejpeg($nova); //cria imagem jpeg

imagedestroy($nova); //libera a memoria usada na miniatura

imagedestroy($im); //libera a memoria usada na amostra

?>