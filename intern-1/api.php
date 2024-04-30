<?php
include 'config/database.php';


const RETURN_TO_FORM_PAGE = "<script>
setTimeout(function(){
   window.location.href = 'views/sendEmail.html';
}, 1000);
</script>";


if(isset(($_POST['btn']))){
    $name = $_POST['name'];
    $email = $_POST['email'];
    $subject = $_POST['subject'];
    $message = $_POST['message'];
    $predefinedEmail = "alfarrajs2004@gmail.com";
    


    if(empty($name)){
        echo "Name is required";
        echo RETURN_TO_FORM_PAGE;
    }
    else if (empty($email)){
        echo "Email is required";
        echo RETURN_TO_FORM_PAGE;
    }
    else if (empty($subject)){
        echo "Subject is required";
        echo RETURN_TO_FORM_PAGE;
    }
    else if (empty($message)){
        echo "Message is required";
        echo RETURN_TO_FORM_PAGE;
    }
     // ?it is not the backend main role but , I am trying to act the  wanted task 
    else{
      $headers = "From: $email";
      $result = mail($predefinedEmail,$subject,$message,$headers);
      if($result){
        echo "email sent successfully";
        echo RETURN_TO_FORM_PAGE;
      }
    }
}




?>