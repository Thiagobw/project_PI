<?php

include_once "connection.php";
include_once "../model/users.php";

$querySelect = $link->query("SELECT * FROM  usuarios");
while ($registros = $querySelect->fetch_assoc()) {
    $nome = $registros['nome'];
    $email = $registros['email'];
    $cpf = $registros['cpf'];

    echo "<tr>";
    echo "<td>$nome</td><td>$email</td><td>$cpf</td>";
    echo "<td><a href='editar.php?id=$id'><i class='material-icons'>edit</i></a></td>";
    echo "<td><a href='DAO/delete.php?id=$id'><i class='material-icons'>delete</i></td>";
    echo "</tr>";

}   



?>