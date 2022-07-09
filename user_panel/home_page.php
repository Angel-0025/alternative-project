<!-- START SECTION BANNER -->
<div class="banner_section slide_medium shop_banner_slider staggered-animation-wrap">
    <div id="carouselExampleControls" class="carousel slide carousel-fade light_arrow" data-ride="carousel">
        <div class="carousel-inner">
            <div class="carousel-item active background_bg" data-img-src="assets/images/pexels-run-ffwpu-2526878.jpg">
                <div class="banner_slide_content">
                    <div class="container"><!-- START CONTAINER -->
                        <div class="row">
                            <div class="col-lg-7 col-9">
                                <div class="banner_content overflow-hidden">
                                    <h2 class="staggered-animation" data-animation="slideInLeft" data-animation-delay="1s"  style="color: #EDEADE;">Running Shoes</h2>
                                        <?php
                                            include 'db_connect.php';
                                            $typ = "running";
                                        ?>
                                    <a class="btn btn-fill-out rounded-0 staggered-animation text-uppercase" data-animation="slideInLeft" data-animation-delay="1.5s" href="index.php?page=type_search&catyp=<?=$typ?>">Shop Now</a>
                                </div>
                            </div>
                        </div>
                    </div><!-- END CONTAINER-->
                </div>
            </div>
            <div class="carousel-item background_bg" data-img-src="assets/images/pexels-jeshootscom-7432.jpg">
                <div class="banner_slide_content">
                    <div class="container"><!-- STRART CONTAINER -->
                        <div class="row">
                            <div class="col-lg-6">
                                <div class="banner_content overflow-hidden">
                                    <h2 class="staggered-animation" data-animation="slideInLeft" data-animation-delay="1s" style="color: #EDEADE;">Women Shoe</h2>
                                        <?php
                                            $trgt = "women";
                                        ?>
                                    <a class="btn btn-fill-out rounded-0 staggered-animation text-uppercase" data-animation="slideInLeft" data-animation-delay="1.5s" href="index.php?page=target_search&catrft=<?=$trgt?>">Shop Now</a>
                                </div>
                            </div>
                        </div>
                    </div><!-- END CONTAINER-->
                </div>
            </div>
            <div class="carousel-item background_bg" data-img-src="assets/images/pexels-yaroslav-shuraev-8693988.jpg">
                <div class="banner_slide_content">
                    <div class="container"><!-- STRART CONTAINER -->
                        <div class="row">
                            <div class="col-lg-6">
                                <div class="banner_content overflow-hidden">
                                    <h2 class="staggered-animation" data-animation="slideInLeft" data-animation-delay="1s" style="color: #EDEADE;">Basketball Shoe</h2>
                                        <?php
                                            include 'db_connect.php';
                                            $typ = "basketball";
                                        ?>
                                    <a class="btn btn-fill-out rounded-0 staggered-animation text-uppercase" data-animation="slideInLeft" data-animation-delay="1.5s" href="index.php?page=type_search&catyp=<?=$typ?>">Shop Now</a>
                                </div>
                            </div>
                        </div>
                    </div><!-- END CONTAINER-->
                </div>
            </div>
            <div class="carousel-item background_bg" data-img-src="assets/images/pexels-jens-mahnke-1153838.jpg">
                <div class="banner_slide_content">
                    <div class="container"><!-- STRART CONTAINER -->
                        <div class="row">
                            <div class="col-lg-6">
                                <div class="banner_content overflow-hidden">
                                    <h2 class="staggered-animation" data-animation="slideInLeft" data-animation-delay="1s" style="color: #EDEADE;">Men Shoe</h2>
                                        <?php
                                            include 'db_connect.php';
                                            $trgt = "men";
                                        ?>
                                    <a class="btn btn-fill-out rounded-0 staggered-animation text-uppercase" data-animation="slideInLeft" data-animation-delay="1.5s" href="index.php?page=target_searchM&catrftm=<?=$trgt?>">Shop Now</a>
                                </div>
                            </div>
                        </div>
                    </div><!-- END CONTAINER-->
                </div>
            </div>
        </div>
        <a class="carousel-control-prev" href="#carouselExampleControls" role="button" data-slide="prev"><i class="ion-chevron-left"></i></a>
        <a class="carousel-control-next" href="#carouselExampleControls" role="button" data-slide="next"><i class="ion-chevron-right"></i></a>
    </div>
</div>
<!-- END SECTION BANNER -->

