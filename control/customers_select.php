<?php

include_once $_SERVER["DOCUMENT_ROOT"]."/project_PI/DAO/connection.php";
include_once $_SERVER["DOCUMENT_ROOT"]."/project_PI/DAO/customersBd.php";


$id = $_GET["id"];
$customer = getCustomer($id);

json_decode();