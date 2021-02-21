<section>
    <div class="main-wrapper">
        <div class="inner-wrapper">
            <h2>Mail</h2>
            <?php

            require_once 'PHPMailer-master/src/PHPMailer.php';
            require_once 'PHPMailer-master/src/SMTP.php';

            use PHPMailer\PHPMailer\PHPMailer;

            $prevSite = $_POST['prev_site'];

//            header('Location: '.$prevSite.'#kontaktformular');

            $name = $_POST['name'];
            $surname = $_POST['surname'];
            $email = $_POST['email'];
            $message = $_POST['message'];

            $mail = new PHPMailer();
            $mailhost = 'mx2fa3.netcup.net';
            $mailusername = 'info@sebern.de';
            $mailpassword = 'Ohnename123';

            $mail->IsSMTP();
            $mail->Host       = $mailhost;
            $mail->SMTPDebug  = 1; // Kann man zu debug Zwecken aktivieren
            $mail->SMTPAuth   = true;
            $mail->Username   = $mailusername;
            $mail->Password   = $mailpassword;

            $frommail = "info@sebern.de";
            $fromname = "Sebastian Ernst";
            $mail->SetFrom($frommail, $fromname);

            $address = $email;
            $adrname = $name.' '.$surname;
            $mail->AddAddress($address, $adrname);

            $mail->Subject = "Kontaktanfrage";
            $mail->Body = $message;

            if(!$mail->Send()) {
                echo "Mailer Error: " . $mail->ErrorInfo;
            } else {
                echo "Message sent!";
            }
            ?>
        </div>
    </div>
</section>
