<?php

$id_usuario = filter_input(INPUT_GET, 'id_usuario', FILTER_SANITIZE_NUMBER_INT);

echo 'Quer mesmo excluir esse registro? ';
echo "<a href='delete.php? id_usuario= $id_usuarioid> sim </a>'";
echo "<a href='index.php'>não</a>";
?>