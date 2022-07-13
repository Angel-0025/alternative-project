<?php
    session_start();
    $connect = new PDO("mysql:host=localhost;dbname=alternative_project", "root", "");

    $pass = $_POST["pass"];
    $cpass = $_POST["cpass"];
    //$_SESSION['info'] = "";

    if($pass !== $cpass){
        echo 2;
    }
    else{
        $code = 0;
        $email = $_SESSION['email'];

        $update_pass =  $connect->prepare("UPDATE product_user SET code =?, pass=? where  user_email=?");
        $update_pass->execute([$code, $cpass , $email]);
        if($update_pass){
            $info = "Your password changed. Now you can login with your new password.";
            $_SESSION['info'] = $info;
            echo 1;
        }else{
            echo 3;
        }
    }

    //$_SESSION['info'] = "";
?>