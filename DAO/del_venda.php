<?php

$id_pedido = filter_input(INPUT_GET, 'id_pedido', FILTER_SANITIZE_NUMBER_INT);

echo 'Quer mesmo excluir esse registro? ';
echo "<a href='delete.php? id_pedido= $id_pedido> sim </a>'";
echo "<a href='index.php'>não</a>";
?>