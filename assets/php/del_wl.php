<?php
   session_start();
    $connect = new PDO("mysql:host=localhost;dbname=alternative_project", "root", "");

    if(isset($_POST['del_id']) && isset($_SESSION["userID"])) {  
        $delwl = $_POST['del_id'];
        
        $delete_list = $connect->prepare("DELETE FROM wishlist_table WHERE pr_id = $delwl and user_id=". $_SESSION["userID"] ."");
        $delete_list->execute();
        // If product has already added to wishlist then remove from Database
        if($delete_list){
            echo 'YES';
        }
        else{
            echo 'FALSE';
        }
      
    }
?>