<?php

session_start();

$id_produtos = $_SESSION['id_produtos'];

$nome_produto = filter_input(INPUT_POST, 'nome_produto', FILTER_SANITIZE_SPECIAL_CHARS);
$preco_produto = filter_input(INPUT_POST, 'preco_produto', FILTER_SANITIZE_NUMBER_INT);
$quantidade = filter_input(INPUT_POST, 'quantidade', FILTER_SANITIZE_NUMBER_INT);

$queryUpdate = $link->query("UPDATE produtos SET nome_produto='$nome_produto', preco_produto='$preco_produto', quantidade='$quantidade' WHERE id_produto='$id_produto'");
$affected_rows = mysqli_affected_rows($link);
if($affected_rows > 0){
 header("location:../");// botar a localização da pagina de colsulta 
}
?>