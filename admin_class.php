<?php
    session_start(); 
    $connect = new PDO("mysql:host=localhost;dbname=alternative_project", "root", "");

    if(isset($_GET["cart_item"]) && isset($_GET["cart_item"])== "cartItem"){
        if(isset($_SESSION["userID"])){
            $select_stmt = $connect->prepare("SELECT * from cart_table where user_id = ?");
            $select_stmt->execute([$_SESSION["userID"]]);
            $row=$select_stmt->rowCount();
            echo $row;
        }
    }
    if(isset($_GET["wishlist_item"]) && isset($_GET["wishlist_item"])== "wishlistItem"){
        if(isset($_SESSION["userID"])){
            $wishlist = $connect->prepare("SELECT * from wishlist_table  where user_id = ?");
            $wishlist->execute([$_SESSION["userID"]]);
            $row=$wishlist->rowCount();
            echo $row;
        }
    }
    if(isset($_GET["carttotal"]) && isset($_GET["carttotal"])== "cart_subtotal"){
        if(isset($_SESSION["userID"])){
            $subtotal = $connect->prepare("SELECT * from cart_table where user_id = ?");
            $subtotal->execute([$_SESSION["userID"]]);
            $total = 0.0;
            while ($prtotal= $subtotal->fetch(PDO::FETCH_ASSOC)) {
                $total += $prtotal['pr_price'];
            }
            echo  number_format($total, 2);
        }
    }
    
?>