<?php
    session_start(); 
    $connect = new PDO("mysql:host=localhost;dbname=alternative_project", "root", "");

    $user_id = $_POST["userID"];
    $status  = "Order Placed";
    $ref_num = mt_rand(100000, 999999);
    $order_id;


    $user_info = $connect->prepare("SELECT * from product_user WHERE user_id=?");
    if($user_info->execute([$user_id])){
        $info = $user_info->fetch(PDO::FETCH_ASSOC);

        //Getting the customer information
        $fname = $info['first_name'];
        $lname = $info['last_name'];
        $address = $info['address'];
        $city= $info['city'];
        $province= $info['province'];
        $country= $info['country'];
        $user_address = $address .', '.  $city .', '. $province .', '. $country;

        // Getting the total value of the order
        $subtotal = $connect->prepare("SELECT * from cart_table where user_id = ?");
        $subtotal->execute([$_SESSION["userID"]]);
        $total = 0.0;
        while ($prtotal= $subtotal->fetch(PDO::FETCH_ASSOC)) {
            $total += $prtotal['pr_price'];
        }
        //Insert the user info in table order
        $query = "INSERT INTO order_table(ref_num, user_id,customer_fname, customer_lname, customer_address, amount, order_status) VALUES(:refnum, :userid, :cfname, :clname, :caddress,:total_amount, :ostatus)";
        $statement = $connect->prepare($query);
        $statement->execute(
        array(
            ':refnum'  => $ref_num,
            ':userid'  => $user_id,
            ':cfname'  => $fname,
            ':clname'  =>  $lname,
            ':caddress'  =>  $user_address,
            ':total_amount'  =>  $total,
            ':ostatus' => $status
            )
        );
        $order_id = $connect->lastInsertId();
        //get the last inserted id

        if($statement){
            $cart = $connect->prepare("SELECT * from cart_table WHERE user_id=?");
            $cart->execute([$user_id]);
            if($cart->rowCount() > 0) {
                while ($product = $cart->fetch(PDO::FETCH_ASSOC)) {

                    $pr_id = $product['pr_id'];
                    $pr_price = $product['pr_price'];
                    $pr_size= $product['pr_size'];
                    $pr_qty= $product['pr_quantity'];

                    $query = "INSERT INTO order_table_item(order_id, user_id,product_id, item_price, quantity, size) VALUES(:orid, :usrid, :pid, :iprice, :qty, :size)";
                    $statement = $connect->prepare($query);
                    $statement->execute(
                    array(
                        ':orid'  => $order_id,
                        ':usrid'  => $user_id,
                        ':pid'  =>  $pr_id,
                        ':iprice'  =>  $pr_price,
                        ':qty'  =>  $pr_qty,
                        ':size' => $pr_size,
                        )
                    );
                    if($statement){
                        $delete_cart_item = "DELETE FROM cart_table WHERE user_id=? AND pr_id =?";
                        $cart_delete = $connect->prepare($delete_cart_item);
                        $cart_delete->execute([$user_id , $pr_id]);
                    }
                }
                echo 1;
            }
            else{
                echo 2;
            }
        }
        else{
            echo 2;
        }
    
    }else{
        echo 3;
    }

?>