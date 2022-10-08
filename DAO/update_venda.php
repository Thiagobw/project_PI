<?php

session_start();
$id_pedido = $_SESSION['id_pedido'];

$valor_pedido = filter_input(INPUT_POST, 'valor_pedido', FILTER_SANITIZE_NUMBER_FLOAT);
$forma_pagamento = filter_input(INPUT_POST, 'forma_pagamento', FILTER_SANITIZE_SPECIAL_CHARS);
$data = filter_input(INPUT_POST, 'data', FILTER_SANITIZE_NUMBER_FLOAT);

$queryUpdate = $link->query("UPDATE pedido SET valor_pedido='$valor_pedido', forma_pagamento='$forma_pagamento', data='$data' WHERE id_pedido='$id_pedido'");
$affected_rows = mysqli_affected_rows($link);
if($affected_rows > 0){
 header("location:../");// botar a localização da pagina de colsulta 
}


?>