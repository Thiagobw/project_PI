<?php
if(!$_SESSION['autenticado']) {
    session_destroy();
    header('Location: ../../view');
} else {
    $user = $_SESSION['usuario'];
    $userName = $user['nome'];
    $shortName = explode(' ', $userName, -1);
}