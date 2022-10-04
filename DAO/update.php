<?php

session_start();
$id_usuario = $_SESSION['id_usuario'];

$nome = filter_input(INPUT_POST, 'nome', FILTER_SANITIZE_SPECIAL_CHARS);
$email = filter_input(INPUT_POST, 'email', FILTER_SANITIZE_SPECIAL_CHARS);
$cpf = filter_input(INPUT_POST, 'cpf', FILTER_SANITIZE_NUMBER_INT);

$queryUpdate = $link->query("UPDATE usuarios SET nome='$nome', email='$email', cpf='$cpf' WHERE id_usuario='$id_usuario'");
$affected_rows = mysqli_affected_rows($link);
if($affected_rows > 0){
 header("location:../");// botar a localização da pagina de colsulta 
}


?>