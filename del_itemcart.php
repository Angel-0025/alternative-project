<?php
    $connect = new PDO("mysql:host=localhost;dbname=alternative_project", "root", "");

    if(isset($_POST['delct_id'])) {  
        $del_item = $_POST['delct_id'];
        
        $delete_item = $connect->prepare("DELETE FROM cart_table WHERE pr_id = $del_item");
        $delete_item->execute();
        // If product has already added to wishlist then remove from Database
        if($delete_item){
            echo 'YES';
        }
        else{
            echo 'FALSE';
        }
      
    }
?>