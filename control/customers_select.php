<?php

include_once $_SERVER["DOCUMENT_ROOT"]."/project_PI/DAO/connection.php";
include_once $_SERVER["DOCUMENT_ROOT"]."/project_PI/DAO/customersBd.php";


$id = $_GET["id"];
die(var_dump($id));
$customer = getCustomers($id)


