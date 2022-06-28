<?php
    $connect = new PDO("mysql:host=localhost;dbname=alternative_project", "root", "");
    $pass = $_POST["password"];
    $cpass = $_POST["cpassword"];
    $cbox = $_POST["cBox"];

    if($cbox == "checked"){
        if(($pass ==  $cpass)){
            $country = "Philippines";
    
            $query = "INSERT INTO product_user(email, password, first_name, last_name, mobile_num, address, city, province, country, zip_code) VALUES(:user_email, :cpassword, :first_name, :last_name, :mobileNum, :address, :city, :province, :country, :zcode )";
            $statement = $connect->prepare($query);
            $statement->execute(
                array(
                ':user_email'  => $_POST["user_email"],
                ':cpassword'  => $_POST["cpassword"],
                ':first_name'  => $_POST["first_name"],
                ':last_name'  => $_POST["last_name"],      
                ':mobileNum'  => $_POST["mobileNum"],
                ':address'  => $_POST["address"],
                ':city'  => $_POST["city"],
                ':province'  => $_POST["province"],
                ':country'  => $country,
                ':zcode'  => $_POST["zcode"],
                )
            );
            if($statement){
                echo '1';
            }
        }else{
            echo '2';
        }
    }
    else{
        echo '3';
    }
    
   
?>