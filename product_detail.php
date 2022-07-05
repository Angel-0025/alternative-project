<style>
    .active{
        color:red !important;
    }
</style>
<?php
// Check to make sure the id parameter is specified in the URL
if (isset($_GET['id'])) {
    $connect = new PDO("mysql:host=localhost;dbname=alternative_project", "root", "");
    // Prepare statement and execute, prevents SQL injection
    $stmt = $connect->prepare('SELECT * FROM product WHERE product_id = ?');
    $stmt->execute([$_GET['id']]);
    // Fetch the product from the database and return the result as an Array
    $product = $stmt->fetch(PDO::FETCH_ASSOC);
    // Check if the product exists (array is not empty)
    if (!$product) {
        // Simple error to display if the id for the product doesn't exists (array is empty)
        exit('Product does not exist!');
    }
} else {
    // Simple error to display if the id wasn't specified
    exit('Product does not exist!');
}
?>
<style>
    /* Chrome, Safari, Edge, Opera */
input::-webkit-outer-spin-button,
input::-webkit-inner-spin-button {
  -webkit-appearance: none;
  margin: 0;
}

/* Firefox */
input[type=number] {
  -moz-appearance: textfield;
}
</style>
<!-- START SECTION BREADCRUMB -->
<div class="breadcrumb_section bg_gray page-title-mini">
    <div class="container"><!-- STRART CONTAINER -->
        <div class="row align-items-center">
        	<div class="col-md-6">
                <div class="page-title">
            		<h1><?=$product['name']?></h1>
                </div>
            </div>
            <div class="col-md-6">
                <ol class="breadcrumb justify-content-md-end">
                    <li class="breadcrumb-item"><a href="#">Home</a></li>
                    <li class="breadcrumb-item">Product Detail</li>
                </ol>
            </div>
        </div>
    </div><!-- END CONTAINER-->
</div>
<!-- END SECTION BREADCRUMB -->

<!-- START MAIN CONTENT -->
<div class="main_content">

