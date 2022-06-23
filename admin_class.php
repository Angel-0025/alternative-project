<?php
    $connect = new PDO("mysql:host=localhost;dbname=alternative_project", "root", "");

    if(isset($_GET["cart_item"]) && isset($_GET["cart_item"])== "cartItem"){
        $select_stmt = $connect->prepare("SELECT * from cart_table");
        $select_stmt->execute();
        $row=$select_stmt->rowCount();
        echo $row;
    }

    
?>