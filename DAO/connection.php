<?php

function connect() {
    $host = "localhost";  /* localhost */
    $user = "root"; /* root */
    $pass = ""; /* password database */
    $dbName = "mydb"; /* name database */
    $db = "mysql"; /* mysql  */

    try {
        $PDO = new PDO($db . ':host=' . $host . ';dbname=' . $dbName, $user, $pass);
        $PDO -> setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        return $PDO;

    } catch (PDOException $e) {
        echo "erro ao conectar: " . $e->getMessage();
    }
}