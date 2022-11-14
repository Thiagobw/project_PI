<?php

include_once $_SERVER["DOCUMENT_ROOT"]."/project_PI/DAO/connection.php";
include_once $_SERVER["DOCUMENT_ROOT"]."/project_PI/DAO/productsBd.php";
include_once $_SERVER["DOCUMENT_ROOT"]."/project_PI/model/Products.php";

if(isset($_POST['submitProduct'])) {

    if ((!empty($_POST['nameProduct']) && !empty($_POST['priceProduct'])) && (isset($_POST['checkSize34']) || isset($_POST['checkSize35']) ||
        isset($_POST['checkSize36']) || isset($_POST['checkSize37']) || isset($_POST['checkSize38']) || isset($_POST['checkSize39']) ||
        isset($_POST['checkSize40']) || isset($_POST['checkSize41']) || isset($_POST['checkSize42']) || isset($_POST['checkSize43']))) {

        $img = $_POST['imgProduct'];
        $name = $_POST['nameProduct'];
        $price = $_POST['priceProduct'];
        $amount34 = $_POST['amountProdSize34'];
        $amount35 = $_POST['amountProdSize35'];
        $amount36 = $_POST['amountProdSize36'];
        $amount37 = $_POST['amountProdSize37'];
        $amount38 = $_POST['amountProdSize38'];
        $amount39 = $_POST['amountProdSize39'];
        $amount40 = $_POST['amountProdSize40'];
        $amount41 = $_POST['amountProdSize41'];
        $amount42 = $_POST['amountProdSize42'];
        $amount43 = $_POST['amountProdSize43'];


        $prod = new Products();

        $prod ->setName($name);
        $prod ->setPrice($price);
        $prod ->setAmountTotal($amount34 + $amount35 + $amount36 + $amount37 + $amount38 + $amount39 + $amount40 + $amount41 + $amount42 + $amount43);
        $prod ->setSz34($amount34);
        $prod ->setSz35($amount35);
        $prod ->setSz36($amount36);
        $prod ->setSz37($amount37);
        $prod ->setSz38($amount38);
        $prod ->setSz39($amount39);
        $prod ->setSz40($amount40);
        $prod ->setSz41($amount41);
        $prod ->setSz42($amount42);
        $prod ->setSz43($amount43);



        $result_regist = register_products($prod);

        if ($result_regist == true) {
            header('Location: ../view/dashboard/productsPage.php');
        }
        else {
            echo "falha ao cadastrar";
        }

    } else {
        echo "<br><h3>erro ao cadastrar!</h3> 
                    você deve informar: <br> 
                    O nome do produto. <br> 
                    O valor do produto. <br> 
                    Um tamanho e sua quantidade.";
    }

} else {
    header('Location: ../view/Error404.html');
}


