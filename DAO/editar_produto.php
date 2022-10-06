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

    $id_produto = filter_input(INPUT_GET, 'id_produto', FILTER_SANITIZE_NUMBER_INT);
    $_SESSION['id_produto'] = $id_produto;
    $querySelect = $link->query("SELECT * FROM produtos where id_produto='$id_produto'");

    while($registros = $querySelect->fetch_assoc()){
        $nome_produto = $registros['nome_produto'];
        $preco_produto = $registros['preco_produto'];
        $quantidade = $registros['quantidade'];
    }
?>
//fazer um formulario de cadastro html



<?php include_once 'includes/footer.php';
?>