
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
                                    $connect = new PDO("mysql:host=localhost;dbname=alternative_project", "root", "");
                                    $stmt = $connect->prepare('SELECT * FROM cart_table');
                                    $stmt->execute();
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
                                <?php }?>
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
                    <a href="#" class="btn btn-fill-out btn-block">Place Order</a>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- END SECTION SHOP -->