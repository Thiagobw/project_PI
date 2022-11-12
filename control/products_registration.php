<?php

include_once $_SERVER["DOCUMENT_ROOT"]."/project_PI/DAO/connection.php";
include_once $_SERVER["DOCUMENT_ROOT"]."/project_PI/DAO/productsBd.php";
include_once $_SERVER["DOCUMENT_ROOT"]."/project_PI/model/Products.php";

if(isset($_POST['submitProduct'])) {

    if (!empty($_POST['nameProduct']) && !is_null($_POST['amountProdSize34']) || !is_null($_POST['amountProdSize35']) || !is_null($_POST['amountProdSize36']) || 
        !is_null($_POST['amountProdSize37']) || !is_null($_POST['amountProdSize38']) || !is_null($_POST['amountProdSize39']) || !is_null($_POST['amountProdSize40']) || 
        !is_null($_POST['amountProdSize41']) || !is_null($_POST['amountProdSize42']) || !is_null($_POST['amountProdSize43'])) {

            $img = $_POST['imgProduct'];
            $name = $_POST['nameProduct'];
            $price = $_POST['priceProduct'];
            
            $amount = 0;
            $amount34 = $_POST['amountProdSize34'];
            $amount35 = $_POST['amountProdSize35'];
            $amount36 = $_POST['amountProdSize36'];

            if (!is_null($amount34)) {

                $amount =+ $amount34;
            }

            if (!is_null($amount35)) {
                
                $amount =+ $amount35;
            }

            if (!is_null($amount36)) {

                $amount =+ $amount36;
            }
            
            else if (!is_null($_POST['amountProdSize37'])) {

                $amount =+ $amount37 = $_POST['amountProdSize37'];
            }

            else if (!is_null($_POST['amountProdSize38'])) {

                $amount =+ $amount38 = $_POST['amountProdSize38'];
            }

            else if (!is_null($_POST['amountProdSize39'])) {
                
                $amount =+ $amount39 = $_POST['amountProdSize39'];
            }

            else if (!is_null($_POST['amountProdSize40'])) {
                
                $amount =+ $amount40 = $_POST['amountProdSize40'];
            }

            else if (!is_null($_POST['amountProdSize41'])) {

                $amount =+ $amount41 = $_POST['amountProdSize41'];                
            }

            else if (!is_null($_POST['amountProdSize42'])) {

                $amount =+ $amount42 = $_POST['amountProdSize42'];
            }
            
            else if (!is_null($_POST['amountProdSize43'])) {

                $amount =+ $amount43 = $_POST['amountProdSize43'];
            }

            die(var_dump($amount + $amount34 + $amount36));

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
        echo "<br><h3>erro ao cadastrar!</h3> você deve informar:<br> O nome do produto.<br> Um tamanho e sua quantidade.";
    }

} else {
    header('Location: ../view/Error404.html');
}


