<?php 

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

require 'vendor/autoload.php';

define('USER', 'theprincesscentromedico01@gmail.com');
define('PASS', 'theprincess01');

$mail = new PHPMailer(true);

try{
    $mail->SMTPDebug = SMTP::DEBUG_SERVER;
    $mail->isSMTP();
    $mail->Host = 'smtp.gmail.com';
    $mail->SMTPAuth = true;
    $mail->Username = USER;
    $mail->Password = PASS;
    $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;
    $mail->Port = 587;

    $mail->setFrom(USER, 'The Princess Centro Medico');
    $mail->addAddress('theprincesscentromedico01@gmail.com');

    $mail->isHTML(true);
    $mail->Subject = 'CONSULTA DESDE LA WEB';
    $mail->Body = 'Los datos de la o el paciente son: '. '<br>' . 'Nombre: '. $_POST['name']. ' genero ' . $_POST['gender'] . '<br>'. 'Correo: '. $_POST['email']. '<br>' . 'Numero: '. $_POST['number'] . '<br>' . 'Presenta los siguientes sintomas: '. $_POST['symptoms'] . '<br>' . 'Le gustaria agendar el dia '. $_POST['datepicker1'] . ' a las ' . $_POST['time'] . ' en el departamento de ' . $_POST['departament'] ;
    $mail->AltBody = 'Hola Mundo';

    $mail->send();
    echo 'El correo se ha enviado correctamente, recibira respuesta dentro de las proximas dos horas.';
}catch(Exception $e){
    echo 'Ha ocurrido un error al enviar el correo: '.$mail->ErrorInfo;


}
