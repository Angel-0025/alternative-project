<?php

  $connect = new PDO("mysql:host=localhost;dbname=alternative_project", "root", "");

  $query = "INSERT INTO cart_table(pr_id, pr_price, pr_size, pr_quantity) VALUES(:pid, :pprice, :psize, :quantity)";
 
  //NOTE: if click 2 times make an update scenario here
  $statement = $connect->prepare($query);
  $statement->execute(
    array(
      ':pid'  => $_POST["pid"],
      ':pprice'  => $_POST["pprice"],
      ':psize'  => $_POST["psize"],
      ':quantity'  => $_POST["quantity"]
      )
    );
    echo '<div class="alert alert-success alert-dismissible mt-2">
          <button type="button" class="close" data-dismiss="alert">x</button>
          <strong>Item already added to your cart!</strong>
          </div>';


   
?>

