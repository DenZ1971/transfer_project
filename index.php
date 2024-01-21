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
        $mail->Subject = 'Here is the subject';
        $mail->Body = "Objednavka na trasfer \n" .
            'E-mail: ' . $_POST['email'] . "\n" .
            ' | Meno: ' . $_POST['firstname'] . "\n" .
            ' | Priezvisko: ' . $_POST['surname'] . "\n" .
            ' | Tel cislo: ' . $_POST['phone'] . "\n" .
            ' | Odkial: ' . $_POST['address_start'] . "\n" .
            ' | Kam: ' . $_POST['address_finish'] . "\n" .
            ' | Date: ' . $_POST['date'] . "\n" .
            ' | Cas: ' . $_POST['time'] . "\n" .
            ' | Pocet osob: ' . $_POST['quantity'] . "\n" .
            ' | Vozidlo: ' . $_POST['cars'] . "\n" .
            ' | Text: ' . $_POST['text'] . "\n" .
            ' | Agreement: ' . $_POST['agreement'];

    $mail->AltBody = 'This is the body in plain text for non-HTML mail clients';

    $mail->send();

    try {

        header("Location: success.php");
        exit();
    } catch (Exception $e) {
        echo 'Mailer Error: ' . $mail->ErrorInfo;
    }
}

?>


<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
<!--    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">-->
    <link rel="stylesheet" href="./css/style.css">

    <title>Document</title>
</head>
<body>
    <div class="wrapper">
    <form action="" method="post" id="form-data" class="form-data" autocomplete="on">
        <h1 class="form_title">Objednavka</h1>
        <h4 class="form_description">Po vyplnení a zaslaní objednávky vás budeme kontaktovať emailom o potvrdení a upresnení všetkých podrobností.
Vyplňte všetky povinné polia *: meno a priezvisko, e-mail, telefónne číslo, odkiaľ, kam, čas, počet osôb, dátum. Pre upresnenie môžete vyplniť aj krátky popis k objednávke.</h4>

        <div class="mb-3">
            <label for="firstname" class="form-label">Meno *</label>
            <input type="text"
                   class="form-control"
                   id="firstname"
                   name="firstname"
                   placeholder="Meno"
                   required>
        </div>
        <div class="mb-3">
            <label for="surname" class="form-label">Priezvisko *</label>
            <input type="text"
                   class="form-control"
                   id="surname"
                   name="surname"
                   placeholder="Priezvisko"
                   required>
        </div>
        <div class="mb-3">
            <label for="email" class="form-label">E-mail *</label>
            <input type="email"
                   class="form-control"
                   id="email"
                   name="email"
                   placeholder="E-mail"
                   required>
        </div>
        <div class="mb-3">
            <label for="phone" class="form-label">Tel. číslo *</label>
            <input type="tel"
                   class="form-control"
                   id="phone"
                   name="phone"
                   placeholder="Tel. číslo"
                   required>
        </div>
        <div class="mb-3">
            <label for="address_start" class="form-label">Adresa vyzdvihnutia *</label>
            <input type="text"
                   class="form-control"
                   id="address_start"
                   name="address_start"
                   placeholder="Adresa vyzdvihnutia"
                   required>
        </div>
        <div class="mb-3">
            <label for="address_finish" class="form-label">Cieľová adresa *</label>
            <input type="text"
                   class="form-control"
                   id="address_finish"
                   name="address_finish"
                   placeholder="Cieľová adresa"
                   required>
        </div>
        <div class="mb-3">
            <label for="date" class="form-label">Datum vyzdvihnutia *</label>
            <input type="date"
                   class="form-control"
                   id="date"
                   name="date"
                   placeholder="Datum vyzdvihnutia"
                   required>
        </div>
        <div class="mb-3">
            <label for="time" class="form-label">Čas vyzdvihnutia *</label>
            <input type="time"
                   class="form-control"
                   id="time"
                   name="time"
                   placeholder="Čas vyzdvihnutia"
                   required>
        </div>
        <div class="mb-3">
            <label for="quantity" class="form-label">Počet osôb *</label>
            <input type="number"
                   min="1"
                   max="4"
                   class="form-control"
                   id="quantity"
                   name="quantity"
                   placeholder="Počet osôb"
                   required>
        </div>

        <h3 class="form_additional-description"> Doplnkové informácie </h3>

        <div class="mb-3">
            <label for="cars" class="form-label">Výber vozidla </label>
            <select
                   class="form-control"
                   id="cars"
                   name="cars">
                <option value="--">------</option>
                <option value="Mercedes C-class T-model">Mercedes C-class T-model</option>

            </select>
        </div>

        <div class="mb-3">
            <label for="text" class="form-label">Správa pre vodiča</label>
            <textarea class="form-control"
                      id="text"
                      name="text"
                      rows="4"></textarea>
        </div>

        <div class="mb-3">
            <div class="checkbox">
                <input id="formAgreement" checked type="checkbox" name="agreement" class="checkbox_input">
                <label for="formAgreement" class="checkbox_label"><span>Súhlasím so všeobecnými obchodnými podmienkami a informáciou o spracúvaní osobných údajov pre účely vybavenia objednávky.</span></label>
            </div>
        </div>


        <button type="submit" name="submit" class="btn btn-primary">Objednať vozidlo</button>
    </form>
    </div>




</body>
</html>

