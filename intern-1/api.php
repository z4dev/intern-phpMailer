<?php
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require 'vendor/autoload.php';
require 'vendor/phpmailer/phpmailer/src/Exception.php';
require 'vendor/phpmailer/phpmailer/src/PHPMailer.php';
require 'vendor/phpmailer/phpmailer/src/SMTP.php';


//the logic is send from alfarrajs2004@gmail to  the user 
// i can only send using the email in the smtp server , 

const RETURN_TO_FORM_PAGE = "<script>
setTimeout(function(){
   window.location.href = 'views/sendEmail.html';
}, 2000);
</script>";


if(isset(($_POST['btn']))){
    $name = $_POST['name'];
    $email = $_POST['email']; // from 
    $subject = $_POST['subject'];
    $message = $_POST['message'];
    $prefinedEmail = "alfarrajs2004@gmail.com";

    if (empty($name)) {
        $errors[] = "Name is required";
    }
    if (empty($email)) {
        $errors[] = "Email is required";
    }
    if (empty($subject)) {
        $errors[] = "Subject is required";
    }
    if (empty($message)) {
        $errors[] = "Message is required";
    }
    
    if (!empty($errors)) {
        foreach ($errors as $error) {
            echo $error . "<br>";
        }
        echo RETURN_TO_FORM_PAGE;
    }
    
   
}

$mail = new PHPMailer(true);

try{
    $mail->SMTPDebug = 0;                     
    $mail->isSMTP();                                            
    $mail->Host = 'smtp.gmail.com';                    
    $mail->SMTPAuth= true;                                  
    $mail->Username="alfarrajs2004@gmail.com";                    
    $mail->Password= "dzag rfma bhqz udao";
    $mail->SMTPSecure = 'tls';         
    $mail->Port= 587;   
    
    

   
    $mail->setFrom($email, "web-site-user"); // the sender 
    $mail->addAddress($prefinedEmail, "web-site-user"); //  the receiver

    
    $mail->addReplyTo($email, $name); // replying to the email of the user



    // Content of the message sent by the user to the admin
    $mail->isHTML(true); 
    $mail->Subject = "the subject is: ".$subject;
    $mail->Body = '<html><body>';
    $mail->Body .= '<div style="font-family: Arial, sans-serif; color: #333; background-color: #f4f4f4; padding: 20px; border-radius: 8px;">';
    $mail->Body .= '<h2 style="color: #4A90E2;">You have a new message from: ' . htmlspecialchars($name) . '</h2>';
    $mail->Body .= '<p><strong>Email:</strong> ' . htmlspecialchars($email) . '</p>';
    $mail->Body .= '<p><strong>Message:</strong></p>';
    $mail->Body .= '<div style="background-color: #fff; padding: 15px; border-radius: 5px; border: 1px solid #ddd;">' . nl2br(htmlspecialchars($message)) . '</div>';
    $mail->Body .= '</div>';
    $mail->Body .= '</body></html>';
    // end 
    $mail->send();
    echo RETURN_TO_FORM_PAGE . "Message has been sent";
   
}
    
    catch (Exception $e) {
        echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
    }




?>



<!-- qcwe iuaa bsfo omlc -->