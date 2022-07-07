<?php
    $connect = new PDO("mysql:host=localhost;dbname=alternative_project", "root", "");
    $order_id = $_POST["orderID"];;
    $order_status =  $_POST["process_status"];

    if($order_status == "Order Placed"){
        $order_info = $connect->prepare("UPDATE order_table SET order_status = ? WHERE id=?");
        $order_info->execute([$order_status ,$order_id]);
        if($order_info){
            echo 1;
        }
        else{
            echo 3;
        }
    }
    if($order_status == "On Delivery"){
        $order_info = $connect->prepare("UPDATE order_table SET order_status = ? WHERE id=?");
        $order_info->execute([$order_status ,$order_id]);

        if($order_info){
            echo 1;
        }
        else{
            echo 3;
        }
    }
    if($order_status == "Received"){
        $order_info = $connect->prepare("SELECT * from order_table WHERE id=?");
        $order_info->execute([$order_id]);
        $info = $order_info->fetch(PDO::FETCH_ASSOC);

        $ref_num =  $info['ref_num'];
        $user_id = $info['user_id'];
        $fname =  $info['customer_fname'];
        $lname =  $info['customer_lname'];
        $user_address =  $info['customer_address'];
        $amount = $info['amount'];

        //Insert the user info in table order
        $query = "INSERT INTO order_archive(order_id ,ref_num, user_id, customer_fname, customer_lname, customer_address, amount, order_status) VALUES(:orderID ,:refnum, :userid, :cfname, :clname, :caddress, :total_amount, :ostatus)";
        $statement = $connect->prepare($query);
        $statement->execute(
        array(
            ':orderID'  => $order_id,
            ':refnum'  => $ref_num,
            ':userid'  => $user_id,
            ':cfname'  => $fname,
            ':clname'  =>  $lname,
            ':caddress'  =>  $user_address,
            ':total_amount'  =>  $amount,
            ':ostatus' => $order_status
            )
        );
        if($statement){
            $delete_orderInfo = "DELETE FROM order_table WHERE id =?";
            $del = $connect->prepare($delete_orderInfo);
            $del->execute([$order_id]);
            if($del){
                echo 2;
            }else{
                echo 3;
            }
        }
        else{
            echo 3;
        }
    }
?>