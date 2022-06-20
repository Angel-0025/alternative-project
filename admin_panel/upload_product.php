
<style>
        .preview-images-zone {
        width: 100%;
        border: 1px solid #ddd;
        min-height: 180px;
        /* display: flex; */
        padding: 5px 5px 0px 5px;
        position: relative;
        overflow:auto;
    }
    .preview-images-zone > .preview-image:first-child {
        height: 185px;
        width: 185px;
        position: relative;
        margin-right: 5px;
    }
    .preview-images-zone > .preview-image {
        height: 90px;
        width: 90px;
        position: relative;
        margin-right: 5px;
        float: left;
        margin-bottom: 5px;
    }
    .preview-images-zone > .preview-image > .image-zone {
        width: 100%;
        height: 100%;
    }
    .preview-images-zone > .preview-image > .image-zone > img {
        width: 100%;
        height: 100%;
    }
    .preview-images-zone > .preview-image > .tools-edit-image {
        position: absolute;
        z-index: 100;
        color: #fff;
        bottom: 0;
        width: 100%;
        text-align: center;
        margin-bottom: 10px;
        display: none;
    }
    .preview-images-zone > .preview-image > .image-cancel {
        font-size: 18px;
        position: absolute;
        top: 0;
        right: 0;
        font-weight: bold;
        margin-right: 10px;
        cursor: pointer;
        display: none;
        z-index: 100;
    }
    .preview-image:hover > .image-zone {
        cursor: move;
        opacity: .5;
    }
    .preview-image:hover > .tools-edit-image,
    .preview-image:hover > .image-cancel {
        display: block;
    }
    .ui-sortable-helper {
        width: 90px !important;
        height: 90px !important;
    }

    .container {
        padding-top: 50px;
    }
</style>
<!-- New Product -->
<div class="content">
    <form method="post" id="product_info" enctype="multipart/form-data">
        <div class="row">
            <div class="col-12 pb-3">
                <h2>Add Product</h2>
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
                                    <input type="text" class="form-control form-control-md input-md" id="product_name" name="product_name" placeholder="Enter Product Name">
                                </div>
                                <div class="form-group col-md-12 mb-4">
                                    <label for="product-description">Product Description</label>
                                    <textarea class="form-control" name="product_desc" id="product_desc" cols="30" rows="5"></textarea>
                                </div>
                                <div class="form-group col-md-12 mb-4">
                                    <label for="product-description">Materials</label>
                                    <input type="text" class="form-control form-control-md input-md" name="product_materials"  id="product_materials" placeholder="Enter Product Materials">
                                </div>
                                <div class="form-group col-md-12 mb-4">
                                    <label for="product-description">Style</label>
                                    <input type="text" class="form-control form-control-md input-md" name="product_style"  id="product_style" placeholder="Enter Product Style">
                                </div>
                                <div class="form-group col-md-12 mb-4">
                                    <label for="product-description">Color Shown</label>
                                    <input type="text" class="form-control form-control-md input-md" name="product_cShown"  id="product_cShown" placeholder="Enter Color Shown">
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
                                    <select class="form-control form-control-md input-md prd_type select2-hidden-accessible" name="prt_type" id="prt_type">
                                        <option value="">Select Product Type</option>
                                        <option value="running shoes">Running Shoes</option>
                                        <option value="basketball shoes">Basketball Shoes</option>
                                    </select>
                                </div> 
                                <div class="form-group col-md-12 mb-3">
                                    <label for="product-vendor">Product User</label>
                                    <select class="form-control form-control-md prd_ppl select2-hidden-accessible" name="product_user" id="product_user">
                                        <option value="">Select Product User</option>
                                        <option value="Men">Men</option>
                                        <option value="Women">Women</option>
                                        <option value="Boy">Boy</option>
                                        <option value="Girl">Girl</option>
                                        <option value="Unisex">Unisex</option>
                                    </select>
                                </div>
                                <div class="form-group col-md-12 mb-3">
                                    <label for="product-vendor">Vendor</label>
                                    <select class="form-control form-control-md prd_vendor select2-hidden-accessible" name="product_vendor" id="product_vendor">
                                        <option value="">Select Product Type</option>
                                        <option value="adidas">Adidas</option>
                                        <option value="nike">Nike</option>
                                        <option value="reebok">Reebok</option>
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
                            <a href="javascript:void(0)" onclick="$('#image').click()">Upload Image</a>
                        </div>
                        <div class="card-body pt-4 pb-5 ">
                            <fieldset class="form-group" style="margin-bottom: 0px !important;">
                                <input type="file" name="image[]" id="image"  style="display: none;" class="form-control" multiple accept=".jpg, .png, .gif"/>
                            </fieldset>
                            <div class="preview-images-zone">
                                            
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
                                    <select class="form-control form-control-md prd_vendor select2-hidden-accessible" name="product_status" id="product_status">
                                        <option value="">Select Product Type</option>
                                        <option value="adidas">Adidas</option>
                                        <option value="nike">Nike</option>
                                        <option value="reebok">Reebok</option>
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
                                    <select class="js-example-tokenizer form-control form-control-md input-md select2-hidden-accessible" name="product_size[]" id="product_size" multiple="multiple">
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
        <input type="submit" name="submit" id="submit" class="btn btn-info" value="Submit" />
    </form>   
</div>
<script>
$(document).ready(function () {  
    $('#product_info').on('submit', function(event){
        event.preventDefault();
            $('#submit').attr("disabled","disabled");
            $.ajax({
                url:"admin_class.php",
                method:"POST",
                data: new FormData(this),
                contentType:false,
                cache:false,
                processData:false,
                beforeSend:function(){
                $('#submit').val('Submitting...');
                },
                success:function(data){
                    if(data != '')
                    {
                        $('#image').val('');
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
    
    document.getElementById('image').addEventListener('change', readImage, false);
    
    $( ".preview-images-zone" ).sortable();
    
    $(document).on('click', '.image-cancel', function() {
        let no = $(this).data('no');
        $(".preview-image.preview-show-"+no).remove();
    });
});
var num = 4;
function readImage() {
    if (window.File && window.FileList && window.FileReader) {
        var files = event.target.files; //FileList object
        var output = $(".preview-images-zone");

        for (let i = 0; i < files.length; i++) {
            var file = files[i];
            if (!file.type.match('image')) continue;
            
            var picReader = new FileReader();
            
            picReader.addEventListener('load', function (event) {
                var picFile = event.target;
                var html =  '<div class="preview-image preview-show-' + num + '">' +
                            '<div class="image-cancel" data-no="' + num + '">x</div>' +
                            '<div class="image-zone"><img id="pro-img-' + num + '" src="' + picFile.result + '"></div>' +
                            '<a href="javascript:void(0)" data-no="' + num +
                            '</div>';

                output.append(html);
                num = num + 1;
            });

            picReader.readAsDataURL(file);
        }
    } else {
        console.log('Browser not support');
    }
}

</script>
