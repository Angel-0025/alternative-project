<?php
    session_start();
    $connect = new PDO("mysql:host=localhost;dbname=alternative_project", "root", "");

    $fname = $_POST["user_fname"];
    $lname = $_POST["user_lname"];
    $mobileNum = $_POST["usermobileNum"];
    $user_email = $_POST["user_email"];
    $newPass = $_POST["new_pass"];
    $cNewPass = $_POST["cnpassword"];

    if(($newPass == null) && ($cNewPass == null)){
        $updateinfo= "UPDATE product_user SET first_name=?, last_name=?, mobile_num=?, user_email=? WHERE user_id =". $_SESSION["userID"]." ";
        $updateinfo = $connect->prepare($updateinfo);
        $updateinfo->execute([$fname, $lname, $mobileNum, $user_email, ]);
        if($updateinfo){
            echo 1;
        }else{
            echo 2;
        }
    }else{
        if($newPass == $cNewPass){
            $updateinfo= "UPDATE product_user SET first_name=?, last_name=?, mobile_num=?, user_email=?, pass=? WHERE user_id = ". $_SESSION["userID"] ."";
            $updateinfo = $connect->prepare($updateinfo);
            $updateinfo->execute([$fname, $lname, $mobileNum, $user_email, $cNewPass]);
            if($updateinfo){
                echo 1;
            }else{
                echo 2;
            }       
        }
        else{
            echo 3;
        }
    }
?>