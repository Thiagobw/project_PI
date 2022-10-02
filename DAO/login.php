<?php

$login = $_POST[''];
$entrar = $_POST[''];
$senha = md5($_POST['']);
$connect = mysqli_connect('','');
$db = mysqli_select_db('mydb');
  if (isset($entrar)) {

    $verifica = mysqli_query("SELECT * FROM usuarios WHERE email =" + $login , "AND senha =" + $senha) or die ("erro ao selecionar");
      if (mysqli_num_rows($verifica)<=0){
        echo"<script language='javascript' type='text/javascript'>
        alert('Login e/ou senha incorretos');window.location
        .href='login.html';</script>";
        die();
      }else {
        setcookie("login",$login);
        header("Location:index.php");
      }
  }
?>