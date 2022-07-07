<?php
use Phppot\Order;

require_once __DIR__ . '/Model/Order.php';
$orderModel = new Order();
$orderResult = $orderModel->getAllOrders();
?>
<div class="content">
    <!-- Order History -->
    <div class="row">
        <div class="col-12"> 
        <!-- Order History -->
            <div class="card card-table-border-none" id="recent-orders">
                <div class="card-header justify-content-between">
                    <h2>Order Table</h2>
                    <div class="date-range-report ">
                        <span></span>
                    </div>
                </div>
                <div class="card-body pt-0 pb-5">
                    <table class="table card-table table-responsive table-responsive-large" style="width:100%">
                        <thead>
                            <tr>
                                <th>Order ID</th>
                                <th class="d-none d-md-table-cell">Amount</th>
                                <th class="d-none d-md-table-cell">Status</th>
                                <th>Receipt</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php 
                            if($orderResult != 0){
                                foreach ($orderResult as $k => $v) { ?>
                            <tr>
                                <td class="d-none d-md-table-cell"><?php echo $orderResult[$k]["ref_num"];?></td>
                                <td class="d-none d-md-table-cell"><span>&#8369; </span><?php echo number_format($orderResult[$k]["amount"], 2)?></td>
                                <td>
                                <span class="badge badge-warning"><?php echo $orderResult[$k]["order_status"];?></span>
                                </td>
                                <td class="d-none d-md-table-cell">
                                <a target="_blank" title="Generate Invoice" style="" href="./invoice.php?id=<?php echo $orderResult[$k]["id"];?>">Print Receipt</a>
                                </td>
                                <td >
                                <a class="mb-1 btn btn-primary btn-sm"  href="index.php?page=order_process&id=<?php echo $orderResult[$k]["id"];?>">Process</a>
                                <button type="button" class="mb-1 btn btn-danger btn-sm">Cancel</button>
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

