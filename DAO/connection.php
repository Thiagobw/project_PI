<?php

function connect() {
    $host = "";  /* localhost */
    $user = ""; /* root */
    $pass = ""; /* password database */
    $dbName = ""; /* name database */
    $db = ""; /* mysql  */

    try {
        $PDO = new PDO($db . ':host=' . $host . ';dbname=' . $dbName, $user, $pass);
        $PDO -> setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        return $PDO;

    } catch (PDOException $e) {
        echo "erro ao conectar: " . $e->getMessage();
    }
}