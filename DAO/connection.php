<?php

function connect() {
    $host = "localhost";
    $user = "root";
    $pass = "aluno";
    $dbName = "project";
    $db = "mysql";

    try {
        $PDO = new PDO($db . ':host=' . $host . ';dbname=' . $dbName, $user, $pass);
        $PDO -> setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        return $PDO;
    } catch (PDOException $e) {
        echo "erro ao conectar: " . $e->getMessage();
    }
}