<?php

ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

//Load Composer's autoloader
require 'vendor/autoload.php';

if (!empty($_POST['email']) &&
    !empty($_POST['firstname']) &&
    !empty($_POST['surname']) &&
    !empty ($_POST['phone']) &&
    !empty ($_POST['address_start']) &&
    !empty ($_POST['address_finish']) &&
    !empty ($_POST['date']) &&
    !empty ($_POST['time']) &&
    !empty ($_POST['quantity']) &&
    !empty ($_POST['agreement'])) {


    $mail = new PHPMailer(true);


    //Server settings
    $mail->SMTPDebug = SMTP::DEBUG_OFF;                      //Enable verbose debug output
    $mail->isSMTP();                                            //Send using SMTP
    $mail->Host = 'smtp.gmail.com';                     //Set the SMTP server to send through
    $mail->SMTPAuth = true;                                   //Enable SMTP authentication
    $mail->Username = 'd.zapekin@gmail.com';                     //SMTP username
    $mail->Password = 'xcyecervxxevbfqp';                               //SMTP password
    $mail->SMTPSecure = PHPMailer::ENCRYPTION_SMTPS;            //Enable implicit TLS encryption
    $mail->Port = 465;                                    //TCP port to connect to; use 587 if you have set `SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS`

    //Recipients
    $mail->setFrom('d.zapekin@gmail.com');
    $mail->addAddress('d.zapekin@gmail.com');     //Add a recipient


    //Content
    $mail->isHTML(true);                                  //Set email format to HTML
    $mail->Subject = '"Objednavka na trasfer';
    $mail->Body =
        '<p>E-mail: ' . $_POST['email'] . '</p>' .
        '<p>Meno: ' . $_POST['firstname'] . '</p>' .
        '<p>Priezvisko: ' . $_POST['surname'] . '</p>' .
        '<p>Tel cislo: ' . $_POST['phone'] . '</p>' .
        '<p>Odkial: ' . $_POST['address_start'] . '</p>' .
        '<p>Kam: ' . $_POST['address_finish'] . '</p>' .
        '<p>Date: ' . $_POST['date'] . '</p>' .
        '<p>Cas: ' . $_POST['time'] . '</p>' .
        '<p>Pocet osob: ' . $_POST['quantity'] . '</p>' .
        '<p>Vozidlo: ' . $_POST['cars'] . '</p>' .
        '<p>Text: ' . $_POST['text'] . '</p>' .
        '<p>Agreement: ' . $_POST['agreement'] . '</p>';

    $mail->AltBody = 'This is the body in plain text for non-HTML mail clients';


    if (!$mail->send()) {
        $message = 'Nastala hyba...';
    } else {
        $message = 'Objednávka bola odoslana. Ďakujeme.';

    }

    $response = ['message' => $message];

    header('Content-type: application/json');
    echo json_encode($response);


}
?>



