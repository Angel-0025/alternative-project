<?php
    session_start(); 
    include 'db_connect.php';

    $admin_email = $_POST["admin_email"];
    $admin_password = $_POST["admin_password"];

    $qry = $con->query("SELECT * FROM admin_account where admin_email = '$admin_email'");
    if($qry->num_rows > 0){
        $fetch = mysqli_fetch_assoc($qry);
        $fetch_pass = $fetch['admin_password'];
        if($admin_password == $fetch_pass){
            if($row = $fetch){
                $_SESSION['admin_id'] = $row['admin_id'];
                echo 1;
            }
            else{
                echo 3;
            }
        }
        else{
            echo 3;
        }
    }
    else{
        echo 2;
    }
?>