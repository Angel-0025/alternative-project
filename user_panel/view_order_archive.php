<?php
// Check to make sure the id parameter is specified in the URL
if (isset($_GET['id'])) {
    $connect = new PDO("mysql:host=localhost;dbname=alternative_project", "root", "");
    // Prepare statement and execute, prevents SQL injection
    $stmt = $connect->prepare('SELECT * FROM order_archive WHERE id = ? and user_id=?');
    $stmt->execute([$_GET['id'], $_SESSION['userID']]);
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
print_r($product['user_id']);
?>
<!-- START SECTION SHOP -->
<div class="section">
	<div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="order_review">
                    <div class="heading_s1">
                        <h4>Your Orders # <?=$product['ref_num']?></h4>
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

                                    $stmt = $connect->prepare('SELECT * FROM order_table_item where order_id = ? AND user_id=?');
                                    $stmt->execute([$product['order_id'], $product['user_id']]);
                                    while ($orderID= $stmt->fetch(PDO::FETCH_ASSOC)) {
                                ?>
                                <tr>
                                    <?php
                                      $pr = $connect->prepare('SELECT * FROM product WHERE product_id = ?');
                                      $pr->execute([$orderID['product_id']]);
                                      while ($product= $pr->fetch(PDO::FETCH_ASSOC)) {
                                    ?>
                                    <td><a href="index.php?page=product_detail&id=<?php echo $product["product_id"];?>"><?=$product['name']?> </a><?php }?><span class="product-qty">x <?=$orderID['quantity']?> | size:  <?=$orderID['size']?></span></td>
                                    <td><span>&#8369; </span><?=number_format($orderID['item_price'] * $orderID['quantity'],2);?></td>
                                </tr>
                                <?php 
                                    }
                                }?>
                            </tbody>
                            <tfoot>
                                <?php
                                 $connect = new PDO("mysql:host=localhost;dbname=alternative_project", "root", "");
                                 $stmt = $connect->prepare('SELECT * FROM order_archive WHERE id = ? and user_id=?');
                                 $stmt->execute([$_GET['id'], $_SESSION['userID']]);
                                 $amount= $stmt->fetch(PDO::FETCH_ASSOC)
                                ?>
                                <tr>
                                    <th>SubTotal</th>
                                    <td class="product-subtotal"><span>&#8369; </span><?=number_format($amount["amount"], 2)?></td>
                                </tr>
                                <tr>
                                    <th>Shipping</th>
                                    <td>Free Shipping</td>
                                </tr>
                                <tr>
                                    <th>Total</th>
                                    <td class="product-subtotal"><span>&#8369; </span><?=number_format($amount["amount"], 2)?></td>
                                </tr>
                            </tfoot>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>