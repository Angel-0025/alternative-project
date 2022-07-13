<?php
    session_start();
    $connect = new PDO("mysql:host=localhost;dbname=alternative_project", "root", "");

    if(isset($_POST['cancel_id']) && isset($_SESSION["userID"])) {  
        $cancel_id = $_POST['cancel_id'];
        $cancel_ref = $_POST['cancel_ref'];
        
        $qty = $connect->prepare("SELECT * from order_table WHERE id = '$cancel_id' and user_id=". $_SESSION["userID"] ."");
        $qty->execute();
        $order_item = $qty->fetch(PDO::FETCH_ASSOC);

        $fname = $order_item['customer_fname'];
        $lname = $order_item['customer_lname'];
        $address = $order_item['customer_address'];
        $amount = $order_item['amount'];
        $status = "Order Cancelled";
        $reason = "Client Cancellation";

        //Insert 
        $query = "INSERT INTO order_archive(order_id, user_id, ref_num, customer_fname, customer_lname, customer_address, amount, order_status, cancel_reason) VALUES(:orderID, :userid, :refnum, :cfname, :clname, :caddress, :total_amount, :ostatus, :creason)";
        $statement = $connect->prepare($query);
        $statement->execute(
        array(
            ':orderID'  => $cancel_id,
            ':userid'  => $_SESSION["userID"],
            ':refnum'  => $cancel_ref,
            ':cfname'  => $fname,
            ':clname'  =>  $lname,
            ':caddress'  =>  $address,
            ':total_amount'  =>  $amount,
            ':ostatus' => $status,
            ':creason' => $reason,
            )
        );

        if($statement){
            $delete_order_item = "DELETE FROM order_table WHERE user_id=? AND id =? and ref_num=?";
            $order_delete = $connect->prepare($delete_order_item);
            $order_delete->execute([$_SESSION["userID"] , $cancel_id, $cancel_ref]);
            if($order_delete){
                echo 1;
            }
            else{
                echo 2;
            }
        }
        else{
            echo 2;
        }
      
    }
?>