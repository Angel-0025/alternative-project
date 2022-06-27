<?php
    $connect = new PDO("mysql:host=localhost;dbname=alternative_project", "root", "");

    if(isset($_GET["cart_item"]) && isset($_GET["cart_item"])== "cartItem"){
        $select_stmt = $connect->prepare("SELECT * from cart_table");
        $select_stmt->execute();
        $row=$select_stmt->rowCount();
        echo $row;
    }
    if(isset($_GET["wishlist_item"]) && isset($_GET["wishlist_item"])== "wishlistItem"){
        $wishlist = $connect->prepare("SELECT * from wishlist_table");
        $wishlist->execute();
        $row=$wishlist->rowCount();
        echo $row;
      
    }
    if(isset($_GET["carttotal"]) && isset($_GET["carttotal"])== "cart_subtotal"){
        $subtotal = $connect->prepare("SELECT * from cart_table");
        $subtotal->execute();
        $total = 0.0;
        while ($prtotal= $subtotal->fetch(PDO::FETCH_ASSOC)) {
            $total += $prtotal['pr_price'];
        }
        echo  number_format($total, 2);
      
    }
    
?>