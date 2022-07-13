<?php
    session_start();
    $connect = new PDO("mysql:host=localhost;dbname=alternative_project", "root", "");

    $email = $_POST["fuser_email"];

    $query = $connect->prepare("SELECT * from product_user WHERE user_email = ? ");
    $query->execute([$email]);
    $row=$query->rowCount();

    if($row > 0){
      
        $code = rand(999999, 111111);
        $query =  $connect->prepare("UPDATE product_user SET code =? where  user_email=?");
        $query->execute([$code, $email]);

        if($query){
            $subject = "Password Reset Code";
            $message = "Your password reset code is $code";
            $sender = "From: shoeshoptest1@gmail.com";
            if(mail($email, $subject, $message, $sender)){
                $info = "We've sent a password reset otp to your email - $email";
                $_SESSION['info'] = $info;
                $_SESSION['email'] = $email;
                echo 1;
            }
            else{
                echo 2;
            }
        }
        else{
            echo 3;
        }


    }

?>