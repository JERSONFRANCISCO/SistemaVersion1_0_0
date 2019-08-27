<?php
// Varios destinatarios
$para  = 'jersonfjl@live.com' . ', '; // atención a la coma
$para .= 'jersonfjl@live.com';

// título
$título = 'Recordatorio de cumpleaños para Agosto';

// mensaje
$mensaje = '
<html>
<head>
  <title>Recordatorio de cumpleaños para Agosto</title>
</head>
<body>
  <p>¡Estos son los cumpleaños para Agosto!</p>
  <table>
    <tr>
      <th>Quien</th><th>Día</th><th>Mes</th><th>Año</th>
    </tr>
    <tr>
      <td>Joe</td><td>3</td><td>Agosto</td><td>1970</td>
    </tr>
    <tr>
      <td>Sally</td><td>17</td><td>Agosto</td><td>1973</td>
    </tr>
  </table>
</body>
</html>
';

// Para enviar un correo HTML, debe establecerse la cabecera Content-type
$cabeceras  = 'MIME-Version: 1.0' . "\r\n";
$cabeceras .= 'Content-type: text/html; charset=iso-8859-1' . "\r\n";

// Cabeceras adicionales
$cabeceras .= 'To: Mary <jersonfjl@live.com>, Kelly <jersonfjl@live.com>' . "\r\n";
$cabeceras .= 'From: Recordatorio <jersonfjl@live.com>' . "\r\n";
$cabeceras .= 'Cc: jersonfjl@live.com' . "\r\n";
$cabeceras .= 'Bcc: jersonfjl@live.com' . "\r\n";

// Enviarlo
mail($para, $título, $mensaje, $cabeceras);
echo "se envió correo";
?>