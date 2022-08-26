<?php

$name = $_POST['name'];
$cpf = $_POST['cpf'];
$tell = $_POST['tell'];
$email = $_POST['email'];
$password = $_POST['password'];

$users = new users();

$users->setName($name);
$users->setCpf($cpf);
$users->setTell($tell);
$users->setEmail($email);
$users->setPassword($password);