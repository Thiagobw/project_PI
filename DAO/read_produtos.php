<?php

include_once "connection.php";
include_once "../model/Products.php";

$querySelect = $link->query("SELECT * FROM  produtos");
while ($registros = $querySelect->fetch_assoc()) {
    $nome_produto = $registros['nome_produto'];
    $preco_produto = $registros['preco_produto'];
    $quantidade = $registros['quantidade'];

    echo "<tr>";
    echo "<td>$nome_produto</td><td>$preco_produto</td><td>$quantidade</td>";
    echo "<td><a href='editar.php?id_produtos=$id_produtos'><i class='material-icons'>edit</i></a></td>";
    echo "<td><a href='DAO/delete.php?id_produtos=$id_produtos'><i class='material-icons'>delete</i></td>";
    echo "</tr>";
}   
?>