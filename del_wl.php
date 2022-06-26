<?php
    $connect = new PDO("mysql:host=localhost;dbname=alternative_project", "root", "");

    if(isset($_POST['del_id'])) {  
        $delwl = $_POST['del_id'];
        
        $delete_list = $connect->prepare("DELETE FROM wishlist_table WHERE pr_id = $delwl");
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