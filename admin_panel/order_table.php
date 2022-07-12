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
                </div>
                <div class="card-body pt-0 pb-5">
                    <table  class="table table-condensed table-bordered table-hover dataTable no-footer" id="orderTable" style="margin-bottom: 0px; width:100%; border-collapse: separate;">
                        <thead>
                            <tr>
                                <th scope="col" class="no-sort">#</th>
                                <th scope="col" class="no-sort">Order ID</th>
                                <th  scope="col" class="no-sort" >Amount</th>
                                <th  scope="col" class="no-sort">Status</th>
                                <th  scope="col" class="no-sort">Receipt</th>
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
                                <td scope="col" class="no-sort d-none d-md-table-cell text-dark"><?php echo $orderResult[$k]["ref_num"];?></td>
                                <td class="d-none d-md-table-cell"><span>&#8369; </span><?php echo number_format($orderResult[$k]["amount"], 2)?></td>
                                <td>
                                    <span class="badge badge-warning"><?php echo $orderResult[$k]["order_status"];?></span>
                                </td>
                                <td class="d-none d-md-table-cell">
                                    <a target="_blank" title="Generate Invoice" style="" href="./invoice.php?id=<?php echo $orderResult[$k]["id"];?>">Print Receipt</a>
                                </td>
                                <td >
                                    <a class="mb-1 btn btn-primary btn-sm"  href="index.php?page=order_process&id=<?php echo $orderResult[$k]["id"];?>">Process Order</a>
                                    <button type="button" class="mb-1 btn btn-danger btn-sm modal-cancelOrder"  data-id="<?php echo $orderResult[$k]["id"];?>" >Cancel Order</button>
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
<!--Modal For Student Account Edit-->
<div class="modal fade " id="cancel_order" tabindex="-1" role="dialog" data-backdrop="static" aria-labelledby="cancelOrder" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLongTitle">Cancel Order #<?php echo $orderResult[$k]["ref_num"];?></h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                
            </div>
            <!--Button for close and Approve-->
        </div>
    </div>
</div>
<script>
    $('#cancel_order').on('shown.bs.modal', function () {
        $('html').css('overflow','hidden');
    }).on('hidden.bs.modal', function() {
     $('html').css('overflow','auto');
    });
    $('.modal-cancelOrder').on('click',function(){
        $('.modal-body').load("order_cancel.php?id="+$(this).attr('data-id') ,function(){
            $('#cancel_order').modal({show:true});
        });
    });

    $('#orderTable').DataTable( {
    "paging":   true,
    "info":     true,
    "scrollX": true,
    "ordering": false,
    columnDefs: [
      { targets: 'no-sort', orderable: false }
    ],
  } );
</script>
