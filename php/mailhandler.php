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
$mailhost = 'w01a8744.kasserver.com';
$mailusername = 'm059729b';
$mailpassword = 'fegfgX5fpnLmMrB5';

$mail->IsSMTP();
$mail->Host = $mailhost;
//$mail->SMTPDebug = 1; // Kann man zu debug Zwecken aktivieren
$mail->SMTPAuth = true;
$mail->Username = $mailusername;
$mail->Password = $mailpassword;

$frommail = "oliver.kroiss@ex-pain.de";
$fromname = "Kontaktanfrage";
$mail->SetFrom($frommail, $fromname);

$address = "oliver.kroiss@ex-pain.de";
$adrname = "Kontaktanfrage";
$mail->AddAddress($address, $adrname);

$mail->Subject = "Anfrage Textformular";

$output = <<<EOF
E-Mail: $email
Name: $name
Nachricht: $message
EOF;

$mail->Body = $output;

//if ($mail->Send() == false) {
//    echo "Mailer Error: " . $mail->ErrorInfo;
//} else {
//    echo "Message sent!";
//}

$mail->Send();

header('Location: '.DOMAIN.'/kontaktbestaetigung');
?>