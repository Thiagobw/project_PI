<?php

include_once $_SERVER["DOCUMENT_ROOT"]."/project_PI/DAO/connection.php";
include_once $_SERVER["DOCUMENT_ROOT"]."/project_PI/DAO/productsBd.php";
include_once $_SERVER["DOCUMENT_ROOT"]."/project_PI/model/Products.php";

if(isset($_POST['submitChangeProduct']) && isset($_POST['idProductChange'])) {

    if ((!empty($_POST['changeNameProduct']) && !empty($_POST['changePriceProduct'])) && 
    (isset($_POST['changeCheckSize34']) || isset($_POST['changeCheckSize35']) || 
    isset($_POST['changeCheckSize36']) || isset($_POST['changeCheckSize37']) || 
    isset($_POST['changeCheckSize38']) || isset($_POST['changeCheckSize39']) ||
    isset($_POST['changeCheckSize40']) || isset($_POST['changeCheckSize41']) || 
    isset($_POST['changeCheckSize42']) || isset($_POST['changeCheckSize43']))) {

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

        $id = $_POST['idProductChange'];
        $name = $_POST['changeNameProduct'];
        $price = $_POST['changePriceProduct'];

        $prod = new Products();

        $prod ->setId($id);
        $prod ->setName($name);
        $prod ->setPrice($price);

        $result_update = update_product($prod);

        if ($result_update == true) {

            if (delet_product_sizes($id)) {

                if (update_product_size($SizeAmountList, $prod->getId())) {
                    header('Location: ../view/dashboard/productsPage.php');
                } 
                else {
                    echo "<br>falha ao falha ao atualizar os dados do tamanho do produto";
                }
            } else {
                echo "<br>falha ao falha ao atualizar os dados do tamanho do produto";
            }
        } else {
            echo "<br>falha ao falha ao atualizar os dados";
        }
    } else {
        echo "<br><h3>erro ao alterar informações!</h3> 
        você deve informar: <br>
        O nome do produto. <br>
        O valor do produto. <br>
        Um tamanho e sua quantidade. <br>
        <a href='../view/dashboard/productsPage.php'> click aqui para voltar e tentar novamente</a>";
    }
} else {
    header('Location: ../view/Error404.html');
}
