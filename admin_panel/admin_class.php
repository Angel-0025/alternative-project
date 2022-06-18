<?php
include('db_connect.php');

  
  $tags = ($_POST['product_color']);
  $tags_string = implode(", ", $tags);


  $connect = new PDO("mysql:host=localhost;dbname=testing", "root", "");
  $query = "INSERT INTO programmer(name, skill, vendor) VALUES(:product_name, :product_color, :product_vendor )";
 
  $statement = $connect->prepare($query);
  $statement->execute(
    array(
      ':product_name'  => $_POST["product_name"],
      ':product_color' => $tags_string,
      ':product_vendor'  => $_POST["product_vendor"],
      )
    );
    $pr_id = $connect->lastInsertId();
  if($statement){
  
    if(count($_FILES["image"]["tmp_name"]) > 0)
    {
      for($count = 0; $count < count($_FILES["image"]["tmp_name"]); $count++){
        $image_file = addslashes(file_get_contents($_FILES["image"]["tmp_name"][$count]));
        $query = "INSERT INTO tbl_images(images, product_id, image_number) VALUES ('$image_file' , '$pr_id', '$count')";
        $statement = $connect->prepare($query);
        $statement->execute();
      }
    }
  }
  //$queryID = "SELECT id FROM programmer WHERE name like :product_name";
  //$prdid = $connect->prepare($queryID);
  //$result = $prdid->fetchColumn();
  
  
?>