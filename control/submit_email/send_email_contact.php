<?php

require __DIR__.'email.php';

use \control\submit_email\Email;

$addresses = 'thgleopoldo900@gmail.com'; //email de destino
$subject = ''; //assunto 
$body = ''; // corpo da mensagem

$mail = new Email();
$Success = $mail ->sendMail($addresses, $subject, $body);

echo $Success ? 'enviado com sucesso' : $mail ->getError();