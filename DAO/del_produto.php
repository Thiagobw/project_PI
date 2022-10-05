<?php

$id_produto = filter_input(INPUT_GET, 'id_produto', FILTER_SANITIZE_NUMBER_INT);

echo 'Quer mesmo excluir esse produto? ';
echo "<a href='delete.php? id_produto= $id_produto> sim </a>'";
echo "<a href='index.php'>não</a>";
?>