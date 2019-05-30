<?php
 
//require 'PHPMailer/class.phpmailer.php';
require 'PHPMailer/PHPMailerAutoload.php';
 
$mail = new PHPMailer;

$mail->SMTPDebug=2;
 
 
/** Configurar SMTP **/

$mail->isSMTP();                                      // Indicamos que use SMTP
$mail->Host = 'smtp.gmail.com';  // Indicamos los servidores SMTP
$mail->SMTPAuth = true;                               // Habilitamos la autenticación SMTP
$mail->Username = 'soranyimartinezp18@gmail.com';                 // SMTP username
$mail->Password = 'zaira0624.';                           // SMTP password
$mail->SMTPSecure = 'ssl';                            // Habilitar encriptación TLS o SSL
$mail->Port = 465;                                     // TCP port
 
/** Configurar cabeceras del mensaje **/
$mail->From = 'soranyimartinezp18@gmail.com';                       // Correo del remitente
$mail->FromName = 'Banco de Proyectos Uniminuto';           // Nombre del remitente
//$mail->Subject = 'Etapas del Proyecto';                // Asunto
 
$mail->isHTML(true); 
 
$mail->setLanguage('es');

/** Incluir destinatarios. El nombre es opcional **/
//$mail->addAddress('soranyimartinez18@hotmail.com', 'Soranyi Martinez');
//$mail->addAddress('mauro8578@hotmail.com', 'Mauricio Chaparro');
$mail->addAddress('soranyimartinezp18@gmail.com', 'Soranyi Martinez');
 
/** Con RE, CC, BCC **/
//$mail->addReplyTo('info@correo.com', 'Informacion');
//$mail->addCC('cc@correo.com');
//$mail->addBCC('bcc@correo.com');
 
/** Incluir archivos adjuntos. El nombre es opcional **/
//$mail->addAttachment('/archivos/miproyecto.zip');        
//$mail->addAttachment('/imagenes/imagen.jpg', 'nombre.jpg');
 
/** Enviarlo en formato HTML **/
//$mail->isHTML(true);                                  
 
/** Configurar cuerpo del mensaje */
$mail->Body    = 'Soy una <b>geniooooo!</b>, lo logreeee, envie mensajes desde la aplicación';
$mail->AltBody = 'Soy una geniooooo!, mi bella genio me quedo en pañales, lo logreeee, envie mensajes desde la aplicación'; 
 
/** Para que use el lenguaje español **/
//$mail->setLanguage('es');
 
// Enviar mensaje... 
if(!$mail->send()) {
    echo 'El mensaje no pudo ser enviado.';
    echo 'Mailer Error: ' . $mail->ErrorInfo;
} else {
    echo 'Mensaje enviado correctamente';
}
?> 