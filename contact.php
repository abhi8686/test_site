<?php 
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

require_once "vendor/autoload.php";

//// passing true in constructor enables exceptions in PHPMailer
$mail = new PHPMailer(true);

try {
        $mail->SMTPDebug = SMTP::DEBUG_SERVER; // for detailed debug output
        $mail->isSMTP();
        $mail->Host = 'smtp.gmail.com';
        $mail->SMTPAuth = true;
        $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;
        $mail->Port = 587;

        $mail->Username = ''; // YOUR gmail email
        $mail->Password = ''; // YOUR gmail password

        // Sender and recipient settings
        $mail->setFrom($_POST["email"], $_POST["name"]);
        $mail->addAddress('srikrishna0212@gmail.com', 'Receiver Name');
        $mail->addReplyTo($_POST["email"], $_POST["name"]); // to set the reply to

        // Setting the email content
        $mail->IsHTML(true);
        $mail->Subject = $_POST["title"];
        $mail->Body = $_POST["message"];
        if($mail->Send()) {
            echo 'success';
        }else{
            echo 'error';
        }
    
} catch (Exception $e) {
    echo "Error in sending email. Mailer Error: {$mail->ErrorInfo}";
}
?>