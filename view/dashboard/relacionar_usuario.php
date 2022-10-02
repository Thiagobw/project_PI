<?php

include_once "connection.php";

$conecao = mysqli_connect($host, $user, $pass, $dbName, $db);
$result_usuario = "SELECT * FROM usuarios";
$resultado_usuario = mysqli_query($conecao, $result_usuario);

while($rows_usuarios = mysqli_fetch_array($resultado_usuario)){
    echo $rows_usuarios["nome"]."<br>";
    echo $rows_usuarios["cpf"]."<br>";
    echo $rows_usuarios["email"]."<br>";
}
?>