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

            $oti = $connect->prepare('SELECT * FROM order_table_item where order_id = ?');
            $oti->execute([$order_id]);
            while($prid= $oti->fetch(PDO::FETCH_ASSOC)){
                
                $pr = $connect->prepare('SELECT * FROM product where product_id = ?');
                $pr->execute([$prid['product_id']]);
                $pr_stock= $pr->fetch(PDO::FETCH_ASSOC);
                
                $product_id = $prid['quantity'];
                $slct_stocks = $pr_stock['stocks'];
                $stock =  $slct_stocks - $product_id;

                $order_info = $connect->prepare("UPDATE product SET stocks = ? WHERE product_id=?");
                $order_info->execute([$stock ,$prid['product_id']]);
            }

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