<!-- START main content-->
<div class="main-content">

    <!-- START SECTION SHOP -->
    <div class="section small_pb">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <div class="heading_tab_header">
                        <div class="heading_s2">
                            <h2>Exclusive Products</h2>
                        </div>
                        <div class="tab-style2">
                            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#tabmenubar" aria-expanded="false"> 
                                <span class="ion-android-menu"></span>
                            </button>
                            <ul class="nav nav-tabs justify-content-center justify-content-md-end" id="tabmenubar" role="tablist">
                                <li class="nav-item">
                                    <a class="nav-link active" id="arrival-tab" data-toggle="tab" href="#arrival" role="tab" aria-controls="arrival" aria-selected="true">New Arrival</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" id="sellers-tab" data-toggle="tab" href="#sellers" role="tab" aria-controls="sellers" aria-selected="false">Best Sellers</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" id="featured-tab" data-toggle="tab" href="#featured" role="tab" aria-controls="featured" aria-selected="false">Featured</a>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-12">
                    <div class="tab_slider">
                        <div class="tab-pane fade show active" id="arrival" role="tabpanel" aria-labelledby="arrival-tab">
                            <div class="product_slider carousel_slider owl-carousel owl-theme nav_style1" data-loop="true" data-dots="false" data-nav="true" data-margin="20" data-responsive='{"0":{"items": "1"}, "481":{"items": "2"}, "768":{"items": "3"}, "1199":{"items": "4"}}'>
                                <?php
                                include 'db_connect.php';
                                $sql = mysqli_query($con, "SELECT * FROM product ORDER BY product_id DESC LIMIT 5");
                                while ($row = mysqli_fetch_array($sql)) {
                                    $prd_id = $row['product_id'];   
                                ?>
                                <div class="item">
                                    <div class="product">
                                        <div class="product-img">
                                            <?php
                                                include 'db_connect.php';
                                                $query = 'SELECT * FROM product_image where product_id = '. $prd_id .' and image_number = '. 0 .'';
                                                $result = $con->query($query);
                                                $followingdata = $result->fetch_assoc();  
                                            ?>
                                            <a href="index.php?page=product_detail&id=<?=$row['product_id']?>"  class="pdt_id">
                                                <img src="data:image/jpeg;base64, <?=base64_encode( $followingdata['images'] );?>" alt="product_img1" />
                                            </a>
                                        </div>
                                        <?php ?>
                                        <div class="product_info">
                                            <h6 class="product_title"><a href="index.php?page=product_detail&id=<?=$row['product_id']?>"><?=$row['name'];?> </a></h6>
                                            <div class="product_price">
                                            <span class="price"><span>&#8369; </span><?=number_format($row['price'], 2);?> </span>
                                                <div class="rating_wrap">
                                                    <div class="rating">
                                                        <div class="product_rate" style="width:<?php echo ($row['rating'] *20)?>%"></div>
                                                    </div>
                                                    <?php
                                                        $connect = new PDO("mysql:host=localhost;dbname=alternative_project", "root", "");
                                                        $select_stmt = $connect->prepare("SELECT * from product_review where product_id = ?");
                                                        $select_stmt->execute([$row['product_id']]);
                                                        $row=$select_stmt->rowCount();
                                                    ?>
                                                    <span class="rating_num">(<?=$row?>)</span>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <?php }?>
                            </div>
                        </div>
                        <div class="tab-pane fade" id="sellers" role="tabpanel" aria-labelledby="sellers-tab">
                            <div class="product_slider carousel_slider owl-carousel owl-theme nav_style1" data-loop="true" data-dots="false" data-nav="true" data-margin="20" data-responsive='{"0":{"items": "1"}, "481":{"items": "2"}, "768":{"items": "3"}, "1199":{"items": "4"}}'>
                                <?php
                                include 'db_connect.php';
                                $sql = mysqli_query($con, "SELECT * FROM product ORDER BY stocks ASC LIMIT 5");
                                while ($row = mysqli_fetch_array($sql)) {
                                    $prd_id = $row['product_id'];   
                                ?>
                                <div class="item">
                                    <div class="product">
                                        <div class="product-img">
                                            <?php
                                                include 'db_connect.php';
                                                $query = 'SELECT * FROM product_image where product_id = '. $prd_id .' and image_number = '. 0 .'';
                                                $result = $con->query($query);
                                                $followingdata = $result->fetch_assoc();  
                                            ?>
                                            <a href="index.php?page=product_detail&id=<?=$row['product_id']?>"  class="pdt_id">
                                                <img src="data:image/jpeg;base64, <?=base64_encode( $followingdata['images'] );?>" alt="product_img1" />
                                            </a>
                                        </div>
                                        <?php ?>
                                        <div class="product_info">
                                            <h6 class="product_title"><a href="index.php?page=product_detail&id=<?=$row['product_id']?>"><?=$row['name'];?> </a></h6>
                                            <div class="product_price">
                                            <span class="price"><span>&#8369; </span><?=number_format($row['price'], 2);?> </span>
                                                <div class="rating_wrap">
                                                    <div class="rating">
                                                        <div class="product_rate" style="width:<?php echo ($row['rating'] *20)?>%"></div>
                                                    </div>
                                                    <?php
                                                        $connect = new PDO("mysql:host=localhost;dbname=alternative_project", "root", "");
                                                        $select_stmt = $connect->prepare("SELECT * from product_review where product_id = ?");
                                                        $select_stmt->execute([$row['product_id']]);
                                                        $row=$select_stmt->rowCount();
                                                    ?>
                                                    <span class="rating_num">(<?=$row?>)</span>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <?php }?>
                            </div>
                        </div>
                        <div class="tab-pane fade" id="featured" role="tabpanel" aria-labelledby="featured-tab">
                            <div class="product_slider carousel_slider owl-carousel owl-theme nav_style1" data-loop="true" data-dots="false" data-nav="true" data-margin="20" data-responsive='{"0":{"items": "1"}, "481":{"items": "2"}, "768":{"items": "3"}, "1199":{"items": "4"}}'>
                                <?php
                                include 'db_connect.php';
                                $sql = mysqli_query($con, "SELECT * FROM product ORDER BY rating DESC LIMIT 5");
                                while ($row = mysqli_fetch_array($sql)) {
                                    $prd_id = $row['product_id'];   
                                ?>
                                <div class="item">
                                    <div class="product">
                                        <div class="product-img">
                                            <?php
                                                include 'db_connect.php';
                                                $query = 'SELECT * FROM product_image where product_id = '. $prd_id .' and image_number = '. 0 .'';
                                                $result = $con->query($query);
                                                $followingdata = $result->fetch_assoc();  
                                            ?>
                                            <a href="index.php?page=product_detail&id=<?=$row['product_id']?>"  class="pdt_id">
                                                <img src="data:image/jpeg;base64, <?=base64_encode( $followingdata['images'] );?>" alt="product_img1" />
                                            </a>
                                        </div>
                                        <?php ?>
                                        <div class="product_info">
                                            <h6 class="product_title"><a href="index.php?page=product_detail&id=<?=$row['product_id']?>"><?=$row['name'];?> </a></h6>
                                            <div class="product_price">
                                            <span class="price"><span>&#8369; </span><?=number_format($row['price'], 2);?> </span>
                                                <div class="rating_wrap">
                                                    <div class="rating">
                                                        <div class="product_rate" style="width:<?php echo ($row['rating'] *20)?>%"></div>
                                                    </div>
                                                    <?php
                                                        $connect = new PDO("mysql:host=localhost;dbname=alternative_project", "root", "");
                                                        $select_stmt = $connect->prepare("SELECT * from product_review where product_id = ?");
                                                        $select_stmt->execute([$row['product_id']]);
                                                        $row=$select_stmt->rowCount();
                                                    ?>
                                                    <span class="rating_num">(<?=$row?>)</span>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <?php }?>
                            </div>
                        </div>
                    </div>
                </div>
            </div> 
        </div>
    </div>
    <!-- END SECTION SHOP -->


    <!-- START SECTION CATEGORIES -->
    <div class="section small_pb small_pt">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-md-6">
                    <div class="heading_s4 text-center">
                        <h2>Top Categories</h2>
                    </div>
                    <p class="text-center leads">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Phasellus blandit massa enim Nullam nunc varius.</p>
                </div>
            </div>
            <div class="row align-items-center">
                <div class="col-12">
                    <div class="cat_slider cat_style1 mt-4 mt-md-0 carousel_slider owl-carousel owl-theme nav_style5" data-loop="true" data-dots="false" data-nav="true" data-margin="30" data-responsive='{"0":{"items": "2"}, "480":{"items": "3"}, "576":{"items": "4"}, "768":{"items": "7"}, "991":{"items": "7"}, "1199":{"items": "7"}}'>
                        <div class="item">
                            <?php
                            include 'db_connect.php';
                                $ven = "under armour";
                                $sql = mysqli_query($con, "SELECT * FROM product WHERE vendor LIKE '{$ven}'");
                                $row = mysqli_fetch_array($sql);
                                $prd_id = $row['vendor'];   
                            ?>
                            <div class="categories_box">
                                <a href="index.php?page=category_search&catid=<?=$prd_id?>">
                                    <img src="assets/images/5842f037a6515b1e0ad75b12.png"  width="65%" height="150"/>
                                </a>
                            </div>
                        </div>
                        <div class="item">
                            <div class="categories_box">
                                <?php
                                include 'db_connect.php';
                                    $ven = "adidas";
                                    $sql = mysqli_query($con, "SELECT * FROM product WHERE vendor LIKE '{$ven}'");
                                    $row = mysqli_fetch_array($sql);
                                    $prd_id = $row['vendor'];   
                                ?>
                                <a href="index.php?page=category_search&catid=<?=$prd_id?>">
                                    <img src="assets/images/adidas-logo-png-2371.png"  width="65%" height="150"/>
                                </a>
                            </div>
                        </div>
                        <div class="item">
                            <div class="categories_box">
                                <?php
                                    include 'db_connect.php';
                                    $ven = "nike";
                                    $sql = mysqli_query($con, "SELECT * FROM product WHERE vendor LIKE '{$ven}'");
                                    $row = mysqli_fetch_array($sql);
                                    $prd_id = $row['vendor'];   
                                ?>
                                <a href="index.php?page=category_search&catid=<?=$prd_id?>">
                                    <img src="assets/images/kindpng_827406.png"  width="65%" height="150"/>
                                </a>
                            </div>
                        </div>
                        <div class="item">
                            <div class="categories_box">
                                <?php
                                    include 'db_connect.php';
                                    $ven = "reebok";
                                    $sql = mysqli_query($con, "SELECT * FROM product WHERE vendor LIKE '{$ven}'");
                                    $row = mysqli_fetch_array($sql);
                                    $prd_id = $row['vendor'];   
                                ?>
                                <a href="index.php?page=category_search&catid=<?=$prd_id?>">
                                    <img src="assets/images/Reebok_Logo_2019.png"  width="65%" height="150"/>
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- END SECTION CATEGORIES --> 

    <!-- FEATURED PRODUCTS-->
    <div class="section">
		<div class="container">
			<div class="row justify-content-center">
				<div class="col-md-6">
					<div class="heading_s1 text-center">
						<h2>Featured Products</h2>
					</div>
				</div>
			</div>
			<div class="row">
				<div class="col-md-12">
					<div class="product_slider carousel_slider owl-carousel owl-theme nav_style1 owl-loaded owl-drag">
						<div class="owl-stage-outer">
							<div class="owl-stage" style="transform: translate3d(-1130px, 0px, 0px); transition: all 0s ease 0s; width: 3673px;">
							</div>
						</div>
                        <?php
                            include 'db_connect.php';
                            $sql = mysqli_query($con, "SELECT * FROM product ORDER BY rating DESC LIMIT 5");
                            while ($row = mysqli_fetch_array($sql)) {
                                $prd_id = $row['product_id'];   
                        ?>
						<div class="item">
							<div class="product">
								<div class="product-img">
                                    <?php
                                        include 'db_connect.php';
                                        $query = 'SELECT * FROM product_image where product_id = '. $prd_id .' and image_number = '. 0 .'';
                                        $result = $con->query($query);
                                        $followingdata = $result->fetch_assoc();  
                                    ?>
                                    <a href="index.php?page=product_detail&id=<?=$row['product_id']?>"  class="pdt_id">
										<img src="data:image/jpeg;base64, <?=base64_encode( $followingdata['images'] );?>" alt="product_img1" />
									</a>
								</div>
                                <?php ?>
								<div class="product_info">
									<h6 class="product_title"><a href="index.php?page=product_detail&id=<?=$row['product_id']?>"><?=$row['name'];?> </a></h6>
									<div class="product_price">
                                    <span class="price"><span>&#8369; </span><?=number_format($row['price'], 2);?> </span>
 
										<div class="rating_wrap">
											<div class="rating">
												<div class="product_rate" style="width:<?php echo ($row['rating'] *20)?>%"></div>
											</div>
                                            <?php
                                                $connect = new PDO("mysql:host=localhost;dbname=alternative_project", "root", "");
                                                $select_stmt = $connect->prepare("SELECT * from product_review where product_id = ?");
                                                $select_stmt->execute([$row['product_id']]);
                                                $row=$select_stmt->rowCount();
                                            ?>
											<span class="rating_num">(<?=$row?>)</span>
										</div>
									</div>
								</div>
							</div>
						</div>
                        <?php }?>
                        
					</div>
				</div>
			</div>
		</div>
	</div>
</div>
<!-- END FEATURED PRODUCTS -->
<!-- END main content-->

