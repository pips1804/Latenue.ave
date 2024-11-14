<?php 
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

include '../../admin_panel/config/dbconnect.php';
require '../../vendor/autoload.php';

session_start();

        $name = $_SESSION['first-name'];
        $email = $_SESSION['email'];
        $user_id = $_SESSION['user_id'];

        echo $name;
        echo $email;
        echo $user;

        $mail = new PHPMailer(true);
 
        try {

            $mail->SMTPDebug = 2;
            $mail->isSMTP();
            $mail->Host = 'smtp.gmail.com';
            $mail->SMTPAuth = true;
            $mail->Username = 'ibaneziiiwilfredol.pdm@gmail.com';
            $mail->Password = 'lmog zekg secy siqy';
            $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;
            $mail->Port = 587;
            $mail->setFrom('ibaneziiiwilfredol.pdm@gmail.com', 'Latenue.ave');
            $mail->addAddress($email, $name);
            $mail->isHTML(true);

            $verification_code = substr(number_format(time() * rand(), 0, '', ''), 0, 6);
 
            $mail->Subject = 'Email verification';
            $mail->Body    = '<p>Your verification code is: <b style="font-size: 30px;">' . $verification_code . '</b></p>';
 
            $mail->send();
            //echo 'Message has been sent';

 
            $sql = "UPDATE users SET verification_code = $verification_code where user_id = $user_id";
            mysqli_query($conn, $sql);

            $_SESSION['verification_code'] = $verification_code;
            header("Location: ../index.php?code=success");
            exit();
        } 
        
        catch (Exception $e) {
            echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
        }
    

?>