<!-- START SECTION SHOP -->
<div class="section">
	<div class="container">
		<div class="row">
             <!-- Product Image -->
            <div class="col-lg-6 col-md-6 mb-4 mb-md-0">
                <div class="product-image">
                    <?php 
                        $connect = new PDO("mysql:host=localhost;dbname=alternative_project", "root", "");
                        // Prepare statement and execute, prevents SQL injection
                        $stmt = $connect->prepare('SELECT * FROM product_image WHERE product_id = ? LIMIT 1');
                        $stmt->execute([$_GET['id']]);
                        // Fetch the product from the database and return the result as an Array
                        $row = $stmt->fetch();                            
                    ?>
                    <div class="product_img_box">
                        <img id="product_img" src='data:image/jpeg;base64, <?=base64_encode( $row['images'] );?>' data-zoom-image="data:image/jpeg;base64, <?=base64_encode( $row['images'] );?>" alt="product_img1" />
                        <a href="#" class="product_img_zoom" title="Zoom">
                            <span class="lnr lnr-magnifier"></span>
                        </a>
                    </div>
                    <div id="pr_item_gallery" class="product_gallery_item slick_slider" data-slides-to-show="4" data-slides-to-scroll="1" data-infinite="false">
                        <?php 
                        $connect = new PDO("mysql:host=localhost;dbname=alternative_project", "root", "");
                        // Prepare statement and execute, prevents SQL injection
                        $stmt = $connect->prepare('SELECT * FROM product_image WHERE product_id = ?');
                        $stmt->execute([$_GET['id']]);
                        // Fetch the product from the database and return the result as an Array
                        while ($img= $stmt->fetch(PDO::FETCH_ASSOC)) {
                            
                        ?>
                        <div class="item">
                            <a href="#" class="product_gallery_item" data-image="data:image/jpeg;base64, <?=base64_encode( $img['images'] );?>" data-zoom-image="data:image/jpeg;base64, <?=base64_encode( $img['images'] );?>">
                                <img src="data:image/jpeg;base64, <?=base64_encode( $img['images'] );?>" alt="product_small_img1" />
                            </a>
                        </div>
                        <?php }?>
                    </div>
                </div>
            </div>
            <!-- Product Details -->
            <div class="col-lg-6 col-md-6">
                <form method="post" id="addtocart" class="addTowl" enctype="multipart/form-data">
                    <div class="pr_detail">
                        <div class="product_description">
                            <h4 class="product_title"><?=$product['name']?></h4>
                            <div class="product_price">
                                <span class="price"><span>&#8369; </span><?=$product['price']?></span>
                                <del></del>
                                <div class="on_sale">
                                    <span><?=$product['discount']?></span>
                                </div>
                            </div>
                            <div class="rating_wrap">
                                    <div class="rating">
                                        <div class="product_rate" style="width:0%"></div>
                                    </div>
                                    <span class="rating_num">(0)</span>
                                </div>
                            <div class="pr_desc">
                                <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Phasellus blandit massa enim. Nullam id varius nunc id varius nunc.</p>
                            </div>
                            <div class="product_sort_info">
                                <ul>
                                    <li><i class="lnr lnr-checkmark-circle"></i> 1 Year AL Jazeera Brand Warranty</li>
                                    <li><i class="lnr lnr-sync"></i> 30 Day Return Policy</li>
                                    <li><i class="lnr lnr-rocket"></i> Cash on Delivery available</li>
                                </ul>
                            </div>
                            <!-- Product Size -->
                            <div class="form-group row">
                                <label for="" class="col-sm-1 col-form-label switch_lable" style="padding-top: calc(0.375rem + 5px) !important;">Size</label>
                                <div class="col-sm-4">
                                    <?php 
                                        include 'db_connect.php';
                                        $size = $con->query("SELECT size FROM product WHERE product_id = ". $_GET['id'] ." ");
                                        while ($row = $size->fetch_assoc()) {

                                            $my_array1 = explode(",", $row['size']);
                                    ?>
                                    <select class="form-control form-control-sm" name="psize" id="psize" >
                                        <option value="">Select Size</option>
                                        <?php 
                                        foreach($my_array1 as $item){
                                            echo "<option value='$item'>$item</option>";
                                        }
                                        ?>
                                    </select>
                                    <?php }?>
                                </div>
                            </div>
                        </div>
                        <hr />
                        <!-- Quantity -->
                        <div class="cart_extra">
                            <div class="cart-product-quantity">
                                <div class="quantity">
                                    <input type="button" value="-" class="minus">
                                    <input type="number" name="quantity" id="quantity" value="1" min="1" max="<?=$product['stocks']?>" title="Qty" class="qty" size ="4" required>
                                    <input type="button" value="+" class="plus">
                                </div>
                            </div>
                            <div class="cart_btn">
                                <input type="hidden" id="pid" name="pid" class="pID" value="<?=$product['product_id']?>">
                                <input type="hidden" id="pprice" name="pprice" value="<?=$product['price']?>">
                                <button type="submit" name="submit" id="submit" class="btn btn-fill-out" 
                                <?php 
                                if(!isset($_SESSION['userID']) && empty($_SESSION['userID'])) {
                                    ?>
                                    disabled
                                    <?php
                                }
                                ?>
                                ><i class="icon-basket-loaded"></i> Add to cart</button>
                                <a class="add_wishlist" id="addwl" href='#'><i class="icon-heart whishstate 
                                    <?php  
                                    if(isset($_SESSION["userID"])) {  
                                        $select_stmt = $connect->prepare("SELECT * from wishlist_table WHERE pr_id = ? AND user_id= ?");
                                        $select_stmt->execute([$product['product_id'] , $_SESSION["userID"]]);
                                        $row=$select_stmt->rowCount();
                                        if(($row > 0) && ($_SESSION["userID"]) != ""){
                                    ?>  
                                    active
                                    <?php 
                                    }
                                    if(($_SESSION["userID"] == "")){
                                    ?>   
                                        
                                    <?php
                                    }
                                }
                                ?>
                                "></i></a>
                            </div>
                        </div>
                        <hr />
                        <ul class="product-meta">
                            <li>SKU: <a href="#">BE45VGRT</a></li>
                            <li>Category: <a href="#">Clothing</a></li>
                            <li>Tags: <a href="#" rel="tag">Cloth</a>, <a href="#" rel="tag">printed</a> </li>
                        </ul> 
                        <div class="product_share">
                            <span>Share:</span>
                            <ul class="social_icons">
                                <li><a href="#"><i class="ion-social-facebook"></i></a></li>
                                <li><a href="#"><i class="ion-social-twitter"></i></a></li>
                                <li><a href="#"><i class="ion-social-googleplus"></i></a></li>
                                <li><a href="#"><i class="ion-social-youtube-outline"></i></a></li>
                                <li><a href="#"><i class="ion-social-instagram-outline"></i></a></li>
                            </ul>
                        </div>
                    </div>            
                </form>
            </div>
        </div>
         <!-- Spacing -->
        <div class="row">
        	<div class="col-12">
            	<div class="large_divider clearfix"></div>
            </div>
        </div>
        <div class="row">
        	<div class="col-12">
            	<div class="tab-style3">
					<ul class="nav nav-tabs" role="tablist">
						<li class="nav-item">
							<a class="nav-link active" id="Description-tab" data-toggle="tab" href="#Description" role="tab" aria-controls="Description" aria-selected="true">Description</a>
                      	</li>
                      	<li class="nav-item">
                        	<a class="nav-link" id="Additional-info-tab" data-toggle="tab" href="#Additional-info" role="tab" aria-controls="Additional-info" aria-selected="false">Additional info</a>
                      	</li>
                        <?php
                            $connect = new PDO("mysql:host=localhost;dbname=alternative_project", "root", "");
                            $product_review = $connect->prepare('SELECT * FROM product_review where user_id = ? and product_id =?');
                            $product_review->execute([$_SESSION["userID"], $_GET['id']]);
                            $row=$product_review->rowCount();
                        ?>
                      	<li class="nav-item">
                        	<a class="nav-link" id="Reviews-tab" data-toggle="tab" href="#Reviews" role="tab" aria-controls="Reviews" aria-selected="false">Reviews (<?=$row?>)</a>
                      	</li>
                    </ul>
                	<div class="tab-content shop_info_tab">
                      	<div class="tab-pane fade show active" id="Description" role="tabpanel" aria-labelledby="Description-tab">
                        	<p><?=$product['prt_desc']?></p>
                      	</div>
                        <!-- Product Detail -->
                      	<div class="tab-pane fade" id="Additional-info" role="tabpanel" aria-labelledby="Additional-info-tab">
                        	<table class="table table-bordered">
                            	<tr>
                                	<td>Materials</td>
                                	<td><?=$product['materials']?></td>
                            	</tr>
                                <tr>
                                    <td>Style</td>
                                    <td><?=$product['style']?></td>
                                </tr>
                                <tr>
                                    <td>Color Shown</td>
                                    <td><?=$product['color_shown']?></td>
                                </tr>
                                <tr>
                                    <td>Shoe Type</td>
                                    <td><?=$product['type']?></td>
                                </tr>
                        	</table>
                      	</div>
                      	<div class="tab-pane fade" id="Reviews" role="tabpanel" aria-labelledby="Reviews-tab">
                        	<div class="comments">
                            	<h5 class="product_tab_title">2 Review For <span>Blue Dress For Woman</span></h5>
                                <ul class="list_none comment_list mt-4">
                                    <li>
                                        <div class="comment_block">
                                            <div class="rating_wrap">
                                                <div class="rating">
                                                    <div class="product_rate" style="width:80%"></div>
                                                </div>
                                            </div>
                                            <p class="customer_meta">
                                                <span class="review_author">Alea Brooks</span>
                                                <span class="comment-date">March 5, 2018</span>
                                            </p>
                                            <div class="description">
                                                <p>Lorem Ipsumin gravida nibh vel velit auctor aliquet. Aenean sollicitudin, lorem quis bibendum auctor, nisi elit consequat ipsum, nec sagittis sem nibh id elit. Duis sed odio sit amet nibh vulputate</p>
                                            </div>
                                        </div>
                                    </li>
                                </ul>
                        	</div>
                            <div class="review_form field_form">
                                <h5>Add a review</h5>
                                <form class="row mt-3" method="post" id="reveiw" enctype="multipart/form-data">
                                    <div class="form-group col-12">
                                        <div class="star_rating">
                                            <span data-value="1"><i class="far fa-star"></i></span>
                                            <span data-value="2"><i class="far fa-star"></i></span> 
                                            <span data-value="3"><i class="far fa-star"></i></span>
                                            <span data-value="4"><i class="far fa-star"></i></span>
                                            <span data-value="5"><i class="far fa-star"></i></span>
                                        </div>
                                    </div>
                                    <input type="hidden" id="pid" name="pid" class="pID" value="<?=$_GET['id']?>">
                                    <input type="hidden" id="uid" name="uid" value="<?=$_SESSION['userID']?>">
                                    <div class="form-group col-12">
                                        <textarea required="required" placeholder="Your review *" class="form-control" name="reveiwM" id="reveiwM" rows="4"></textarea>
                                    </div>
                                    <div class="form-group col-12">
                                        <button type="submit" class="btn btn-fill-out" name="submitReveiw" id="submitReveiw" value="Submit">Submit Review</button>
                                    </div>
                                </form>
                            </div>
                      	</div>
                	</div>
                </div>
            </div>
        </div>
        <div class="row">
        	<div class="col-12">
            	<div class="small_divider"></div>
            	<div class="divider"></div>
                <div class="medium_divider"></div>
            </div>
        </div>
        <div class="row">
        	<div class="col-12">
            	<div class="heading_s1">
                	<h3>Releted Products</h3>
                </div>
            	<div class="releted_product_slider carousel_slider owl-carousel owl-theme" data-margin="20" data-responsive='{"0":{"items": "1"}, "481":{"items": "2"}, "768":{"items": "3"}, "1199":{"items": "4"}}'>
                	<div class="item">
                        <div class="product">
                            <div class="product_img">
                                <a href="shop-product-detail.html">
                                    <img src="assets/images/product_img1.jpg" alt="product_img1">
                                </a>
                            </div>
                            <div class="product_info">
                                <h6 class="product_title"><a href="shop-product-detail.html">Blue Dress For Woman</a></h6>
                                <div class="product_price">
                                    <span class="price">$45.00</span>
                                    <del>$55.25</del>
                                    <div class="on_sale">
                                        <span>35% Off</span>
                                    </div>
                                </div>
                                <div class="rating_wrap">
                                    <div class="rating">
                                        <div class="product_rate" style="width:80%"></div>
                                    </div>
                                    <span class="rating_num">(21)</span>
                                </div>
                                <div class="pr_desc">
                                    <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Phasellus blandit massa enim. Nullam id varius nunc id varius nunc.</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- END SECTION SHOP -->
