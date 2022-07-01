<?php
    session_start(); 
    $connect = new PDO("mysql:host=localhost;dbname=alternative_project", "root", "");
    
    $user_id = $_POST["userID"];
    $status  = "Order Placed";
    $select_stmt = $connect->prepare("SELECT * from cart_table WHERE user_id=?");

   if($select_stmt->execute([$user_id])){
        $ref_num = mt_rand(100000, 999999);
        if($select_stmt->rowCount() > 0) {
            while ($product = $select_stmt->fetch(PDO::FETCH_ASSOC)) {
                $pr_id = $product['pr_id'];
                $pr_price = $product['pr_price'];
                $pr_size= $product['pr_size'];
                $pr_qty= $product['pr_quantity'];
                
                $query = "INSERT INTO order_table(order_ref_num, user_id, pr_id, pr_size, pr_price, pr_qty, product_status) VALUES(:ofm, :upid, :pid, :psize, :pprice, :pqty, :pstatus)";
                $statement = $connect->prepare($query);
                $statement->execute(
                    array(
                      ':ofm'  => $ref_num,
                      ':upid'  => $user_id,
                      ':pid'  =>  $pr_id,
                      ':psize'  =>  $pr_size,
                      ':pprice' => $pr_price,
                      ':pqty'  => $pr_qty,
                      ':pstatus'  =>  $status,
                      )
                );
               
            }
            echo 1;
        }else{
            echo 2;
        }
   }else{
    echo 3;
   }
    
  
    
    

    
?>