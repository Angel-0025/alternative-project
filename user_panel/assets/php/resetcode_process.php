<?php
    session_start();
    $connect = new PDO("mysql:host=localhost;dbname=alternative_project", "root", "");

    $enter_code = $_POST["rCode"];

    $_SESSION['info'] = "";

    $query = $connect->prepare("SELECT * from product_user WHERE code = ? ");
    $query->execute([$enter_code]);
    $row=$query->rowCount();
    if($row > 0){
        $userMail = $query->fetch(PDO::FETCH_ASSOC);

        $email = $userMail['user_email'];
        $_SESSION['email'] = $email;
        $info = "Please create a new password that you don't use on any other site.";
        $_SESSION['info'] = $info;

       echo 1;
    }
    else{
        echo 2;

    }

  
?>