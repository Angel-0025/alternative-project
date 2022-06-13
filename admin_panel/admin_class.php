<?php
    if(isset($_POST["product_name"]))
    {
    
    $tags = ($_POST['product_color']);
    $tags_string = implode(", ", $tags);


     $connect = new PDO("mysql:host=localhost;dbname=testing", "root", "");
     $query = "INSERT INTO programmer(name, skill) VALUES(:product_name, :product_color )";

     $statement = $connect->prepare($query);

     $statement->execute(
      array(
       ':product_name'  => $_POST["product_name"],
       ':product_color' => $tags_string

      )
     );
     $result = $statement->fetchAll();

     $output = '';
     if(isset($result))
     {
      $output = '
      <div class="alert alert-success">
       Your data has been successfully saved into System
      </div>
      ';
     }
     echo $output;
    }
?>