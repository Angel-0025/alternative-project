<?php
    session_start();
    $connect = new PDO("mysql:host=localhost;dbname=alternative_project", "root", "");
    
    if(isset( $_POST["ccl_order"]) && isset($_POST["orid"])) {  
    
        $ccl_ScOption = $_POST["ccl_order"];
        $orderItemId = $_POST["orid"];

        $qty = $connect->prepare("SELECT * from order_table WHERE id = '$orderItemId'");
        $qty->execute();
        $order_item = $qty->fetch(PDO::FETCH_ASSOC);

        $fname = $order_item['customer_fname'];
        $lname = $order_item['customer_lname'];
        $userId = $order_item['user_id'];
        $cancel_ref = $order_item['ref_num'];
        $address = $order_item['customer_address'];
        $amount = $order_item['amount'];
        $status = "Order Cancelled";

        $query = "INSERT INTO order_archive(order_id, user_id, ref_num, customer_fname, customer_lname, customer_address, amount, order_status, cancel_reason) VALUES(:orderID, :userid, :refnum, :cfname, :clname, :caddress, :total_amount, :ostatus, :cnoption)";
        $statement = $connect->prepare($query);
        $statement->execute(
        array(
            ':orderID'  => $orderItemId,
            ':userid'  => $userId,
            ':refnum'  => $cancel_ref,
            ':cfname'  => $fname,
            ':clname'  =>  $lname,
            ':caddress'  =>  $address,
            ':total_amount'  =>  $amount,
            ':ostatus' => $status,
            ':cnoption' => $ccl_ScOption,
            )
        );
        if($statement){
            $delete_order_item = "DELETE FROM order_table WHERE user_id=? AND id =? and ref_num=?";
            $order_delete = $connect->prepare($delete_order_item);
            $order_delete->execute([$userId, $orderItemId, $cancel_ref]);
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