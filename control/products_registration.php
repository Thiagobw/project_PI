<?php

include_once $_SERVER["DOCUMENT_ROOT"]."/project_PI/DAO/connection.php";
include_once $_SERVER["DOCUMENT_ROOT"]."/project_PI/DAO/productsBd.php";
include_once $_SERVER["DOCUMENT_ROOT"]."/project_PI/model/Products.php";

if(isset($_POST['submitProduct'])) {

    if ((!empty($_POST['nameProduct']) && !empty($_POST['priceProduct'])) && (isset($_POST['checkSize34']) || isset($_POST['checkSize35']) ||
        isset($_POST['checkSize36']) || isset($_POST['checkSize37']) || isset($_POST['checkSize38']) || isset($_POST['checkSize39']) ||
        isset($_POST['checkSize40']) || isset($_POST['checkSize41']) || isset($_POST['checkSize42']) || isset($_POST['checkSize43']))) {


            $SizeAmountList = array();
            
            if(isset($_POST['checkSize34'])) {
                $SizeAmountList[] = [34, $_POST['amountProdSize34']];
            }

            if(isset($_POST['checkSize35'])) {
                $SizeAmountList[] = [35, $_POST['amountProdSize35']];
            }

            if(isset($_POST['checkSize36'])) {
                $SizeAmountList[] = [36, $_POST['amountProdSize36']];
            }

            if(isset($_POST['checkSize37'])) {
                $SizeAmountList[] = [37, $_POST['amountProdSize37']];
            }

            if(isset($_POST['checkSize38'])) {
                $SizeAmountList[] = [38, $_POST['amountProdSize38']];
            }

            if(isset($_POST['checkSize39'])) {
                $SizeAmountList[] = [39, $_POST['amountProdSize39']];
            }

            if(isset($_POST['checkSize40'])) {
                $SizeAmountList[] = [40, $_POST['amountProdSize40']];
            }

            if(isset($_POST['checkSize41'])) {
                $SizeAmountList[] = [41, $_POST['amountProdSize41']];
            }

            if(isset($_POST['checkSize42'])) {
                $SizeAmountList[] = [42, $_POST['amountProdSize42']];
            }

            if(isset($_POST['checkSize43'])) {
                $SizeAmountList[] = [43, $_POST['amountProdSize43']];
            }

            $img = $_POST['imgProduct'];
            $name = $_POST['nameProduct'];
            $price = $_POST['priceProduct'];
            
            $prod = new Products();
            $prod ->setName($name);
            $prod ->setPrice($price);
            //recebe o id
            $result_regist_id = register_products($prod);
            
            //chama a função de inserir os tamanhos, passando o id e o array
            $result_regist_Size = register_products_size($result_regist_id, $SizeAmountList);


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


