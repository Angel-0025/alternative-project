<style>
    .preview-images-zone {
        width: 100%;
        border: 1px solid #ddd;
        min-height: 180px;
        padding: 5px 5px 0px 5px;
        position: relative;
        overflow:auto;
    }

    .container {
        padding-top: 50px;
    }

    .flex-child {
        display: inline-block;
        margin-right: 5px;
        margin-left: 5px;
    } 
    .product-thumbnail img {
	max-width: 145px;
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
print_r($product['product_id']);
?>
<!-- New Product -->
<div class="content">
    <form method="post" id="product_info" enctype="multipart/form-data">
        <div class="row">
            <div class="col-12 pb-3">
                <h2>View Product</h2>
            </div>
        </div>
        <span id="success_message"></span>
            <!-- Title/Description and Organization -->
            <div class="row">
                <div class="col-8">
                    <div class="card card-table-border-none" id="product-info">
                        <div class="card-body pt-4 pb-5">
                            <div class="row">
                                <div class="form-group col-md-12 mb-3">
                                    <label for="product-title">Product Title</label>
                                    <input type="text" required="" class="form-control form-control-md input-md" id="product_name" name="product_name" placeholder="Enter Product Name" value="<?php echo ucwords($product['name']);?>" readonly="readonly" />
                                </div>
                                <div class="form-group col-md-12 mb-4">
                                    <label for="product-description">Product Description</label>
                                    <textarea class="form-control" required="" name="product_desc" id="product_desc" cols="30" rows="5" readonly="readonly"><?php echo ucwords($product['prt_desc']);?></textarea>
                                </div>
                                <div class="form-group col-md-12 mb-4">
                                    <label for="product-description">Materials</label>
                                    <input type="text"required="" class="form-control form-control-md input-md" name="product_materials"  id="product_materials" placeholder="Enter Product Materials" value="<?php echo ucwords($product['materials']);?>" readonly="readonly" />
                                </div>
                                <div class="form-group col-md-12 mb-4">
                                    <label for="product-description">Style</label>
                                    <input type="text" required="" class="form-control form-control-md input-md" name="product_style"  id="product_style" placeholder="Enter Product Style" value="<?php echo ucwords($product['style']);?>" readonly="readonly" />
                                </div>
                                <div class="form-group col-md-12 mb-4">
                                    <label for="product-description">Color Shown</label>
                                    <input type="text" required="" class="form-control form-control-md input-md" name="product_cShown"  id="product_cShown" placeholder="Enter Color Shown" value="<?php echo ucwords($product['color_shown']);?>" readonly="readonly" />
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-4">
                    <div class="card card-table-border-none" id="product-info">
                        <div class="card-header justify-content-between">
                            <h2>Organization</h2>
                        </div>
                        <div class="card-body pt-4 pb-5">
                            <div class="row">
                                <div class="form-group col-md-12 mb-3">
                                    <label for="product-type">Product Type</label>
                                    <input type="text" required="" class="form-control form-control-md input-md" name="product_cShown"  id="product_cShown" placeholder="Enter Color Shown" value="<?php echo ucwords($product['type']);?>" readonly="readonly" />
                                </div> 
                                <div class="form-group col-md-12 mb-3">
                                    <label for="product-vendor">Product User</label>
                                    <input type="text" required="" class="form-control form-control-md input-md" name="product_cShown"  id="product_cShown" placeholder="Enter Color Shown" value="<?php echo ucwords($product['user_target']);?>" readonly="readonly" />
                                </div>
                                <div class="form-group col-md-12 mb-3">
                                    <label for="product-vendor">Vendor</label>
                                    <input type="text" required="" class="form-control form-control-md input-md" name="product_cShown"  id="product_cShown" placeholder="Enter Color Shown" value="<?php echo ucwords($product['vendor']);?>" readonly="readonly" />
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- Upload Images -->
            <div class="row">
                <div class="col-8">
                    <div class="card card-table-border-none" id="product-info">
                        <div class="card-header justify-content-between">
                            <h2>Images</h2>
                        </div>
                        <div class="card-body pt-4 pb-5 ">
                            <fieldset class="form-group" style="margin-bottom: 0px !important;">
                                <input type="file" name="image[]" id="image"  style="display: none;" class="form-control" multiple accept=".jpg, .png, .gif"/>
                            </fieldset>
                            <div class="preview-images-zone">
                                <?php
                                    $connect = new PDO("mysql:host=localhost;dbname=alternative_project", "root", "");
                                    // Prepare statement and execute, prevents SQL injection
                                    $stmt = $connect->prepare('SELECT * FROM product_image WHERE product_id = ?');
                                    $stmt->execute([$product['product_id']]);
                                    // Fetch the product from the database and return the result as an Array
                                    while($img= $stmt->fetch(PDO::FETCH_ASSOC)){
                                ?>
                                <div class="flex-child product-thumbnail">
                                    <img src="data:image/jpeg;base64, <?=base64_encode( $img['images'] );?>" alt="product_small_img1" />
                                </div>
                                <?php }?>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- Pricing -->
            <div class="row">
                <div class="col-8">
                    <div class="card card-table-border-none" id="product-info">
                        <div class="card-header justify-content-between">
                            <h2>Pricing</h2>
                        </div>
                        <div class="card-body pt-4 pb-5">
                            <div class="row">
                                <div class="form-group col-sm-6 mb-3">
                                    <label for="product-title">Price</label>
                                    <div class="input-group-prepend">
                                        <div class="input-group-text">₱</div>
                                        <input type="text" required="" class="form-control form-control-md input-md" name="product_cShown"  id="product_cShown" placeholder="Enter Color Shown" value="<?php echo number_format($product['price'], 2);?>" readonly="readonly" />
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- Inventory -->
            <div class="row">
                <div class="col-8">
                    <div class="card card-table-border-none" id="product-info">
                        <div class="card-header justify-content-between">
                            <h2>Inventory</h2>
                        </div>
                        <div class="card-body pt-4 pb-5">
                            <div class="row">
                                <div class="form-group col-md-6 mb-3">
                                    <label for="product-title">Product Stocks</label>
                                    <input type="number" class="form-control form-control-md input-md" required="" name="product_stocks"  id="product_stocks" placeholder="Product Stock" value="<?php echo ucwords($product['stocks']);?>" readonly="readonly" />
                                </div>
                                <div class="form-group col-md-6 mb-3">
                                    <label for="product-status">Product Status</label>
                                    <input type="text" class="form-control form-control-md input-md" required="" name="product_stocks"  id="product_stocks" placeholder="Product Stock" value="<?php echo ucwords($product['status']);?>" readonly="readonly"/>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- Variants -->
            <div class="row">
                <div class="col-8">
                    <div class="card card-table-border-none" id="">
                        <div class="card-header justify-content-between">
                            <h2>Variants</h2>
                        </div>
                        <div class="card-body pt-4 pb-5">
                            <div class="row">
                                <div class="form-group col-md-6 mb-3">
                                    <label for="product-size">Product Size</label>
                                    <input type="text" class="form-control form-control-md input-md" required="" name="product_stocks"  id="product_stocks" placeholder="Product Stock" value="<?php echo ucwords($product['size']);?>" readonly="readonly" />
                                </div>
                                
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="form-group row ">
                <div class="col-sm-4 mt-1 pt-1 mr-auto">
                    <label for="exampleFormControlSelect12"></label>
                    <a type="button" href="index.php?page=product_list" class="mb-1 btn btn-danger btn-md">Back</a>
                </div>
            </div>
    </form>   
</div>

