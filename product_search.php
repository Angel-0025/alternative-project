<?php
if(isset($_SESSION['search_word']) && !empty($_SESSION['search_word'])) {
    echo $_SESSION['search_word'];
}
else{
    echo 'ERROR';
}

include 'db_connect.php';
?>
<style>
    .disabled {
    pointer-events:none; 
    opacity:0.6;   
}
.active1{
        color:red !important;
    }
</style>
<!-- START SECTION BREADCRUMB -->
<div class="breadcrumb_section bg_gray page-title-mini">
    <div class="container"><!-- STRART CONTAINER -->
        <div class="row align-items-center">
        	<div class="col-md-6">
                <div class="page-title">
            		<h1><?=$_SESSION['search_word']?></h1>
                </div>
            </div>
            <div class="col-md-6">
                <ol class="breadcrumb justify-content-md-end">
                    <li class="breadcrumb-item"><a href="#">Home</a></li>
                    <li class="breadcrumb-item"><a href="#">Pages</a></li>
                    <li class="breadcrumb-item active">Shop List</li>
                </ol>
            </div>
        </div>
    </div><!-- END CONTAINER-->
</div>
<!-- END SECTION BREADCRUMB -->

<!-- START SECTION SHOP -->
<div class="section">
	<div class="container">
    	<div class="row">
			<div class="col-12">
                <div class="row shop_container list">
                    <div class="col-lg-3 col-md-4 col-6">
                        <?php
                        // get the search terms from the url
                            $k = $_SESSION['search_word'];

                            // create the base variables for building the search query
                            $search_string = "SELECT * FROM product WHERE ";
                            $display_words = "";
                                                
                            // format each of search keywords into the db query to be run
                            $keywords = explode(' ', $k);			
                            foreach ($keywords as $word){
                                $search_string .= "name LIKE '%".$word."%' OR ";
                                $display_words .= $word.' ';
                            }
                            $search_string = substr($search_string, 0, strlen($search_string)-4);
                            $display_words = substr($display_words, 0, strlen($display_words)-1);

                            // run the query in the db and search through each of the records returned
                            $query = mysqli_query($con, $search_string);
                            $result_count = mysqli_num_rows($query);
                            if($result_count > 0){
                            while ($row = mysqli_fetch_assoc($query)){
                        ?>
                        <div class="product">
                            <div class="product_img">
                                <a href="index.php?page=product_detail&id=<?=$row['product_id']?>">
                                    <?php
                                        $connect = new PDO("mysql:host=localhost;dbname=alternative_project", "root", "");
                                        // Prepare statement and execute, prevents SQL injection
                                        $stmt = $connect->prepare('SELECT * FROM product_image WHERE product_id = ? LIMIT 1');
                                        $stmt->execute([$row['product_id']]);
                                        // Fetch the product from the database and return the result as an Array
                                        $pic = $stmt->fetch();    
                                    ?>
                                    <img src='data:image/jpeg;base64, <?=base64_encode( $pic['images'] );?>' alt="product_img1">
                                </a>
                            </div>
                            <div class="product_info">
                                <h6 class="product_title"><a href="index.php?page=product_detail&id=<?=$row['product_id']?>"><?php echo $row['name'];?></a></h6>
                                <div class="product_price">
                                    <span class="price"><span>&#8369; </span><?php echo $row['price'];?></span>
                                </div>
                                <div class="rating_wrap">
                                    <div class="rating">
                                        <div class="product_rate" style="width:<?php echo ($row['rating'] * 20);?>%"></div>
                                    </div>
                                    <?php 
                                        $connect = new PDO("mysql:host=localhost;dbname=alternative_project", "root", "");
                                        // Prepare statement and execute, prevents SQL injection
                                        $review = $connect->prepare('SELECT * FROM product_review WHERE product_id = ?');
                                        $review->execute([$row['product_id']]);
                                        $review_count=$review->rowCount();
                                    ?>
                                    <span class="rating_num">(<?php echo $review_count;?>)</span>
                                </div>
                                <div class="pr_desc">
                                    <p><?php echo $row['prt_desc']?></p>
                                </div>
                                <form method="post" id="addtocart" class="saddTowl" enctype="multipart/form-data">
                                    <div class="list_product_action_box">
                                        <input type="hidden" id="spid" name="spid" class="spID" value="<?=$row['product_id']?>">
                                        <ul class="list_none pr_action_btn">
                                            <li class="add-to-cart 
                                            <?php 
                                            if(!isset($_SESSION['userID']) && empty($_SESSION['userID'])) {
                                            ?>
                                                disabled
                                            <?php
                                            }
                                            ?>"><a href="index.php?page=product_detail&id=<?=$row['product_id']?>">
                                        <i class="icon-basket-loaded"></i> Add To Cart</a></li>
                                            <li>
                                            <a class="add_wishlist" id="saddwl" href="
                                            <?php 
                                            if(!isset($_SESSION['userID']) && empty($_SESSION['userID'])) {
                                            ?>
                                                index.php?page=login_page
                                            <?php
                                            }else{
                                            ?>
                                               
                                            <?php
                                            }
                                            ?>"><i class="icon-heart whishstate
                                            <?php  
                                                if(isset($_SESSION["userID"])) {  
                                                    $select_stmt = $connect->prepare("SELECT * from wishlist_table WHERE pr_id = ? AND user_id= ?");
                                                    $select_stmt->execute([$row['product_id'] , $_SESSION["userID"]]);
                                                    $row1=$select_stmt->rowCount();
                                                    if(($row1 > 0) && ($_SESSION["userID"]) != ""){
                                                ?>  
                                                active1
                                                <?php 
                                                }
                                                if(($_SESSION["userID"] == "")){
                                                ?>   
                                                    echo 'ERROR';
                                                <?php
                                                }
                                            }
                                            ?>
                                            "></i></a></li>
                                        </ul>
                                    </div>
                                </form>
                            </div>
                        </div>
                        <?php }
                        }
                        else{?>
                            <h3 style="text-align: center;"><?php echo ucwords($_SESSION['search_word']);?> doesn't exist</h3>
                        <?php }?>
                    </div>
                                      
                </div>
        		<div class="row">
                    <div class="col-12">
                        <ul class="pagination mt-3 justify-content-center pagination_style1">
                            <li class="page-item active"><a class="page-link" href="#">1</a></li>
                            <li class="page-item"><a class="page-link" href="#">2</a></li>
                            <li class="page-item"><a class="page-link" href="#">3</a></li>
                            <li class="page-item"><a class="page-link" href="#"><i class="lnr lnr-arrow-right"></i></a></li>
                        </ul>
                    </div>
                </div>
        	</div>
        </div>
    </div>
</div>