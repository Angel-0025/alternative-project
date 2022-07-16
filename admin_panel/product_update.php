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
                <h2>Add Product</h2>
            </div>
        </div>
        <span id="alert-success_message"></span>
            <!-- Title/Description and Organization -->
            <div class="row">
                <div class="col-8">
                    <div class="card card-table-border-none" id="product-info">
                        <div class="card-body pt-4 pb-5">
                            <div class="row">
                                <div class="form-group col-md-12 mb-3">
                                    <label for="product-title">Product Title</label>
                                    <input type="text" required="" class="form-control form-control-md input-md" id="product_name" name="product_name" placeholder="Enter Product Name" value="<?php echo ucwords($product['name']);?>" />
                                </div>
                                <div class="form-group col-md-12 mb-4">
                                    <label for="product-description">Product Description</label>
                                    <textarea class="form-control" required="" name="product_desc" id="product_desc" cols="30" rows="5"> <?php echo ucwords($product['prt_desc']);?></textarea>
                                </div>
                                <div class="form-group col-md-12 mb-4">
                                    <label for="product-description">Materials</label>
                                    <input type="text"required="" class="form-control form-control-md input-md" name="product_materials"  id="product_materials" placeholder="Enter Product Materials" value="<?php echo ucwords($product['materials']);?>" />
                                </div>
                                <div class="form-group col-md-12 mb-4">
                                    <label for="product-description">Style</label>
                                    <input type="text" required="" class="form-control form-control-md input-md" name="product_style"  id="product_style" placeholder="Enter Product Style" value="<?php echo ucwords($product['style']);?>" />
                                </div>
                                <div class="form-group col-md-12 mb-4">
                                    <label for="product-description">Color Shown</label>
                                    <input type="text" required="" class="form-control form-control-md input-md" name="product_cShown"  id="product_cShown" placeholder="Enter Color Shown" value="<?php echo ucwords($product['color_shown']);?>" />
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
                                    <select class="form-control form-control-md input-md prd_type select2-hidden-accessible" required="" name="prt_type" id="prt_type">
                                        <option value="<?php echo ucwords($product['type']);?>"><?php echo ucwords($product['type']);?></option>
                                        <option value="running shoes">Running Shoes</option>
                                        <option value="basketball shoes">Basketball Shoes</option>
                                    </select>
                                </div> 
                                <div class="form-group col-md-12 mb-3">
                                    <label for="product-vendor">Product User</label>
                                    <select class="form-control form-control-md prd_ppl select2-hidden-accessible" required="" name="product_user" id="product_user">
                                        <option value="<?php echo ucwords($product['user_target']);?>"><?php echo ucwords($product['user_target']);?></option>
                                        <option value="Men">Men</option>
                                        <option value="Women">Women</option>
                                        <option value="Boy">Boy</option>
                                        <option value="Girl">Girl</option>
                                        <option value="Unisex">Unisex</option>
                                    </select>
                                </div>
                                <div class="form-group col-md-12 mb-3">
                                    <label for="product-vendor">Vendor</label>
                                    <select class="form-control form-control-md prd_vendor select2-hidden-accessible" required="" name="product_vendor" id="product_vendor">
                                        <option value="<?php echo ucwords($product['vendor']);?>"><?php echo ucwords($product['vendor']);?></option>
                                        <option value="adidas">Adidas</option>
                                        <option value="nike">Nike</option>
                                        <option value="reebok">Reebok</option>
                                        <option value="under armour">Under Armour</option>
                                    </select>
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
                                        <input type="number" class="form-control form-control-md input-md" required="" name="product_price"  id="product_price" placeholder="Enter Product Price" value="<?php echo intval($product['price']);?>" />
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
                                    <input type="number" class="form-control form-control-md input-md" required="" name="product_stocks"  id="product_stocks" placeholder="Product Stock" value="<?php echo ucwords($product['stocks']);?>"  />
                                </div>
                                <div class="form-group col-md-6 mb-3">
                                    <label for="product-status">Product Status</label>
                                    <select class="form-control form-control-md prd_vendor select2-hidden-accessible" required="" name="product_status" id="product_status">
                                        <option value="<?php echo ucwords($product['status']);?>"><?php echo ucwords($product['status']);?></option>
                                        <option value="In Stock">In Stock</option>
                                        <option value="Out of Stock">Out of Stock</option>
                                    </select>
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
                                    <select class="js-example-tokenizer form-control form-control-md input-md select2-hidden-accessible" name="product_size[]" id="product_size" required="" multiple="multiple">
                                        <option value="">Select Product Size</option>
                                        <option value="1">1</option>
                                        <option value="2">2</option>
                                        <option value="3">3</option>
                                        <option value="4">4</option>
                                        <option value="5">5</option>
                                        <option value="6">6</option>
                                        <option value="7">7</option>
                                        <option value="8">8</option>
                                        <option value="9">9</option>
                                        <option value="10">10</option>
                                        <option value="11">11</option>
                                        <option value="12">12</option>
                                        <option value="13">13</option>
                                        <option value="14">14</option>
                                        <option value="15">15</option>
                                    </select>
                                </div>
                                
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <input type="hidden" name="pr_id"  id="pr_id" value="<?php echo $product['product_id'];?>">
        <input type="submit" name="submit" id="submit" class="btn btn-info" value="Update" />
    </form>   
</div>
<script>
$(document).ready(function () {  
    $('#product_info').on('submit', function(event){
        event.preventDefault();
            $('#submit').attr("disabled","disabled");
            $.ajax({
                url:"assets/php/product_update_process.php",
                method:"POST",
                data: new FormData(this),
                contentType:false,
                cache:false,
                processData:false,
                beforeSend:function(){
                $('#submit').val('Submitting...');
                },
                success:function(data){
                    if(data == 1)
                    {
                        $(".alert-success_message").html('<div class="alert alert-success alert-dismissible mt-2"><button type="button" class="close" data-dismiss="alert">x</button> <strong>Product is Updated!</strong></div>');
                        $('#submit').removeAttr("disabled","disabled");
                    }
                    if(data == 2){
                        $(".alert-success_message").html('<div class="alert alert-alert alert-dismissible mt-2"><button type="button" class="close" data-dismiss="alert">x</button> <strong>Something Went wrong</strong></div>');
                        $('#submit').removeAttr("disabled","disabled");
                    }
                }
            });
            setInterval(function(){
                $('#success_message').html('');
            }, 5000)
          
    });

});
</script>
