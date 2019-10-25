<?php
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

class ctr_enviar_correo{

  public function enviar_correo($to,$Subject,$Body,$non_HTML){

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
    $mail->isSMTP();
    
    $mail->Host       = __mail_Host;
    $mail->SMTPAuth   = true;
    $mail->Username   = __mail_Username;
    $mail->Password   = __mail_Password;
    $mail->SMTPSecure = __mail_SMTPSecure;//PHPMailer::ENCRYPTION_SMTPS;         // Enable TLS encryption; `PHPMailer::ENCRYPTION_SMTPS` also accepted
    $mail->Port       = __mail_Port;
    $mail->CharSet = 'UTF-8';
    $mail->setFrom('info@dialcomcr.com', 'DIALCOM TICKETS');

    $correos = explode(";",$to);
    //print_r($correos);
    foreach ($correos as $value) {
      $mail->addAddress($value, ''); 
    }

    //$mail->addAddress('desarrollo2@dialcomcr.com', '');     // Add a recipient
   // $mail->addAddress('jersonfjl@live.com', '');

    $mail->isHTML(true);
    $mail->Subject = $Subject;

    $mail->Body    = $Body;
    $mail->AltBody = $non_HTML;

    $mail->send();
    //echo 'Message has been sent';
  } catch (Exception $e) {
   // echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
  }
}

}


?>





