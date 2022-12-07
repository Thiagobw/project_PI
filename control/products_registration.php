<?php

include_once $_SERVER["DOCUMENT_ROOT"]."/project_PI/DAO/connection.php";
include_once $_SERVER["DOCUMENT_ROOT"]."/project_PI/DAO/productsBd.php";
include_once $_SERVER["DOCUMENT_ROOT"]."/project_PI/DAO/imagesBd.php";
include_once $_SERVER["DOCUMENT_ROOT"]."/project_PI/model/Products.php";
include_once $_SERVER["DOCUMENT_ROOT"]."/project_PI/model/Images.php";
    

/**
 * check if the form was sent
 */
if(isset($_POST['submitProduct'])) {

    /**
     * verifies that all the 
     * necessary data of the form has been sent
     */
    if ((!empty($_POST['nameProduct']) && !empty($_POST['priceProduct'])) && 
        (isset($_POST['checkSize34']) || isset($_POST['checkSize35']) || 
        isset($_POST['checkSize36']) || isset($_POST['checkSize37']) || 
        isset($_POST['checkSize38']) || isset($_POST['checkSize39']) ||
        isset($_POST['checkSize40']) || isset($_POST['checkSize41']) || 
        isset($_POST['checkSize42']) || isset($_POST['checkSize43'])) && (isset($_POST['provider']) && is_numeric($_POST['provider']))) {
            /**
             * identifies which size will 
             * be registered and adds it to the list
             */
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
            
            $name = $_POST['nameProduct'];
            $price = $_POST['priceProduct'];
            
            $prod = new Products();
            $prod ->setName($name);
            $prod ->setPrice($price);
            
            // set a path to the images
            $imgPath = $_SERVER["DOCUMENT_ROOT"].'/project_PI/uploads/';

            //handle the post of img
            $imgPost = $_FILES['imgProduct'];
            //here its a other var. "type" because html itself!
            if(!empty($imgPost['name'])) {

                $imgFileName = basename($imgPost['name']);
                $tagetImgPath = $imgPath . $imgFileName;
                // get and move the file has uploaded to server
                //with a tmp server file name
                if(move_uploaded_file($imgPost['tmp_name'], $tagetImgPath)) {

                    $image = new Images;
                    
                    $image->setName($imgFileName);
                    //retrieve the id its going on upload for db
                    $imgId = uploadImage($image);
                    $prod->setImagemId($imgId);

                    //handle another error, if stay on tmp will be exclude
                }else{
                    echo 'não consegui mover o arquivo para o app';
                }
                
            }else {

                //the default "image.png" <
                
                $image = new Images;
                $image->setName('image.png'); //here get a "image" on uploads folder on root
                $imgId = uploadImage($image);
                $prod->setImagemId($imgId);
            }

            //register
            $result_regist_id = register_product($prod);
            if (!is_null($result_regist_id)) {

                $result_regist_Size = register_product_size($result_regist_id, $SizeAmountList);

                if ($result_regist_Size == true) {
                    $success = "Produto cadastrado com sucesso!";
                    header('Location: ../view/dashboard/productsPage.php?SuccessRegister='.$success);
                }
                else {
                    $error = "Erro ao cadastrar o produto!";
                    header('Location: ../view/dashboard/productsPage.php?ErrorRegister='.$error);
                }

            }

    } else {
        $error2 = "você deve informar: O nome do produto, O valor do produto, um fornecedor, um tamanho e sua quantidade.";
        header('Location: ../view/dashboard/productsPage.php?ErrorRegister2='.$error2);

    }

} else {
    header('Location: ../view/Error404.html');
}


