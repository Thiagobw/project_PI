<?php

include_once 'includes/header.php'; //a definir
include_once 'includes/menu.php'; // a definir
?>

<div class="row container">
    <div class="col s12">
        <h5 class="light">Edição de Registros</h5><hr>
    </div>
</div>

<?php
    include_once 'DAO/connection.php'
    $id = filter_input(INPUT_GET, 'id_usuario', FILTER_SANITIZE_NUMBER_INT);
    $querySelect = $link->query("SELECT * FROM usuarios where id_usuario='$id'");

    while($registros = $querySelect->fetch_assoc()){
        $id_usuario = $registros['id_usuario'];
        $nome = $registros['nome'];
        $email = $registros['email'];
        $cpf = $registros['cpf'];
    }
?>
//fazer um formulario de cadastro html



<?php include_once 'includes/footer.php';
?>