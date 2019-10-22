
<?php
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;


class ctr_enviar_correo{



    public function __construct(){
     //   $this->conexion = new mdl_Conexion();      
    }   
    
    public function enviar_correo(){

       require 'PHPMailer/Exception.php';
       require 'PHPMailer/PHPMailer.php';
       require 'PHPMailer/SMTP.php';

       $mail = new PHPMailer(true);
       try {
        $mail->SMTPOptions = array(
            'ssl' => array(
                'verify_peer' => false,
                'verify_peer_name' => false,
                'allow_self_signed' => true
            )
        );
//    $mail->SMTPDebug = 0;                      // Enable verbose debug output
    $mail->isSMTP();                                            // Send using SMTP                                          // Send using SMTP
    $mail->Host       = __mail_Host;                    // Set the SMTP server to send through
    $mail->SMTPAuth   = true;                                   // Enable SMTP authentication
    $mail->Username   = __mail_Username;                     // SMTP username
    $mail->Password   = __mail_Password;                               // SMTP password
    $mail->SMTPSecure = __mail_SMTPSecure;//PHPMailer::ENCRYPTION_SMTPS;         // Enable TLS encryption; `PHPMailer::ENCRYPTION_SMTPS` also accepted
    $mail->Port       = __mail_Port;                                  // TCP port to connect to

    //Recipients
    $mail->setFrom('gersonfjl@gmail.com', 'Pruebas');
    $mail->addAddress('desarrollo2@dialcomcr.com', 'Jerson');     // Add a recipient
    $mail->addAddress('jersonfjl@live.com', 'Jerson');
   // $mail->addAddress('ellen@example.com');               // Name is optional
   // $mail->addReplyTo('info@example.com', 'Information');
   // $mail->addCC('cc@example.com');
   //  $mail->addBCC('bcc@example.com');

    // Attachments
    //$mail->addAttachment('/var/tmp/file.tar.gz');         // Add attachments
    //$mail->addAttachment('/tmp/image.jpg', 'new.jpg');    // Optional name

    // Content
    $mail->isHTML(true);
    $mail->Subject = 'Here is the subject';
    $mail->Body    = '<table class="egt"><tr><td>Celda 1</td><td>Celda 2</td><td>Celda 3</td></tr><tr><td>Celda 4</td><td>Celda 5</td><td>Celda 6</td></tr></table>';
    $mail->AltBody = 'This is the body in plain text for non-HTML mail clients';

    $mail->send();
    echo 'Message has been sent';
} catch (Exception $e) {
    echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
}
}
public function ejecutar_proc_tareas(){

}

}


?>
