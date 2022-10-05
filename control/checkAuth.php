<?php
if(!$_SESSION['autenticado']) {
    session_destroy();
    header('Location: ../../view');
} else {
    $user = $_SESSION['usuario'];
    $userName = $user['nome'];
    $shortNameArray = explode(' ', $userName, -1);
    if(count($shortNameArray)<=0){
        $shortName =  $userName;
    } else {
        $shortName = $shortNameArray[0];
    }
}