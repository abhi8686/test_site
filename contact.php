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

        $mail->Username = 'srikrishna0212@gmail.com'; // YOUR gmail email
        $mail->Password = '9494050601'; // YOUR gmail password

        // Sender and recipient settings
        $mail->setFrom($_POST["email"], $_POST["name"]);
        $mail->addAddress('srikrishna0212@gmail.com', 'Receiver Name');
        $mail->addReplyTo($_POST["email"], $_POST["name"]); // to set the reply to

        // Setting the email content
        $mail->IsHTML(true);
    
        $message = '<html><body><table style="width:200px">';
        $message .= '<tr><td>Name : </td> <td>' + $_POST["name"] + '</td></tr>';
        $message .= '<tr><td>Surname : </td> <td>' + $_POST["surname"] + '</td></tr>';
        $message .= '<tr><td>Country Code : </td> <td>' + $_POST["countrycode"] + '</td></tr>';
        $message .= '<tr><td>Phone Number : </td> <td>' + $_POST["phonenumber"] + '</td></tr>';
        $message .= '<tr><td>Industry : </td> <td>' + $_POST["industry"] + '</td></tr>';
        $message .= '<tr><td>What is your product idea? : </td> <td>' + $_POST["productidea"] + '</td></tr>';
        $message .= '<tr><td>Company Size : </td> <td>' + $_POST["companysize"] + '</td></tr>';
        $message .= '<tr><td>Company Name : </td> <td>' + $_POST["companyname"] + '</td></tr>';
        $message = '</table></body></html>';
        $mail->Subject = 'Request for Demo';
        $mail->Body = $message;

        if($mail->Send()) {
            echo 'success';
        }else{
            echo 'error';
        }
    
} catch (Exception $e) {
    echo "Error in sending email. Mailer Error: {$mail->ErrorInfo}";
}
?>