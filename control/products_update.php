<?php

include_once $_SERVER["DOCUMENT_ROOT"]."/project_PI/DAO/connection.php";
include_once $_SERVER["DOCUMENT_ROOT"]."/project_PI/DAO/productsBd.php";
include_once $_SERVER["DOCUMENT_ROOT"]."/project_PI/DAO/imagesBd.php";
include_once $_SERVER["DOCUMENT_ROOT"]."/project_PI/model/Products.php";
include_once $_SERVER["DOCUMENT_ROOT"]."/project_PI/model/Images.php";

if(isset($_POST['submitChangeProduct']) && isset($_POST['idProductChange'])) {

    if ((!empty($_POST['changeNameProduct']) && !empty($_POST['changePriceProduct'])) && 
    (isset($_POST['changeCheckSize34']) || isset($_POST['changeCheckSize35']) || 
    isset($_POST['changeCheckSize36']) || isset($_POST['changeCheckSize37']) || 
    isset($_POST['changeCheckSize38']) || isset($_POST['changeCheckSize39']) ||
    isset($_POST['changeCheckSize40']) || isset($_POST['changeCheckSize41']) || 
    isset($_POST['changeCheckSize42']) || isset($_POST['changeCheckSize43']))) {

        $SizeAmountList = array();
        
        if(isset($_POST['changeCheckSize34'])) {
            $SizeAmountList[] = [34, $_POST['changeAmountProdSize34']];
        }

        if(isset($_POST['changeCheckSize35'])) {
            $SizeAmountList[] = [35, $_POST['changeAmountProdSize35']];
        }

        if(isset($_POST['changeCheckSize36'])) {
            $SizeAmountList[] = [36, $_POST['changeAmountProdSize36']];
        }

        if(isset($_POST['changeCheckSize37'])) {
            $SizeAmountList[] = [37, $_POST['changeAmountProdSize37']];
        }

        if(isset($_POST['changeCheckSize38'])) {
            $SizeAmountList[] = [38, $_POST['changeAmountProdSize38']];
        }

        if(isset($_POST['changeCheckSize39'])) {
            $SizeAmountList[] = [39, $_POST['changeAmountProdSize39']];
        }

        if(isset($_POST['changeCheckSize40'])) {
            $SizeAmountList[] = [40, $_POST['changeAmountProdSize40']];
        }

        if(isset($_POST['changeCheckSize41'])) {
            $SizeAmountList[] = [41, $_POST['changeAmountProdSize41']];
        }

        if(isset($_POST['changeCheckSize42'])) {
            $SizeAmountList[] = [42, $_POST['changeAmountProdSize42']];
        }

        if(isset($_POST['changeCheckSize43'])) {
            $SizeAmountList[] = [43, $_POST['changeAmountProdSize43']];
        }

        $id = $_POST['idProductChange'];
        $name = $_POST['changeNameProduct'];
        $price = $_POST['changePriceProduct'];

        $prod = new Products();

        $prod ->setId($id);
        $prod ->setName($name);
        $prod ->setPrice($price);
        
        if (update_product($prod)) { // changes product name and price and returns true or false

            if (delet_product_sizes($id)) { // delete the sizes already registered and returns true or false
                
                
                if (register_product_size($id, $SizeAmountList)) { // register new sizes and quantities and returns true or false

                    
                    
                    //handle the post of img
                    if(isset($_FILES)) {

                        // set a path to the images
                        $imgPath = $_SERVER["DOCUMENT_ROOT"].'/project_PI/uploads/';

                        $imgFileName = basename($_FILES['changeImgProd']['name']);

                        $tagetImgPath = $imgPath . $imgFileName;

                        // get and move the file has uploaded to server
                        //with a tmp server file name
                        if(move_uploaded_file($imgFileName, $tagetImgPath)) {

                        $image = new Images;
                        
                        $image->setName($imgFileName);
                        //retrieve the id its going on upload for db
                        $imgId = uploadImage($image);
                        $prod->setImagemId($imgId);

                        //handle another error, if stay on tmp will be exclude
                    }else{
                        echo 'não consegui mover o arquivo para o app';
                    }
                
                } else {

                    //the default "image.png" <
                    
                    $image = new Images;
                    $image->setName('image.png'); //here get a "image" on uploads folder on root
                    $imgId = uploadImage($image);
                    $prod->setImagemId($imgId);
                }


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
