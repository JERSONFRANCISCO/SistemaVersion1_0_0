<?php
/*
require "PHPMailer/Exception.php";
require "PHPMailer/PHPMailer.php";
require "PHPMailer/SMTP.php";

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

$oMail= new PHPMailer();
$oMail->isSMTP();
$oMail->Host="";
$oMail->Port=587;
$oMail->SMTPSecure="tls";
$oMail->SMTPAuth=true;
$oMail->Username="";
$oMail->Password="";
$oMail->setFrom("fe@dialcomcr.com","Pepito el que pica papas");
$oMail->addAddress("jersonfjl@live.com","Pepito2");
$oMail->Subject="Hola pepe el que pica";
$oMail->msgHTML("Hola soy un mensaje");

if(!$oMail->send())
	echo $oMail->ErrorInfo;  
*/
require "PHPMailer/Exception.php";
require "PHPMailer/PHPMailer.php";
require "PHPMailer/SMTP.php";

use PHPMailer\PHPMailer\PHPMailer;
$mail = new PHPMailer();

//Luego tenemos que iniciar la validación por SMTP:
$mail->IsSMTP();
$mail->SMTPAuth = true;
$mail->Host = "mail.dialcomcr.com"; // SMTP a utilizar. Por ej. smtp.elserver.com
$mail->Username = "fe@dialcomcr.com"; // Correo completo a utilizar
$mail->Password = "dialcom@"; // Contraseña
$mail->Port = 587; // Puerto a utilizar

//Con estas pocas líneas iniciamos una conexión con el SMTP. Lo que ahora deberíamos hacer, es configurar el mensaje a enviar, el //From, etc.
$mail->From = "info@elserver.com"; // Desde donde enviamos (Para mostrar)
$mail->FromName = "Nombre";

//Estas dos líneas, cumplirían la función de encabezado (En mail() usado de esta forma: "From: Nombre <correo@dominio.com>") de //correo.
$mail->AddAddress("jersonfjl@live.com"); // Esta es la dirección a donde enviamos
$mail->IsHTML(true); // El correo se envía como HTML
$mail->Subject = "Titulo"; // Este es el titulo del email.
$body = "Hola mundo. Esta es la primer línea<br />";
$body .= "Acá continuo el <strong>mensaje</strong>";
$mail->Body = $body; // Mensaje a enviar
$exito = $mail->Send(); // Envía el correo.
//$exito="false";
//También podríamos agregar simples verificaciones para saber si se envió:
if($exito){
echo "El correo fue enviado correctamente.";
}else{
echo "Hubo un inconveniente. Contacta a un administrador.";
}
?>

