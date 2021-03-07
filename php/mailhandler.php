<?php

$GLOBALS['FORMERRORS'] = [];

if (isset($_POST) === false || count($_POST) === 0) {
    return;
}

require_once 'PHPMailer-master/src/PHPMailer.php';
require_once 'PHPMailer-master/src/SMTP.php';

use PHPMailer\PHPMailer\PHPMailer;

$prevSite = $_POST['prev_site'];



$formErrors = [];
$inputEmptyMessage = 'Dieses Feld darf nicht leer sein.';
$inputWrongEmailMessage ='Bitte geben Sie eine gültige E-Mailadresse an.';

//----------------------------------------------------------------------------------------------------------------------
$name = $_POST['name'];
if ($name === '') {
    $formErrors['name'][] = $inputEmptyMessage;
}

//----------------------------------------------------------------------------------------------------------------------
$email = $_POST['email'];
if (filter_var($email, FILTER_VALIDATE_EMAIL) === false) {
    $formErrors['email'][] = $inputWrongEmailMessage;
}
if ($email === '') {
    $formErrors['email'][] = $inputEmptyMessage;
}

//----------------------------------------------------------------------------------------------------------------------
$message = $_POST['message'];
if ($name === '') {
    $formErrors['message'][] = $inputEmptyMessage;
}

if (count($formErrors) > 0) {
    $GLOBALS['FORMERRORS'] = $formErrors;
    return;
}

$mail = new PHPMailer();
$mailhost = 'mx2fa3.netcup.net';
$mailusername = 'info@sebern.de';
$mailpassword = 'Ohnename123';

$mail->IsSMTP();
$mail->Host = $mailhost;
$mail->SMTPDebug = 1; // Kann man zu debug Zwecken aktivieren
$mail->SMTPAuth = true;
$mail->Username = $mailusername;
$mail->Password = $mailpassword;

$frommail = $email;
$fromname = $name;
$mail->SetFrom($frommail, $fromname);

$address = "ernst.sebastian1991@gmail.com";
$adrname = "Sebastian Ernst";
$mail->AddAddress($address, $adrname);

$mail->Subject = "Kontaktanfrage";
$mail->Body = $message;

if ($mail->Send() == false) {
    echo "Mailer Error: " . $mail->ErrorInfo;
} else {
    echo "Message sent!";
}

header('Location: '.DOMAIN.'/kontaktbestaetigung');
?>
