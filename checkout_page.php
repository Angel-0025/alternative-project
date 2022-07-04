
<!-- START SECTION SHOP -->
<div class="section">
	<div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="order_review">
                    <div class="heading_s1">
                        <h4>Your Orders</h4>
                    </div>
                    <div class="table-responsive order_table">
                        <table class="table">
                            <thead>
                                <tr>
                                    <th>Product</th>
                                    <th>Total</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                if(isset($_SESSION["userID"])){
                                    $connect = new PDO("mysql:host=localhost;dbname=alternative_project", "root", "");
                                    $stmt = $connect->prepare('SELECT * FROM cart_table where user_id = ?');
                                    $stmt->execute([$_SESSION["userID"]]);
                                    while ($prid= $stmt->fetch(PDO::FETCH_ASSOC)) {
                                ?>
                                <tr>
                                    <?php
                                      $pr = $connect->prepare('SELECT * FROM product WHERE product_id = ?');
                                      $pr->execute([$prid['pr_id']]);
                                      while ($product= $pr->fetch(PDO::FETCH_ASSOC)) {
                                    ?>
                                    <td><?=$product['name']?> <?php }?><span class="product-qty">x <?=$prid['pr_quantity']?> | size:  <?=$prid['pr_size']?></span></td>
                                    <td><span>&#8369; </span><?=$prid['pr_price']?></td>
                                </tr>
                                <?php 
                                    }
                                }?>
                            </tbody>
                            <tfoot>
                                <tr>
                                    <th>SubTotal</th>
                                    <td class="product-subtotal"><span>&#8369; </span><span id="subtotal_checkout" name="subtotal_checkout">&#8369; </span></td>
                                </tr>
                                <tr>
                                    <th>Shipping</th>
                                    <td>Free Shipping</td>
                                </tr>
                                <tr>
                                    <th>Total</th>
                                    <td class="product-subtotal"><span>&#8369; </span><span id="total_checkout" name="total_checkout"></span></td>
                                </tr>
                            </tfoot>
                        </table>
                    </div>
                    <div class="payment_method">
                        <div class="heading_s1">
                            <h4>Payment</h4>
                        </div>
                        <div class="payment_option">
                            <div class="custome-radio">
                                <input class="form-check-input" required="" type="radio" name="payment_option" id="exampleRadios3" value="option3" checked="">
                                <label class="form-check-label" for="exampleRadios3">Cash on Delivery</label>
                                <p data-method="option3" class="payment-text">There are many variations of passages of Lorem Ipsum available, but the majority have suffered alteration. </p>
                            </div>  
                        </div>
                    </div>
                    <form method="post" id="placeOrder" enctype="multipart/form-data">
                        <?php
                        if (isset($_SESSION["userID"])) {
                            $connect = new PDO("mysql:host=localhost;dbname=alternative_project", "root", "");
                            // Prepare statement and execute, prevents SQL injection
                            $stmt = $connect->prepare('SELECT * FROM cart_table where user_id = ?');
                            $stmt->execute([$_SESSION["userID"]]);
                            // Fetch the product from the database and return the result as an Array
                            $product = $stmt->fetch(PDO::FETCH_ASSOC);
                            // Check if the product exists (array is not empty)
                            if (!$product) {
                                // Simple error to display if the id for the product doesn't exists (array is empty)
                                exit('Product does not exist!');
                            }
                        }
                        ?>
                        <input type="hidden" id="userID" name="userID" class="uid" value="<?=$product['user_id']?>">
                        <button type="submit" name="checkout" id="checkout" class="btn btn-fill-out btn-block">Place Order</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- END SECTION SHOP -->
<script>
$(document).ready(function () { 
    $('#placeOrder').on('submit', function(event){
        event.preventDefault();
        $('#checkout').attr("disabled","disabled");
        $.ajax({
            url:"process_checkout.php",
            method:"POST",
            data: new FormData(this),
            contentType:false,
            cache:false,
            processData:false,
            beforeSend:function(){
            $('#checkout').val('Placing Order...');
            },
            success:function(response){
                if(response == 1){
                    window.location.href="index.php?page=cOrder_page";   
                }
                if(response == 2){
                    $(".alert-message").html('<div class="alert alert-danger alert-dismissible mt-2"><button type="button" class="close" data-dismiss="alert">x</button> <strong>Sorry, something went wrong</strong></div>');
                    $('#checkout').removeAttr("disabled","disabled");
                }
                if(response == 3){
                    $(".alert-message").html('<div class="alert alert-danger alert-dismissible mt-2"><button type="button" class="close" data-dismiss="alert">x</button> <strong>Sorry, something went wrong</strong></div>');
                    $('#checkout').removeAttr("disabled","disabled");
                }
            }
        });  
    });
});
</script>