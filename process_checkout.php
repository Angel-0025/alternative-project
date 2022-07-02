<?php
    session_start(); 
    $connect = new PDO("mysql:host=localhost;dbname=alternative_project", "root", "");
    
    $user_id = $_POST["userID"];
    $status  = "Order Placed";

    $user_info = $connect->prepare("SELECT * from product_user WHERE user_id=?");
    if($user_info->execute([$user_id])){

        $info = $user_info->fetch(PDO::FETCH_ASSOC);

        $fname = $info['first_name'];
        $lname = $info['last_name'];
        $address = $info['address'];
        $city= $info['city'];
        $province= $info['province'];
        $country= $info['country'];
        $user_address = $address .', '.  $city .', '. $province .', '. $country;

        $cart = $connect->prepare("SELECT * from cart_table WHERE user_id=?");
        if($cart->execute([$user_id])){
            $ref_num = mt_rand(100000, 999999);
            if($cart->rowCount() > 0) {
                while ($product = $cart->fetch(PDO::FETCH_ASSOC)) {
                    $pr_id = $product['pr_id'];
                    $pr_price = $product['pr_price'];
                    $pr_size= $product['pr_size'];
                    $pr_qty= $product['pr_quantity'];

                    $prt = $connect->prepare("SELECT * from product WHERE product_id=?");
                    $prt->execute([$pr_id]);
                    $product_info = $prt->fetch(PDO::FETCH_ASSOC);
                    $product_name = $product_info['name'];

                    $query = "INSERT INTO order_table(order_ref_num, user_id, pr_id, pr_name,pr_size, pr_price, pr_qty, order_fname, order_lname, order_address, product_status) VALUES(:ofm, :upid, :pid, :pname,:psize, :pprice, :pqty, :fname, :lname, :userAddress ,:pstatus)";
                    $statement = $connect->prepare($query);
                    $statement->execute(
                    array(
                        ':ofm'  => $ref_num,
                        ':upid'  => $user_id,
                        ':pid'  =>  $pr_id,
                        ':pname'  =>  $product_name,
                        ':psize'  =>  $pr_size,
                        ':pprice' => $pr_price,
                        ':pqty'  => $pr_qty,
                        ':fname'  => $fname,
                        ':lname'  => $lname,
                        ':userAddress'  => $user_address,
                        ':pstatus'  =>  $status,
                        )
                    );
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
    }
    else{
        echo 3;
    }
?>