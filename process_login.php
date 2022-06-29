<?php
    session_start(); 
    include 'db_connect.php';

    $user_email = $_POST["user_email"];
    $user_password = $_POST["user_password"];

    $qry = $con->query("SELECT * FROM product_user where user_email='$user_email'");
    if($qry->num_rows > 0){
        $fetch = mysqli_fetch_assoc($qry);
        $fetch_pass = $fetch['pass'];
        if($user_password == $fetch_pass){
            if($row = $fetch){

                $_SESSION['userID'] = $row['id'];
                $_SESSION['user_email'] = $row['user_email'];
                $_SESSION['name'] = $row['first_name'];

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