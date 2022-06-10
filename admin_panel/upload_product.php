<!-- New Product -->
<div class="content">
    <div class="row">
        <div class="col-12 pb-3">
            <h2>Add Product</h2>
        </div>
    </div>
    <form id="frm" method="post" class="needs-validation" novalidate="">
        <!-- Title/Description and Organization -->
        <div class="row">
            <div class="col-8">
                <div class="card card-table-border-none" id="product-info">
                    <div class="card-body pt-4 pb-5">
                        <div class="row">
                            <div class="form-group col-md-12 mb-3">
                                <label for="product-title">Product Title</label>
                                <input type="text" class="form-control form-control-md input-md" id="product-title" placeholder="Enter Product Name">
                            </div>
                            <div class="form-group col-md-12 mb-4">
                                <label for="product-description">Product Description</label>
                                <textarea class="form-control" name="product-desc" id="product-description" cols="30" rows="5"></textarea>
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
                                <select class="form-control form-control-md input-md" name="" id="product-type">
                                    <option value="">Select Product Type</option>
                                </select>
                            </div>
                            <div class="form-group col-md-12 mb-4">
                                <label for="product-vendor">Vendor</label>
                                <select class="form-control form-control-md input-md" name="" id="product-vendor">
                                    <option value="">Select Vendor</option>
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
                    <form id="frm" method="post" class="needs-validation" novalidate="">
                        <div class="row"
                            data-type="imagesloader"
                            data-errorformat="Accepted file formats"
                            data-errorsize="Maximum size accepted"
                            data-errorduplicate="File already loaded"
                            data-errormaxfiles="Maximum number of images you can upload"
                            data-errorminfiles="Minimum number of images to upload"
                            data-modifyimagetext="Modify image">
                            <!-- Progress bar -->
                            <div class="col-12 order-1 mt-2">
                                <div data-type="progress" class="progress" style="height: 25px; display:none;">
                                <div data-type="progressBar" class="progress-bar progress-bar-striped progress-bar-animated bg-success" role="progressbar" style="width: 100%;">Load in progress...</div>
                                </div>
                            </div>
                            <!-- Model -->
                            <div data-type="image-model" class="col-4 pl-2 pr-2 pt-2" style="max-width:200px; display:none;">
                                <div class="ratio-box text-center" data-type="image-ratio-box">
                                    <img data-type="noimage" class="btn btn-light ratio-img img-fluid p-2 image border dashed rounded" src="assets/plugins/imagesloader/img/photo-camera-gray.svg" style="cursor:pointer;">
                                    <div data-type="loading" class="img-loading" style="color:#218838; display:none;">
                                        <span class="fa fa-2x fa-spin fa-spinner"></span>
                                    </div>
                                    <img data-type="preview" class="btn btn-light ratio-img img-fluid p-2 image border dashed rounded" src="" style="display: none; cursor: default;">
                                    <span class="badge badge-pill badge-success p-2 w-50 main-tag" style="display:none;">Main</span>
                                </div>
                                <!-- Buttons -->
                                <div data-type="image-buttons" class="row justify-content-center mt-2">
                                    <button data-type="add" class="btn btn-outline-success" type="button"><span class="fa fa-camera mr-2"></span>Add</button>
                                    <button data-type="btn-modify" type="button" class="btn btn-outline-success m-0" data-toggle="tooltip popover" data-placement="right" style="display:none;">
                                    <span class="fa fa-pencil-alt mr-2"></span>Modify
                                    </button>
                                </div>
                            </div>
                            <!-- Popover operations -->
                            <div data-type="popover-model" style="display:none">
                                <div data-type="popover" class="ml-3 mr-3" style="min-width:150px;">
                                    <div class="row">
                                        <div class="col p-0">
                                            <button data-operation="main" class="btn btn-block btn-success btn-sm rounded-pill" type="button"><span class="fa fa-angle-double-up mr-2"></span>Main</button>
                                        </div>
                                    </div>
                                    <div class="row mt-2">
                                        <div class="col-6 p-0 pr-1">
                                            <button data-operation="left" class="btn btn-block btn-outline-success btn-sm rounded-pill" type="button"><span class="fa fa-angle-left mr-2"></span>Left</button>
                                        </div>
                                        <div class="col-6 p-0 pl-1">
                                            <button data-operation="right" class="btn btn-block btn-outline-success btn-sm rounded-pill" type="button">Right<span class="fa fa-angle-right ml-2"></span></button>
                                        </div>
                                    </div>
                                    <div class="row mt-2">
                                        <div class="col-6 p-0 pr-1">
                                            <button data-operation="rotateanticlockwise" class="btn btn-block btn-outline-success btn-sm rounded-pill" type="button"><span class="fas fa-undo-alt mr-2"></span>Rotate</button>
                                        </div>
                                        <div class="col-6 p-0 pl-1">
                                            <button data-operation="rotateclockwise" class="btn btn-block btn-outline-success btn-sm rounded-pill" type="button">Rotate<span class="fas fa-redo-alt ml-2"></span></button>
                                        </div>
                                    </div>
                                    <div class="row mt-2">
                                        <button data-operation="remove" class="btn btn-outline-danger btn-sm btn-block" type="button"><span class="fa fa-times mr-2"></span>Remove</button>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <div class="input-group">
                                    <!--Hidden file input for images-->
                                    <input id="files" type="file" name="files[]" data-button="" multiple="" accept="image/jpeg, image/png, image/gif," style="display:none;">
                                    </div>
                                </div>
                            </div>
                        </div>
                    </form>
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
                                    <input type="number" class="form-control form-control-md input-md" id="product-price" placeholder="Enter Product Price">
                                </div>
                            </div>
                            <div class="form-group col-sm-6 mb-3">
                                <label for="product-title">Discount</label>
                                <div class="input-group-prepend">
                                    <div class="input-group-text">%</div>
                                    <input type="number" class="form-control form-control-md input-md" id="product-discount" placeholder="Enter Product Discount">
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
                                <input type="number" class="form-control form-control-md input-md" id="product-stock" placeholder="Product Stock">
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </form>
</div>
<script>
  $(document).ready(function () {

  var imagesloader = $('[data-type=imagesloader]').imagesloader({
      // options here
  });

  //Form
  $frm = $('#frm');
  // Form submit
  $frm.submit(function (e) {
    var $form = $(this);
    var files = imagesloader.data('format.imagesloader').AttachmentArray;
    var il = imagesloader.data('format.imagesloader');
    if (il.CheckValidity())
      alert('Upload ' + files.length + ' files');        
    e.preventDefault();
    e.stopPropagation();
  });

  });
  var imagesloader = $('[data-type=imagesloader]').imagesloader({
      imagesToLoad: [
        {"Url":"1.jpg","Name":"Image1"},
        {"Url":"2.jpg","Name":"Image2"}
        // more images here
      ]
  });
  var imagesloader = $('[data-type=imagesloader]').imagesloader({

  // animation speed
  fadeTime: 'slow', 

  // input ID
  inputID: 'files', 

  // maximum number of files
  maxfiles: 4,

  // max image bytes
  maxSize: 5000 * 1024,

  // min image count
  minSelect: 1,

  // allowed file types
  filesType: ["image/jpeg", "image/png", "image/gif"],

  // max/min height
  maxWidth: 1280,
  maxHeight: 1024,

  // image type
  imgType: "image/jpeg",

  // image quality from 0 to 1
  imgQuality: .9,

  // error messages
  errorformat: "Accepted format",
  errorsize: "Max size allowed",
  errorduplicate: "File already uploaded",
  errormaxfiles: "Max images you can upload",
  errorminfiles: "Minimum number of images to upload",

  // text for modify image button
  modifyimagetext: "Modify image",

  // angle of each rotation
  rotation: 90

  });
</script>