<script>
    $star_val = 0;
$(document).ready(function () {
	$('.star_rating span').on('click', function(){
		var onStar = parseFloat($(this).data('value'), 10); // The star currently selected
		var stars = $(this).parent().children('.star_rating span');
		for (var i = 0; i < stars.length; i++) {
			$(stars[i]).removeClass('selected');
		}
    	for (i = 0; i < onStar; i++) {
		    $(stars[i]).addClass('selected');
	    }
        $star_val = onStar;
	});


    $('#submitReveiw').on('click', function() {

        var pr_id = $('#pid').val();
        var user_id = $('#uid').val();
        var review = $('#reveiwM').val();
        var star_val = $star_val;
  
        $('#submitReveiw').attr("disabled","disabled");
        if(pr_id!="" && user_id!="" && review!="" && star_val!=0){
            $.ajax({
                url: "./assets/php/product_review.php",
                type: "POST",
                data: {
                    pr_id: pr_id ,
                    user_id: user_id,	
                    review: review ,
                    star_val: star_val		
                },
                cache: false,
                beforeSend:function(){
                $('#submitReveiw').val('Submitting...');
                },
                success:function(response){
                    if(response == 1){
                        $(".update-message").html('<div class="alert alert-success alert-dismissible mt-2"><button type="button" class="close" data-dismiss="alert">x</button> <strong>Address is Updated</strong></div>');
                        $('#updateAdd').removeAttr("disabled","disabled");
                        window.scrollTo(0,0);
                    }
                    if(response == 2){
                        $(".update-message").html('<div class="alert alert-danger alert-dismissible mt-2"><button type="button" class="close" data-dismiss="alert">x</button> <strong>Password not match</strong></div>');
                        $('#updateAdd').removeAttr("disabled","disabled");
                        window.scrollTo(0,0);
                    }
                }
            });
            setInterval(function(){
                $('.update-message').html('');
            }, 9999) 
        }else{
            $('#submitReveiw').removeAttr("disabled","disabled");
            alert('Please fill all the field !');
        }
    });
});
</script>
