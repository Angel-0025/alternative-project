<?php
 if (isset($_GET['id'])) {
    $connect = new PDO("mysql:host=localhost;dbname=alternative_project", "root", "");
    // Prepare statement and execute, prevents SQL injection
    $stmt = $connect->prepare('SELECT * FROM order_table WHERE id = ?');
    $stmt->execute([$_GET['id']]);
    // Fetch the product from the database and return the result as an Array
    $order_item = $stmt->fetch(PDO::FETCH_ASSOC);
    // Check if the product exists (array is not empty)
    if (!$order_item) {
        // Simple error to display if the id for the product doesn't exists (array is empty)
        exit('Product does not exist!');
    }
} else {
    // Simple error to display if the id wasn't specified
    exit('Product does not exist!');
}
print_r($order_item['ref_num']);
?>
<form method="post" id="update_order_status" enctype="multipart/form-data">
    <input type="hidden" name="orid" value="<?php echo $order_item['id'];?>">		
    <div class="form-group col-md-12 mb-3">
        <label for="product-vendor">Cancel Order Option: </label>
        <select class="form-control form-control-md prd_vendor" required="" name="ccl_order" id="ccl_order">
            <option value="">Select Option</option>
            <option value="Out of stock">Out of stock</option>
            <option value="Wrong pricing">Wrong pricing</option>
            <option value="Buyer shipping address is incorrect">Buyer shipping address is incorrect</option>
        </select>
    </div>
    <div class="modal-footer" style="margin-top: 20px; padding-right: 0px; padding-bottom: 0px; padding-left: 15px;"> 
        <button type="submit" name="deleteccl" id="deleteccl" class="btn btn-danger btn-sm" style="font-size:.8rem">Cancel Order</button>
        <button type="button" class="btn btn-secondary btn-sm" data-dismiss="modal" style="font-size:.8rem">Cancel</button>
    </div>
</form>
<script>
    $('#update_order_status').on('submit', function(event){
        event.preventDefault();
        $('#deleteccl').attr("disabled","disabled");
        $.ajax({
            url:"order_cancel_process.php",
            method:"POST",
            data: new FormData(this),
            contentType:false,
            cache:false,
            processData:false,
            beforeSend:function(){
            $('#deleteccl').val('Order Cancelling...');
            },
            success:function(response){
                if(response == 1){
                    window.location.href="index.php?page=order_history";   
                }
                if(response == 2){
                    $(".update-message").html('<div class="alert alert-danger alert-dismissible mt-2"><button type="button" class="close" data-dismiss="alert">x</button> <strong>Password not match</strong></div>');
                    $('#deleteccl').removeAttr("disabled","disabled");
                    window.scrollTo(0,0);
                }
            }
        }); 
    });
</script>