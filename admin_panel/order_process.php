<style>
    .product-thumbnail img {
	max-width: 100px;
}
</style>
<?php
// Check to make sure the id parameter is specified in the URL
if (isset($_GET['id'])) {
    $connect = new PDO("mysql:host=localhost;dbname=alternative_project", "root", "");
    // Prepare statement and execute, prevents SQL injection
    $stmt = $connect->prepare('SELECT * FROM order_table WHERE id = ?');
    $stmt->execute([$_GET['id']]);
    // Fetch the product from the database and return the result as an Array
    $order = $stmt->fetch(PDO::FETCH_ASSOC);
    // Check if the product exists (array is not empty)
    if (!$order) {
        // Simple error to display if the id for the product doesn't exists (array is empty)
        exit('Product does not exist!');
    }
} else {
    // Simple error to display if the id wasn't specified
    exit('Product does not exist!');
}
print_r($order['id']);
?>
<div class="content">
    <!-- Order History -->
    <div class="row">
        <div class="col-12"> 
        <!-- Order History -->
            <div class="card card-table-border-none" id="recent-orders">
                <div class="card-header justify-content-between">
                    <h2>Order ID Number: <?=$order['ref_num']?> </h2>
                </div>
                <div class="card-body pt-0 pb-5">
                    <table class="table card-table table-responsive table-responsive-large" style="width:100%">
                        <thead>
                            <tr>
                                <th>&nbsp;</th>
                                <th class="d-none d-md-table-cell">Product</th>
                                <th class="d-none d-md-table-cell">Quantity</th>
                                <th class="d-none d-md-table-cell">Size</th>
                                <th class="d-none d-md-table-cell">Price</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                                $connect = new PDO("mysql:host=localhost;dbname=alternative_project", "root", "");
                                $stmt = $connect->prepare('SELECT * FROM order_table_item where order_id = ?');
                                $stmt->execute([$_GET['id']]);
                                while ($orderItem= $stmt->fetch(PDO::FETCH_ASSOC)) {
                            ?>
                            <tr>
                                <?php
                                    $pr = $connect->prepare('SELECT * FROM product WHERE product_id = ?');
                                    $pr->execute([$orderItem['product_id']]);
                                    while ($product= $pr->fetch(PDO::FETCH_ASSOC)) {
                                        $pr_img = $connect->prepare('SELECT * FROM product_image WHERE product_id = ? LIMIT 1');
                                        $pr_img->execute([$orderItem['product_id']]);
                                        while ($img= $pr_img->fetch(PDO::FETCH_ASSOC)) {
                                ?>
                                <td class="d-none d-md-table-cell product-thumbnail"><img src="data:image/jpeg;base64, <?=base64_encode( $img['images'] );?>" alt="product_small_img1" /></td>
                                <?php }?>
                                <td class="d-none d-md-table-cell"><?=$product['name']?></td>
                                <?php }?>
                                <td class="d-none d-md-table-cell"><?=$orderItem['quantity']?></td>
                                <td class="d-none d-md-table-cell"><?=$orderItem['size']?></td>
                                <td class="d-none d-md-table-cell"><span>&#8369; </span><?=number_format($orderItem['item_price'], 2)?></td>
                                <?php }?>
                            </tr>
                        </tbody>
                        <tfoot>
                            <?php
                                $connect = new PDO("mysql:host=localhost;dbname=alternative_project", "root", "");
                                $stmt = $connect->prepare('SELECT * FROM order_table where id = ?');
                                $stmt->execute([$_GET['id']]);
                                $order = $stmt->fetch(PDO::FETCH_ASSOC)
                            ?>
                            <tr>
                                <td class="d-none d-md-table-cell"></td>
                                <td class="d-none d-md-table-cell"></td>
                                <td class="d-none d-md-table-cell"></td>
                                <td class="d-none d-md-table-cell"><strong>Subtotal:</strong></td>
                                <td class="d-none d-md-table-cell" style="font-size: 1rem;"><span>&#8369; </span><?=number_format($order['amount'], 2)?></td>
                            </tr>
                        </tfoot>
                    </table>
                    <form method="post" id="updateProcess" enctype="multipart/form-data">
                        <div class="form-group row">
                            <div class="col-sm-8">
                                <label for="process_status">Process</label>
                                <select class="form-control form-control-md input-md" id="process_status" name="process_status">
                                    <option><?=$order['order_status']?></option>
                                    <option>Order Placed</option>
                                    <option>On Delivery</option>
                                    <option>Received</option>
                                </select>
                            </div>
                            <input type="hidden" id="orderID" name="orderID" class="orid" value="<?=$order['id']?>">
                            <div class="col-sm-4 mt-4 pt-3">
                                <label for="exampleFormControlSelect12"></label>
                                <a target="_blank" title="Generate Invoice" class="mb-1 btn btn-primary btn-sm" style="" href="./invoice.php?id=<?php echo $_GET['id'];?>">Print Receipt</a>
                                <button type="submit" name="update" id="update" class="mb-1 btn btn-success btn-sm" style="color: white;">Update Process</button>
                                <a type="button" href="index.php?page=order_table" class="mb-1 btn btn-danger btn-sm">Back</a>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
<script>
    
$(document).ready(function () { 
    $('#updateProcess').on('submit', function(event){
        event.preventDefault();
        $('#update').attr("disabled","disabled");
        $.ajax({
            url:"assets/php/process_update_order.php",
            method:"POST",
            data: new FormData(this),
            contentType:false,
            cache:false,
            processData:false,
            beforeSend:function(){
            $('#update').val('Updating Order...');
            },
            success:function(response){
                if(response == 1){
                    window.location.href="index.php?page=order_table";   
                }
                if(response == 2){
                    window.location.href="index.php?page=order_history";  
                }
                if(response == 3){
                    $(".alert-message").html('<div class="alert alert-danger alert-dismissible mt-2"><button type="button" class="close" data-dismiss="alert">x</button> <strong>Sorry, something went wrong</strong></div>');
                    $('#update').removeAttr("disabled","disabled");
                }
            }
        });  
    });
});
</script>