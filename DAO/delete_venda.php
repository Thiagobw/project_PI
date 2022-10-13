<?php

include_once 'connection.php';

$id_pedido = filter_input(INPUT_GET, 'id_pedido', FILTER_SANITIZE_SPECIAL_CHARS);
$queryDelete = $link->query("DELETE FROM pedido WHERE id_pedido='$id_pedido'");

if(mysqli_affected_rows($link) > 0){
    header("location:../");// botar a localização da pagina de consulta 
}
?>