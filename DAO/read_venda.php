<?php

include_once "connection.php";
include_once "../model/Requests.php";

$querySelect = $link->query("SELECT * FROM  pedido");
while ($registros = $querySelect->fetch_assoc()) {
    $valor_pedido = $registros['valor_pedido'];
    $forma_pagamento = $registros['forma_pagamento'];
    $data = $registros['data'];

    echo "<tr>";
    echo "<td>$valor_pedido</td><td>$forma_pagamento</td><td>$data</td>";
    echo "<td><a href='editar.php?id_pedido=$id_pedido'><i class='material-icons'>edit</i></a></td>";
    echo "<td><a href='DAO/delete.php?id_pedido=$id_pedido'><i class='material-icons'>delete</i></td>";
    echo "</tr>";
}   
?>