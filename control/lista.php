<?php
//adiciona coneção
include_once("connection.php");
//query para consulta 
$sql = "SELECT id_cliente, nome, CPF from cliente";
// executa e recebe o resultado da consulta passando a conexão  e a query
$result = mysqli_query($conexao, $sql);
echo "<h1>Usuarios Cadastrados</h1>\n";
    echo "<table border=\"1\">\n";
    "<tr>\n";
    "<th> id_cliente</th>\n";
    "<th> nome</th>\n";
    "<th> CPF<th>\n";
    "<th> OPÇÕES </th>\n";
    "</tr>\n";

    if(mysqli_num_rows($result) > 0){
        //exibe os dados presentes na $row
        while($row = mysqli_fetch_assoc($result)){
            echo    "<tr>\n";
                    "<td>" . $row["id_cliente"] ."</td>\n".
                    "<td>" . $row["nome"] ."</td>\n".
                    "<td>" . $row["CPF"] ."</td>\n".
                    "<td><img src=\"img/icone-editar.gif\">" .
                    "<img src=\"img/icone-delete.png\"> </td>\n" .
                    "</tr>";         
        }
    } else{
        echo "Nenhum resultado encontrado.";
    }
echo "<table>\n";
mysqli_close($conexao);
?>