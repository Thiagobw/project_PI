<?php
// function checkAuth(){   
    if(!$_SESSION['autenticado']) {
        session_destroy();
        header('Location: ../view');
        return false;
    } else {
        $user = $_SESSION['usuario'];
        $userName = $user['nome'];
        $shortNameArray = explode(' ', $userName, -1);
        if(count($shortNameArray)<=0){
            $shortName =  $userName;
            return true;
        } else {
            $shortName = $shortNameArray[0];
            return true;
        }
    }
// }