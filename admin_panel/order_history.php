<?php
use Phppot\Order;

require_once __DIR__ . '/Model/Order.php';
$orderModel = new Order();
$orderResult = $orderModel->getAllOrdersArchive();
?>
<style>
a .noHover:hover {
  background-color: white!important;
}
</style>
<div class="content">
    <!-- Order History -->
    <div class="row">
        <div class="col-12"> 
        <!-- Order History -->
            <div class="card card-table-border-none" id="recent-orders">
                <div class="card-header justify-content-between">
                    <h2>Order History</h2>
                </div>
                <div class="card-body pt-0 pb-5">
                    <table  class="table table-condensed table-bordered table-hover dataTable no-footer" id="orderHistory" style="margin-bottom: 0px; width:100%; border-collapse: separate;">
                        <thead>
                            <tr>
                                <th scope="col" class="no-sort">#</th>
                                <th scope="col" class="no-sort">Order ID</th>
                                <th  scope="col" class="no-sort" >Amount</th>
                                <th  scope="col" class="no-sort">Date</th>
                                <th  scope="col" class="no-sort">Status</th>
                                <th  scope="col" class="no-sort">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php 
                                if($orderResult != 0){
                                $i = 1;
                                foreach ($orderResult as $k => $v) { ?>
                            <tr>
                                <td scope="col" class="no-sort d-none d-md-table-cell text-dark" ><?php echo $i++; ?></td>
                                <td  scope="col" class="no-sort d-none d-md-table-cell text-dark"><?php echo $orderResult[$k]["ref_num"];?></td>
                                <td class="d-none d-md-table-cell"><span>&#8369; </span><?php echo  number_format($orderResult[$k]["amount"], 2);?></td>
                                <td class="d-none d-md-table-cell"><?php echo date('d F Y', strtotime($orderResult[$k]["order_at"]));?></td>
                                <td class="d-none d-md-table-cell">
                                <span class="badge badge-warning"><?php echo $orderResult[$k]["order_status"];?></span>
                                </td>
                                <td >
                                <a target="_blank" title="Generate Invoice" class="mb-1 btn btn-success btn-sm noHover" style="color: white;" href="./invoice_archive.php?id=<?php echo $orderResult[$k]["order_id"];?>">Print Receipt</a>
                                <a class="mb-1 btn btn-primary btn-sm"  href="index.php?page=order_archive_view&id=<?php echo $orderResult[$k]["order_id"];?>">View</a>
                                </td>
                            </tr>
                            <?php }}?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
<script>
    $('#orderHistory').DataTable( {
    "paging":   true,
    "info":     true,
    "scrollX": true,
    "ordering": false,
    columnDefs: [
      { targets: 'no-sort', orderable: false }
    ],
  } );
</script>