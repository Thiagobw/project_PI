<?php

function connect() {
    $host = "localhost";
    $user = "root";
    $pass = "aluno";
    $dbName = "mydb";
    $db = "mysql";

    try {
        $PDO = new PDO($db . ':host=' . $host . ';dbname=' . $dbName, $user, $pass);
        $PDO -> setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        echo "deu certo";
        return $PDO;
    } catch (PDOException $e) {
        echo "erro ao conectar: " . $e->getMessage();
    }
  header('Location: http://localhost/project_PI/view/salePage.php?#', true, 301);
  exit();
}