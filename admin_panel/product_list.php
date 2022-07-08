<style>
    .product-thumbnail img {
	max-width: 100px;
    }
</style>
<div class="content">
    <!-- Product List -->
    <div class="row">
        <div class="col-12"> 
        <!-- Product List -->
            <div class="card card-table-border-none" id="product-list">
                <div class="card-header justify-content-between">
                    <h2>Product List</h2>
                </div>
                <div class="card-body pt-0 pb-5">
                    <table  class="table table-condensed table-bordered table-hover dataTable no-footer" id="productList" style="margin-bottom: 0px; width:100%; border-collapse: separate;">
                        <thead>
                            <tr>
                                <th scope="col" class="no-sort">#</th>
                                <th>&nbsp;</th>
                                <th scope="col" class="no-sort">Product Name</th>
                                <th  scope="col" class="no-sort" >Shoe Type</th>
                                <th  scope="col" class="no-sort">Vendor</th>
                                <th  scope="col" class="no-sort">Stocks</th>
                                <th  scope="col" class="no-sort">Price</th>
                                <th  scope="col" class="no-sort">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php 
                                $connect = new PDO("mysql:host=localhost;dbname=alternative_project", "root", "");
                                $product_list = $connect->prepare("SELECT * from product");
                                $product_list->execute();
                                $i = 1;
                                while($product = $product_list->fetch(PDO::FETCH_ASSOC)){
                            ?>
                            <tr>
                                <td scope="col" class="no-sort d-none d-md-table-cell text-dark" ><?php echo $i++; ?></td>
                                <?php
                                    $pr_img = $connect->prepare('SELECT * FROM product_image WHERE product_id = ? LIMIT 1');
                                    $pr_img->execute([$product['product_id']]);
                                    $img= $pr_img->fetch(PDO::FETCH_ASSOC);
                                ?>
                                <td class="d-none d-md-table-cell product-thumbnail"><img src="data:image/jpeg;base64, <?=base64_encode( $img['images'] );?>" alt="product_small_img1" /></td>
                                <td scope="col" class="no-sort d-none d-md-table-cell text-dark" ><?php echo ucwords($product['name']);?></td>
                                <td class="d-none d-md-table-cell"><?php echo ucwords($product['type']);?></td>
                                <td class="d-none d-md-table-cell"><?php echo ucwords($product['vendor']);?></td>
                                <td class="d-none d-md-table-cell"><?php echo $product['stocks'];?></td>
                                <td class="d-none d-md-table-cell"><span>&#8369; </span><?php echo number_format($product['price'], 2); ?></td>
                                <td >
                                    <a class="mb-1 btn btn-primary btn-sm"  href="index.php?page=product_update&id=<?php echo $product['product_id']; ?>">Edit</a>
                                    <a class="mb-1 btn btn-info btn-sm"  href="index.php?page=product_view&id=<?php echo $product['product_id']; ?>">View</a>
                                </td>
                            </tr>
                            <?php  }?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
<script>
    $('#productList').DataTable( {
    "paging":   true,
    "info":     true,
    "scrollX": true,
    "ordering": false,
    columnDefs: [
      { targets: 'no-sort', orderable: false }
    ],
  } );
</script>
