<?php
    $connect = new PDO("mysql:host=localhost;dbname=alternative_project", "root", "");

    $product_id = $_POST['pr_id'];
	$userID = $_POST['user_id'];
    $review = $_POST['review'];
    $rating_star = $_POST['star_val'];
    $total_rating = 0;
    $true_rating= 0;

    $query = "INSERT INTO product_review(product_id, user_id, comment, rating) VALUES(:pid, :userid, :comment, :rating)";
    $statement = $connect->prepare($query);
    $statement->execute(
        array(
            ':pid'  => $product_id,
            ':userid'  => $userID,
            ':comment'  =>  $review,
            ':rating'  =>  $rating_star,
        )
    );
    if($statement){
        //Get the Number of rating in the product
        $product_rating = $connect->prepare("SELECT * from product_review where product_id = ?");
        $product_rating->execute([$product_id]);
        $rating_num=$product_rating->rowCount();

        //Calculation of rating
        while($rate = $product_rating->fetch(PDO::FETCH_ASSOC)){
           $total_rating += $rate['rating'];
        }
        $true_rating = $total_rating / $rating_num;

        //Update the rating of the product
        $product_update = $connect->prepare("UPDATE product SET rating =? WHERE product_id =?");
        $product_update->execute([$true_rating, $product_id]);
        
        if($product_update){
            echo 1;
        }else{
            echo 2;
        }
    }
    else{
        echo 2;
    }
    
?>