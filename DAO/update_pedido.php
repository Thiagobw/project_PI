<?php

session_start();
$id_pedido = $_SESSION['id_pedido'];

$price = filter_input(INPUT_POST, 'price', FILTER_SANITIZE_SPECIAL_CHARS);
$formpay = filter_input(INPUT_POST, 'formpay', FILTER_SANITIZE_SPECIAL_CHARS);
$data = filter_input(INPUT_POST, 'data', FILTER_SANITIZE_NUMBER_INT);

$queryUpdate = $link->query("UPDATE pedido SET price='$price', formpay='$formpay', date='$date' WHERE id_pedido='$id_pedido'");
$affected_rows = mysqli_affected_rows($link);
if($affected_rows > 0){
 header("location:../");// botar a localização da pagina de colsulta 
}


?>