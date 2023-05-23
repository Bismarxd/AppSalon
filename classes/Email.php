<?php

namespace Classes;

use PHPMailer\PHPMailer\PHPMailer;

class Email
{
    public $email;
    public $nombre;
    public $token;

    public function __construct($nombre, $email, $token)
    {
        $this->nombre = $nombre;
        $this->email = $email;        
        $this->token = $token;
    }

    public function enviarConfirmacion()
    {
        //crear el objeto de email
        $mail = new PHPMailer();
        $mail->isSMTP();       
        $mail->Host = 'sandbox.smtp.mailtrap.io';
        $mail->SMTPAuth = true;
        $mail->Port = 2525;
        $mail->Username = 'df0c7c4a8e557d';
        $mail->Password = '2012ee7ee666ae';

        $mail->setFrom('cuentas@appsalon.com');
        $mail->addAddress('cuentas@appsalon.com', 'AppSalon.com');
        $mail->Subject = 'Confirma tu Cuenta';
       
        //set Html
        $mail->isHTML(TRUE);
        $mail->CharSet = 'UTF-8';

        $contenido = "<html>";
        $contenido .= "<p><strong>Hola " . $this->nombre . "</strong> Has creado tu cuenta en AppSalon, solo debes confirmarla presionando en el siguiente enlace</p>";
        $contenido .= "<p>Presiona aquí: <a href='http://localhost:3000/confirmar-cuenta?token=" . $this->token . "'>Confirmar Cuenta</a> </p>";
        $contenido .= "<p>Si tu no solicitaste esta cuenta, puedes ignorar el mensaje</p>";
        $contenido .= "</html>";

        $mail->Body = $contenido;

        //Enviar el Mail
        $mail->send();
    }

    public function enviarInstrucciones()
    {
          //crear el objeto de email
          $mail = new PHPMailer();
          $mail->isSMTP();       
          $mail->Host = 'sandbox.smtp.mailtrap.io';
          $mail->SMTPAuth = true;
          $mail->Port = 2525;
          $mail->Username = 'df0c7c4a8e557d';
          $mail->Password = '2012ee7ee666ae';
  
          $mail->setFrom('cuentas@appsalon.com');
          $mail->addAddress('cuentas@appsalon.com', 'AppSalon.com');
          $mail->Subject = 'Reestablece tu Password';
         
          //set Html
          $mail->isHTML(TRUE);
          $mail->CharSet = 'UTF-8';
  
          $contenido = "<html>";
          $contenido .= "<p><strong>Hola " . $this->nombre . "</strong> Has solicitado reestablecer tu password presiona el siguiente enlace para hacerlo</p>";
          $contenido .= "<p>Presiona aquí: <a href='http://localhost:3000/recuperar?token=" . $this->token . "'>Reestablecer Password</a> </p>";
          $contenido .= "<p>Si tu no solicitaste esta cuenta, puedes ignorar el mensaje</p>";
          $contenido .= "</html>";
  
          $mail->Body = $contenido;
  
          //Enviar el Mail
          $mail->send();
    }
}