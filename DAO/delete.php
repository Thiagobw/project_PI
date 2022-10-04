<?php

include_once 'connection.php';

$id_usuario = filter_input(INPUT_GET, 'id_usuario', FILTER_SANITIZE_SPECIAL_CHARS);
$queryDelete = $link->query("DELETE FROM usuarios WHERE id_usuario='$id_usuario'");

if(mysqli_affected_rows($link) > 0){
    header("location:../");// botar a localização da pagina de colsulta 

}
?>