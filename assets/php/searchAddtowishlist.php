<?php
session_start(); 
$connect = new PDO("mysql:host=localhost;dbname=alternative_project", "root", "");

if(isset($_POST['spID']) && isset($_SESSION["userID"])) {  
    $addproductid = $_POST['spID'];

    $select_stmt = $connect->prepare("SELECT * from wishlist_table WHERE pr_id = '$addproductid' and user_id=". $_SESSION["userID"] ." ");
    $select_stmt->execute();
    $row=$select_stmt->rowCount();

    if($row == 1){
        $delete_list = $connect->prepare("DELETE FROM wishlist_table WHERE pr_id = '$addproductid' and user_id=". $_SESSION["userID"] ."");
        $delete_list->execute();
        // If product has already added to wishlist then remove from Database
        echo '0';
    } else {
        $add_list = $connect->prepare("INSERT INTO wishlist_table(pr_id, user_id) VALUES (:prid, :id) ");
        $add_list ->execute(
            array(
                ':prid'  => $addproductid,
                ':id' => $_SESSION["userID"]
                )
        );
        // If product has not in wishlist then add to Database
        echo '1';
    }
}
?>