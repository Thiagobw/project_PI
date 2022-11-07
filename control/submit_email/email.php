<?php

namespace control\submit_email;

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception as PHPMailerException;


class Email {


    /*
     * credenciais de acesso ao SMTP
     */
    const HOST = 'smtp.gmail.com';
    const USER = 'laimports@gmail.com';
    const PASS = 'senha';
    const SECURE = 'TLS';
    const PORT = 587;
    const CHARSET = 'UTF-8';


    /**
     * dados do remetente
     * 
     */
    const FROM_EMAIL = 'laimports@gmail.com';
    const FROM_NAME = 'NOME NOME';

    /**
     *  mensagem de erro
     */
    private $error;

    public function getError() {
        return $this->error;
    }

    public function sendMail ($addresses, $subject, $body) {

        $this ->error = '';

        $mail = new PHPMailer(true);

        try {
            // credenciais
            $mail ->isSMTP(true);
            $mail ->Host = self::HOST;
            $mail ->SMTPAuth = true;
            $mail ->Username = self::USER;
            $mail ->Password = self::PASS;
            $mail ->SMTPSecure = self::SECURE;
            $mail ->Port = self::PORT;
            $mail ->CharSet = self::CHARSET;
            
            // remetente
            $mail ->setFrom(self::FROM_EMAIL, self::FROM_NAME);

            // destinatario
            $addresses = is_array($addresses) ? $addresses : [$addresses];
            foreach($addresses as $addresses) {
                $mail ->addAddress($addresses);
            }

            // conteudo do email
            $mail ->isHTML(true);
            $mail ->Subject = $subject;
            $mail ->Body = $body;

            $mail ->send();

        } catch (PHPMailerException $e) {
            $this->error = $e ->getMessage();
            return false;
        }
    }
}