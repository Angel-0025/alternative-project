<?php
    $connect = new PDO("mysql:host=localhost;dbname=alternative_project", "root", "");
    $tags = ($_POST['product_size']);
    $tags_string = implode(", ", $tags);



    $name = $_POST["product_name"];
    $product_desc = $_POST["product_desc"];
    $product_materials = $_POST["product_materials"];
    $product_style = $_POST["product_style"];  
    $product_cShown = $_POST["product_cShown"];
    $prt_type = $_POST["prt_type"];
    $product_user = $_POST["product_user"];
    $product_vendor = $_POST["product_vendor"];
    $product_price = $_POST["product_price"];
    $product_stocks = $_POST["product_stocks"];
    $product_status = $_POST["product_status"];
    $stags =$tags_string;
    $pr_id = $_POST["pr_id"];

    $query = "UPDATE product SET name=?, prt_desc=?, materials=?, style=?, color_shown=?, type=?, user_target=?, vendor=?, price=?, stocks=?, status=?, size=?  WHERE product_id =?";
    $statement = $connect->prepare($query);
    $statement->execute([$name, $product_desc, $product_materials, $product_style, $product_cShown, $prt_type, $product_user, $product_vendor, $product_price, $product_stocks, $product_status, $stags, $pr_id]);
    if($statement){
        echo 1;
    }
    else{
        echo 2;
    }
?>

