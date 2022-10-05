<?php

include_once 'connection.php';

$id_produto = filter_input(INPUT_GET, 'id_produto', FILTER_SANITIZE_SPECIAL_CHARS);
$queryDelete = $link->query("DELETE FROM produtos WHERE id_produto='$id_produto'");

if(mysqli_affected_rows($link) > 0){
    header("location:../");// botar a localização da pagina de colsulta 
}
?>