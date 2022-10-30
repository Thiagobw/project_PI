<?php

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

require_once 'vendor/autoload.php';
die(var_dump("precisa fazer uma senha na conta do google..."));
if (isset($_POST['submitContact'])) {

    $email = new PHPMailer(true);

    try {
        //$email -> SMTPDebug = SMTP::DEBUG_SERVER;
        $email -> isSMTP();
        $email -> Host = 'smtp.gmail.com';
        $email -> SMTPAuth = true;
        $email -> Username = 'thgleopoldo900@gmail.com';
        $email -> Password =  ''; //fazer senha na conta do google
        $email -> SMTPSecure =  PHPMailer::ENCRYPTION_SMTPS;
        $email -> Port = 465; //se tiver usando um servidor usar porta 587
        
        $email -> setFrom('thgleopoldo900@gmail.com', 'nomeaqui');
        $email -> addAddress('email@gmail.com', 'nome');
        $email -> isHTML(true);
        
        $email -> Subject = 'mensagem enviada via formulario de contato';
        $body = "<p><b>Nome: </b>".$_POST['nameContact']."</p><br>
        <p><b>Email</b>".$_POST['emailContact']."</p><br>
        <p><b>Mensagem: </b>".$_POST['msgContact']."</p>";
        $email ->Body = $body;

        $email ->send();
        echo "Mensagem enviada com sucesso!";
    } catch (Exception $e) {
        echo "Erro ao enviar mensagem: {$email ->ErrorInfo}";
    }
} else {

    echo "não foi possivel enviar mensagem!";
}