<?php

include_once "connection.php";
include_once "../model/request.php";

$querySelect = $link->query("SELECT * FROM  pedido");
while ($registros = $querySelect->fetch_assoc()) {
    $price = $registros['price'];
    $formpay = $registros['formpay'];
    $data = $registros['data'];

    echo "<tr>";
    echo "<td>$price</td><td>$formpay</td><td>$data</td>";
    echo "<td><a href='editar.php?id_pedido=$id_pedido'><i class='material-icons'>edit</i></a></td>";
    echo "<td><a href='DAO/delete.php?id_pedido=$id_pedido'><i class='material-icons'>delete</i></td>";
    echo "</tr>";

}   



?>