
<!-- START SECTION BREADCRUMB -->
<div class="breadcrumb_section bg_gray page-title-mini">
    <div class="container"><!-- STRART CONTAINER -->
        <div class="row align-items-center">
        	<div class="col-md-6">
                <div class="page-title">
            		<h1>Shopping Cart</h1>
                </div>
            </div>
            <div class="col-md-6">
                <ol class="breadcrumb justify-content-md-end">
                    <li class="breadcrumb-item"><a href="index.php?page=home_page">Home</a></li>
                    <li class="breadcrumb-item"><a href="#">Pages</a></li>
                    <li class="breadcrumb-item active">Shopping Cart</li>
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
            <div class="col-12">
                <div class="table-responsive shop_cart_table">
                	<table class="table">
                    	<thead>
                        	<tr>
                            	<th class="product-thumbnail">&nbsp;</th>
                                <th class="product-name">Product</th>
                                <th class="product-quantity">Quantity</th>
                                <th class="product-size">Size</th>
                                <th class="product-price">Price</th>
                                <th class="product-remove">Remove</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                                $connect = new PDO("mysql:host=localhost;dbname=alternative_project", "root", "");
                                $stmt = $connect->prepare('SELECT * FROM cart_table');
                                $stmt->execute();
                                while ($prid= $stmt->fetch(PDO::FETCH_ASSOC)) {
                            ?>
                        	<tr>
                            <form method="post" class="delete_ItCart" id="del_cart" enctype="multipart/form-data">
                                <?php
                                    $pr = $connect->prepare('SELECT * FROM product WHERE product_id = ?');
                                    $pr->execute([$prid['pr_id']]);
                                    while ($product= $pr->fetch(PDO::FETCH_ASSOC)) {
                                        $pr_img = $connect->prepare('SELECT * FROM product_image WHERE product_id = ? LIMIT 1');
                                        $pr_img->execute([$prid['pr_id']]);
                                        while ($img= $pr_img->fetch(PDO::FETCH_ASSOC)) {
                                ?>
                            	<td class="product-thumbnail"><a href="#"><img src="data:image/jpeg;base64, <?=base64_encode( $img['images'] );?>" alt="product_small_img1" /></a></td>
                                    <?php } ?>
                                <td class="product-name" data-title="Product" style="font-weight: 600;"><a href="index.php?page=product_detail&id=<?=$product['product_id']?>"><?=$product['name']?></a></td>
                                <?php }?>
                                <td class="product-quantity" data-title="Quantity">
                                    <div class="quantity">
                                        <input type="button" value="-" class="minus">
                                        <input type="text" name="quantity" value="<?=$prid['pr_quantity']?>" title="Qty" class="qty" size="4">
                                        <input type="button" value="+" class="plus">
                                    </div>
                                </td>
                                <td class="product-size" data-title="Size" style="font-weight: 600;"><?=$prid['pr_size']?></td>
                                <td class="product-price" data-title="Price"><span>&#8369; </span><?=$prid['pr_price']?></td>
                                <td class="product-remove" data-title="Remove"><a type="button" name="cart_remove" class="cart_remove" id="<?=$prid['pr_id']?>"><i class="ti-close"></i></a></td>
                                <?php }?>
                            </form>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-12">
            	<div class="medium_divider"></div>
            	<div class="divider center_icon"><i class="ti-shopping-cart-full"></i></div>
            	<div class="medium_divider"></div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-12">
            	<div class="border p-3 p-md-4">
                    <div class="heading_s1 mb-3">
                        <h6>Cart Totals</h6>
                    </div>
                    <div class="table-responsive">
                        <table class="table">
                            <tbody>
                                <tr>
                                    <td class="cart_total_label">Cart Subtotal</td>
                                    <td class="cart_total_amount"><strong><span>&#8369; </span><span name="cart_subtotal" id="cart_subtotal" ></span></strong></td>
                                </tr>
                                <tr>
                                    <td class="cart_total_label">Shipping</td>
                                    <td class="cart_total_amount">Free Shipping</td>
                                </tr>
                                <tr>
                                    <td class="cart_total_label">Total</td>
                                    <td class="cart_total_amount"><strong><span>&#8369; </span><span name="cart_total" id="cart_total" style="font-weight: 600;"></span></strong></td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                    <a href="index.php?page=checkout_page" class="btn btn-fill-out">Proceed To CheckOut</a>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- END SECTION SHOP -->
<script>
   
    
</script>