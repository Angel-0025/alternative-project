<?php
    session_start();
    $connect = new PDO("mysql:host=localhost;dbname=alternative_project", "root", "");
    $address = $_POST["userAddress"];
    $city = $_POST["userCity"];
    $province = $_POST["userProvince"];
    $zcode = $_POST["userZcode"];

    $updateAdd = "UPDATE product_user SET address=?, city=?, province=?, zip_code=? WHERE user_id =". $_SESSION["userID"]."";
    $updateAdd = $connect->prepare($updateAdd);
    $updateAdd->execute([$address, $city, $province, $zcode]);

    if($updateAdd){
        echo 1;
    }else{
        echo 2;
    }

   
?>