<?php
/*
    if(isset($_POST["reset-request-submit"])) {
        $selector = bin2hex(random_bytes(8));
        $token = random_bytes(32);

        $url = "localhost/e-learning-/application files/create_new_password.php?selector=" . $selector . "&validator=" . bin2hex($token);
        $expires = date("U") + 1800;

        require 'config.php';

        $userEmail = $_POST["email"];
        $sql = "DELETE FROM pwdReset WHERE pwdResetEmail=?;";
        $stmt = mysqli_stmt_init($conn);

        if (!mysqli_stmt_prepare($stmt, $sql)){
            echo "There was an error!";
            exit();
        } else {
            mysqli_stmt_bind_param($stmt, "s", $userEmail);
            mysqli_stmt_execute($stmt);
        }

        $sql = "INSERT INTO pwdReset (pwdResetEmail, pwdResetSelector, pwdResetToken, pwdResetExpires) VALUES (?, ?, ?, ?);";
        $stmt = mysqli_stmt_init($conn);

        if (!mysqli_stmt_prepare($stmt, $sql)){
            echo "There was an error!";
            exit();
        } else {
            $hashedToken = password_hash($token, PASSWORD_DEFAULT);
            mysqli_stmt_bind_param($stmt, "ssss", $userEmail, $selector, $hashedToken, $expires);
            mysqli_stmt_execute($stmt);
        }
 
            mysqli_stmt_close($stmt);
            mysqli_close($conn);
// 38:02 here

            $to = $userEmail;
            $subject = 'Reset your password for E-learning';
            $message = '<p>We received a password reset request. The link to reset your password, if you did not make this request, you can ignore this email</p>';
            $message .= '<p>Here is your password reset link: </br>';
            $message .= '<a href = "' .$url .'">' . $url . '</a></p>';

            $headers = "From: admin <admin@e-learning.com>\r\n";
            $headers .= "Reply-To: partners@e-learning.com\r\n";
            $headers .= "Content-type: text/html\r\n";

            mail($to, $subject, $message, $headers);

            header("Location: reset_password.php?success");

    } else {
            header("Location: login.php");
    }



  */  
?>

<?php

// Import PHPMailer classes into the global namespace
// These must be at the top of your script, not inside a function
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;
include 'config.php';
// Load Composer's autoloader
require '../vendor/autoload.php';

// Instantiation and passing `true` enables exceptions
$mail = new PHPMailer(true);

try {
    //Server settings
    $mail->SMTPDebug = SMTP::DEBUG_SERVER;                      // Enable verbose debug output
    $mail->isSMTP();                                            // Send using SMTP
    $mail->Host       = 'smtp.gmail.com';                    // Set the SMTP server to send through
    $mail->SMTPAuth   = true;                                   // Enable SMTP authentication
    $mail->Username   = 'controlswitch.2@gmail.com';                     // SMTP username
    $mail->Password   = 'admin@007';                               // SMTP password
    $mail->SMTPSecure = 'tls';         // Enable TLS encryption; `PHPMailer::ENCRYPTION_SMTPS` encouraged
    $mail->Port       = 587;                                    // TCP port to connect to, use 465 for `PHPMailer::ENCRYPTION_SMTPS` above

    if(isset($_POST["reset-request-submit"])) {
        $selector = bin2hex(random_bytes(8));
        $token = random_bytes(32);

        $url = "localhost/e-learning-/application files/create_new_password.php?selector=" . $selector . "&validator=" . bin2hex($token);
        $expires = date("U") + 1800;

    $userEmail = $_POST["email"];
    $sql = "DELETE FROM pwdReset WHERE pwdResetEmail=?;";
    $stmt = mysqli_stmt_init($conn);

    if (!mysqli_stmt_prepare($stmt, $sql)){
        echo "There was an error!";
        exit();
    } else {
        mysqli_stmt_bind_param($stmt, "s", $userEmail);
        mysqli_stmt_execute($stmt);
    }

    $sql = "INSERT INTO pwdReset (pwdResetEmail, pwdResetSelector, pwdResetToken, pwdResetExpires) VALUES (?, ?, ?, ?);";
    $stmt = mysqli_stmt_init($conn);

    if (!mysqli_stmt_prepare($stmt, $sql)){
        echo "There was an error!";
        exit();
    } else {
        $hashedToken = password_hash($token, PASSWORD_DEFAULT);
        mysqli_stmt_bind_param($stmt, "ssss", $userEmail, $selector, $hashedToken, $expires);
        mysqli_stmt_execute($stmt);
    }

        mysqli_stmt_close($stmt);
        mysqli_close($conn);
    }
    //Recipients
    $mail->setFrom('controlswitch.2@gmail.com', 'E-learning Inc');
    $mail->addAddress($userEmail);     // Add a recipient

    // Attachments
    //$mail->addAttachment('/var/tmp/file.tar.gz');         // Add attachments
    //$mail->addAttachment('/tmp/image.jpg', '');    // Optional name

    // Content
    $mail->isHTML(true);                                  // Set email format to HTML
    $mail->Subject = 'Reset your password for E-learning';
    $mail->Body    = '<p>We received a password reset request. The link to reset your password, if you did not make this request, you can ignore this email</p>';
    $mail->Body .='<p>Here is your password reset link: </br>';
    $mail->Body .= '<a href = "' .$url .'">' . $url . '</a></p>';
     $mail->AltBody = 'Message sent';
    $mail->send();
    echo 'Message has been sent';
} catch (Exception $e) {
    echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
}

?>