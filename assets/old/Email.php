<?php

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

//Load Composer's autoloader
require './classes/vendor/autoload.php';

class Email{
  private $mailer;
  private $email;
  private $username;
  private $senha;
  private $name;

  function __construct($email, $username, $senha, $name){
    $this->email = $email;
    $this->username = $username;
    $this->senha = $senha;
    $this->name = $name;

    // Configurações de envio de e-mail
    $this->mailer = new PHPMailer(true);
    $this->mailer->SMTPDebug = SMTP::DEBUG_SERVER; // Enable verbose debug output
    $this->mailer->isSMTP();
    $this->mailer->Host = 'smtp.hostinger.com'; // servidor SMTP
    $this->mailer->SMTPAuth = true; // autenticação SMTP
    $this->mailer->Username = $username; // seu email SMTP
    $this->mailer->Password = $senha; // sua senha SMTP
    $this->mailer->SMTPSecure = 'tls'; // criptografia TLS
    $this->mailer->Port = 587; // porta do servidor SMTP
  }

  public function addAddress($email, $name){
    $this->mailer->addAddress($email, $name);
  }

  public function formatarEmail($info){
    $this->mailer->Subject = $info['assunto'];
    $this->mailer->Body = $info['corpo'];
    $this->mailer->AltBody = strip_tags($info['corpo']);
  }

  public function enviarEmail(){
    try {
      $this->mailer->send();
      echo 'E-mail enviado com sucesso!';
    } catch (Exception $e) {
      echo "Erro ao enviar e-mail: {$this->mailer->ErrorInfo}";
    }
  }
}
?>
