<?php
    $connect = new PDO("mysql:host=localhost;dbname=alternative_project", "root", "");
    $pass = $_POST["Cadmin_pass"];
    $cpass = $_POST["Cadmin_cpass"];


    if(($pass ==  $cpass)){
        $query = "INSERT INTO admin_account(admin_name, admin_email, admin_password) VALUES(:admin_name, :admin_email, :admin_password)";
        $statement = $connect->prepare($query);
        $statement->execute(
                array(
                ':admin_name'  => $_POST["Cadmin_name"],
                ':admin_email'  => $_POST["Cadmin_email"],
                ':admin_password'  => $_POST["Cadmin_cpass"],
                )
            );
            if($statement){
                echo '1';
            }
    }
    else{
        echo '2';
    }
   
?>