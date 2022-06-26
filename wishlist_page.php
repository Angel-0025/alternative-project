<!-- START SECTION BREADCRUMB -->
<div class="breadcrumb_section bg_gray page-title-mini">
    <div class="container"><!-- STRART CONTAINER -->
        <div class="row align-items-center">
        	<div class="col-md-6">
                <div class="page-title">
            		<h1>Wishlist</h1>
                </div>
            </div>
            <div class="col-md-6">
                <ol class="breadcrumb justify-content-md-end">
                    <li class="breadcrumb-item"><a href="index.php?page=home_page">Home</a></li>
                    <li class="breadcrumb-item"><a href="#">Pages</a></li>
                    <li class="breadcrumb-item active">Wishlist</li>
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
                <div class="table-responsive wishlist_table">
                	<table class="table">
                    	<thead>
                        	<tr>
                            	<th class="product-thumbnail">&nbsp;</th>
                                <th class="product-name">Product</th>
                                <th class="product-price">Price</th>
                                <th class="product-stock-status">Stock Status</th>
                                <th class="product-add-to-cart"></th>
                                <th class="product-remove">Remove</th>
                            </tr>
                        </thead>
                        <?php
                            $connect = new PDO("mysql:host=localhost;dbname=alternative_project", "root", "");
                            $stmt = $connect->prepare('SELECT * FROM wishlist_table');
                            $stmt->execute();
                            while ($prid= $stmt->fetch(PDO::FETCH_ASSOC)) {
                                $pr = $connect->prepare('SELECT * FROM product WHERE product_id = ?');
                                $pr->execute([$prid['pr_id']]);
                                while ($product= $pr->fetch(PDO::FETCH_ASSOC)) {
                        ?>
                        <tbody>
                        	<tr>
                                <?php

                                        $pr_img = $connect->prepare('SELECT * FROM product_image WHERE product_id = ? LIMIT 1');
                                        $pr_img->execute([$prid['pr_id']]);
                                        while ($img= $pr_img->fetch(PDO::FETCH_ASSOC)) {
                                ?>
                            	<td class="product-thumbnail"><a href="#"><img src="data:image/jpeg;base64, <?=base64_encode( $img['images'] );?>" alt="product_small_img1" /></a></td>
                                <?php   
                                    }
                                ?>
                                <form method="post" class="delete_wl" id="del" enctype="multipart/form-data">
                                    <td class="product-name" data-title="Product"><a href="#"><?=$product['name']?></a></td>
                                    <td class="product-price" data-title="Price"><span>&#8369; </span><?=$product['price']?></td>
                                    <td class="product-stock-status" data-title="Stock Status"><span class="badge badge-pill badge-success">In Stock</span></td>

                                    <td class="product-add-to-cart"><a href="index.php?page=product_detail&id=<?=$product['product_id']?>" 
                                    class="btn btn-fill-out"><i class="icon-basket-loaded"></i> Add to Cart</a></td>
                                    <td class="product-remove" data-title="Remove" ><a type="button" name="remove" class="remove" id="<?=$product['product_id']?>"><i class="ti-close"></i></a></td>
                                </form>
                            </tr>
                        </tbody>
                        <?php
                                }
                            }
                        ?>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- END SECTION SHOP -->
<script>
    

</script>
