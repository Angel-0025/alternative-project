<!-- New Product -->
<div class="content">
<span id="success_message"></span>
    <div class="row">
        <div class="col-12 pb-3">
            <h2>Add Product</h2>
        </div>
    </div>
    <form method="post" id="product_info">
        <!-- Title/Description and Organization -->
        <div class="row">
            <div class="col-8">
                <div class="card card-table-border-none" id="product-info">
                    <div class="card-body pt-4 pb-5">
                        <div class="row">
                            <div class="form-group col-md-12 mb-3">
                                <label for="product-title">Product Title</label>
                                <input type="text" class="form-control form-control-md input-md" id="product_name" name="product_name" placeholder="Enter Product Name">
                            </div>
                            <div class="form-group col-md-12 mb-4">
                                <label for="product-description">Product Description</label>
                                <textarea class="form-control" name="product-desc" name="product_desc"  id="product_desc" cols="30" rows="5"></textarea>
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
                                <select class="form-control form-control-md input-md" name="product_type" id="product_type">
                                    <option value="">Select Product Type</option>
                                    <option value="">Sport Shoe</option>
                                </select>
                            </div>
                            <div class="form-group col-md-12 mb-4">
                                <label for="product-vendor">Vendor</label>
                                <select class="form-control form-control-md input-md" name="product_vendor" id="product_vendor">
                                    <option value="">Select Vendor</option>
                                    <option value="">Nike</option>
                                </select>
                            </div>
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
                                    <input type="number" class="form-control form-control-md input-md" name="product_price"  id="product_price" placeholder="Enter Product Price">
                                </div>
                            </div>
                            <div class="form-group col-sm-6 mb-3">
                                <label for="product-title">Discount</label>
                                <div class="input-group-prepend">
                                    <div class="input-group-text">%</div>
                                    <input type="number" class="form-control form-control-md input-md" name="product_percentage"  id="product_percentage" placeholder="Enter Product Discount">
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
                                <input type="number" class="form-control form-control-md input-md"name="product_stocks"  id="product_stocks" placeholder="Product Stock">
                            </div>
                            <div class="form-group col-md-6 mb-3">
                                <label for="product-status">Product Status</label>
                                <select class="form-control form-control-md input-md" name="product_status" id="product_status">
                                    <option value="">Select Status</option>
                                    <option value="">New</option>
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
                                <select class="js-example-tokenizer form-control select2-hidden-accessible" name="product_size" id="product_size" multiple="multiple"></select>
                            </div>
                            <div class="form-group col-md-6 mb-3">
                                <label for="product-color">Product Color</label>
                                <select class="js-example-tokenizer form-control select2-hidden-accessible" name="product_color[]" id="product_color" multiple="multiple"></select>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <input type="submit" name="submit" id="submit" class="btn btn-info" value="Submit" />
    </form>
   
</div>
<script>
  $(document).ready(function () {

    $('#product_info').on('submit', function(event){
        var form_data = $(this).serialize();
        $('#submit').attr("disabled","disabled");
        $.ajax({
            url:"admin_class.php",
            method:"POST",
            data: form_data,
            beforeSend:function(){
            $('#submit').val('Submitting...');
            },
            success:function(data){
                if(data != '')
                {
                    $('#success_message').html(data);
                    $('#submit').attr("disabled", false);
                    $('#submit').val('Submit');
                }
            }
        });
        setInterval(function(){
            $('#success_message').html('');
        }, 5000)
    });

  });
</script>
