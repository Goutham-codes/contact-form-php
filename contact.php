<?php

include_once 'sendmail.php';

if (isset($_POST['submit'])){
	$name=htmlspecialchars($_POST['name']);
	$email=htmlspecialchars($_POST['email']);
	$subject=htmlspecialchars($_POST['subject']) || "";
	$message=htmlspecialchars($_POST['message']);
    $errors=false;
    
    // if fields are empty don't send mail
    if(empty($name) || empty($email) || empty($message)){
    	echo "Fill all the Fields!";
    	$errors=true;
    }
    // if email is invalid don't send mail
    elseif(!filter_var($email,FILTER_VALIDATE_EMAIL)){
    	echo "Invalid email!";
    	$errors=true;
    }
    // else send the mail
    else{
    	if(sendemail($name,$email,$subject,$message)){
    		echo "Message sent!";
    	}
    	else{
    		echo "Mailer error!";
    	}
    }
}
else{
	echo "There was an error!";
}

?>