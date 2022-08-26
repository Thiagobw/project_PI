<?php

$name = $_POST[''];
$cpf = $_POST[''];
$tell = $_POST[''];
$email = $_POST[''];
$password = $_POST[''];

$users = new users();

$users->setName($name);
$users->setCpf($cpf);
$users->setTell($tell);
$users->setEmail($email);
$users->setPassword($password);