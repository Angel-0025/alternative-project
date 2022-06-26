<?php
  $connect = new PDO("mysql:host=localhost;dbname=alternative_project", "root", "");

  $product_id = $_POST["pid"];
  $product_price = $_POST["pprice"];
  $product_size =  $_POST["psize"];
  $product_qty = $_POST["quantity"];

  //
  $new_qty;
  $new_price;
  //

  $select_stmt = $connect->prepare("SELECT * from cart_table WHERE pr_id = '$product_id' and pr_size='$product_size'");
  $select_stmt->execute();
  $row = $select_stmt->rowCount();
  
  if($row == 1){
    
    $qty = $connect->prepare("SELECT pr_quantity from cart_table WHERE pr_id = '$product_id'");
    $qty->execute();
    $new_qty = $qty->fetchColumn();
    $new_qty += $product_qty;
    $new_price= $product_price * $new_qty;

    $query = "UPDATE cart_table SET pr_price =?, pr_quantity=? where pr_id=?";
    $statement = $connect->prepare($query);
    $statement->execute([$new_price, $new_qty, $product_id]);

    echo '<div class="alert alert-success alert-dismissible mt-2">
          <button type="button" class="close" data-dismiss="alert">x</button>
          <strong>The cart is updated!</strong>
          </div>';
  }
  else {
    $new_price = $product_price * $product_qty;

    $query = "INSERT INTO cart_table(pr_id, pr_price, pr_size, pr_quantity) VALUES(:pid, :pprice, :psize, :quantity)";
    $statement = $connect->prepare($query);
    $statement->execute(
      array(
        ':pid'  => $product_id,
        ':pprice'  => $new_price,
        ':psize'  =>  $product_size,
        ':quantity'  =>  $product_qty
        )
      );
      echo '<div class="alert alert-success alert-dismissible mt-2">
            <button type="button" class="close" data-dismiss="alert">x</button>
            <strong>Item already added to your cart!</strong>
            </div>';
  
  }
?>

