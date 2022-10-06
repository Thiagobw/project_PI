<?php
session_start();
include_once 'includes/header.php'; //a definir
include_once 'includes/menu.php'; // a definir
?>

<div class="row container">
    <div class="col s12">
        <h5 class="light">Edição de Registros</h5><hr>
    </div>
</div>

<?php
    include_once 'DAO/connection.php';

    $id_pedido = filter_input(INPUT_GET, 'id_pedido', FILTER_SANITIZE_NUMBER_INT);
    $_SESSION['id_pedido'] = $id_pedido;
    $querySelect = $link->query("SELECT * FROM pedido where id_pedido='$id_pedido'");

    while($registros = $querySelect->fetch_assoc()){
        $price = $registros['price'];
        $formpay = $registros['formpay'];
        $data = $registros['data'];
    }
?>
//fazer um formulario de cadastro html



<?php include_once 'includes/footer.php';
?>