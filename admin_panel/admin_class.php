<?php
  $tags = ($_POST['product_size']);
  $tags_string = implode(", ", $tags);



  $connect = new PDO("mysql:host=localhost;dbname=alternative_project", "root", "");

  $query = "INSERT INTO product(name, prt_desc, materials, style, color_shown, type, user_target, vendor, price, discount, stocks, status, size) VALUES(:product_name, :product_desc, :product_materials, :product_style, :product_cShown,:prt_type, :product_user, :product_vendor, :product_price, :product_stocks, :product_status, :product_size )";
 
  $statement = $connect->prepare($query);
  $statement->execute(
    array(
      ':product_name'  => $_POST["product_name"],
      ':product_desc'  => $_POST["product_desc"],
      ':product_materials'  => $_POST["product_materials"],
      ':product_style'  => $_POST["product_style"],      
      ':product_cShown'  => $_POST["product_cShown"],
      ':prt_type'  => $_POST["prt_type"],
      ':product_user'  => $_POST["product_user"],
      ':product_vendor'  => $_POST["product_vendor"],
      ':product_price'  => $_POST["product_price"],
      ':product_stocks'  => $_POST["product_stocks"],
      ':product_status'  => $_POST["product_status"],
      ':product_size'  => $tags_string
      )
    );
    $pr_id = $connect->lastInsertId();
    if($statement){
      if(count($_FILES["image"]["tmp_name"]) > 0){
        for($count = 0; $count < count($_FILES["image"]["tmp_name"]); $count++){
          $image_file = addslashes(file_get_contents($_FILES["image"]["tmp_name"][$count]));
          $query = "INSERT INTO product_image(images, product_id, image_number) VALUES ('$image_file' , '$pr_id', '$count')";
          $statement = $connect->prepare($query);
          $statement->execute();
        }
      }
    }
?>

