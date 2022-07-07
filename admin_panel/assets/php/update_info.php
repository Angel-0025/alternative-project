<?php
    session_start();
    $connect = new PDO("mysql:host=localhost;dbname=alternative_project", "root", "");

    $name = $_POST["admin_name"];
    $admin_email = $_POST["admin_email"];
    $newPass = $_POST["admin_pass"];
    $cNewPass = $_POST["admin_cpass"];

    if(($newPass == null) && ($cNewPass == null)){
        $updateinfo= "UPDATE admin_account SET admin_name= ?, admin_email=? WHERE admin_id =". $_SESSION['admin_id']." ";
        $updateinfo = $connect->prepare($updateinfo);
        $updateinfo->execute([$name, $admin_email]);
        if($updateinfo){
            echo 1;
        }else{
            echo 2;
        }
    }else{
        if($newPass == $cNewPass){
            $updateinfo= "UPDATE admin_account SET admin_name= ?, admin_email= ? , admin_password=? WHERE admin_id =". $_SESSION['admin_id']." ";
            $updateinfo = $connect->prepare($updateinfo);
            $updateinfo->execute([$name, $admin_email, $cNewPass]);
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