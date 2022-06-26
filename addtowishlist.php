<?php
    $connect = new PDO("mysql:host=localhost;dbname=alternative_project", "root", "");

    if(isset($_POST['pID'])) {  
        $addproductid = $_POST['pID'];

        $select_stmt = $connect->prepare("SELECT * from wishlist_table WHERE pr_id = '$addproductid'");
        $select_stmt->execute();
        $row=$select_stmt->rowCount();

        if($row == 1){
            $delete_list = $connect->prepare("DELETE FROM wishlist_table WHERE pr_id = '$addproductid'");
            $delete_list->execute();
            // If product has already added to wishlist then remove from Database
            echo '0';
        } else {
            $add_list = $connect->prepare("INSERT INTO wishlist_table(pr_id) VALUES (:id) ");
            $add_list->bindParam(":id", $addproductid);
            $add_list ->execute();
            // If product has not in wishlist then add to Database
            echo '1';
        }
    }
?>