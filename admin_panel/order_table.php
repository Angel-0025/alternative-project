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
                                <th>Product Name</th>
                                <th class="d-none d-md-table-cell">Size</th>
                                <th class="d-none d-md-table-cell">Quantity</th>
                                <th class="d-none d-md-table-cell">Order Date</th>
                                <th class="d-none d-md-table-cell">Order Cost</th>
                                <th>Status</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                                $connect = new PDO("mysql:host=localhost;dbname=alternative_project", "root", "");

                                $order_list = $connect->prepare("SELECT * from order_table");
                                $order_list->execute();
                                while ($order = $order_list->fetch(PDO::FETCH_ASSOC)) {
                                    $dateTimeFromMysql = $order['order_at'];
                                    $time = strtotime($dateTimeFromMysql); 
                                    $myFormatForView = date("d M Y", $time); 
                            ?>
                            <tr>
                                <td ><?=$order['order_ref_num']?></td>
                                <td >
                                <a class="text-dark" href=""><?=$order['pr_name']?></a>
                                </td>
                                <td class="d-none d-md-table-cell"><?=$order['pr_size']?></td>
                                <td class="d-none d-md-table-cell"><?=$order['pr_qty']?></td>
                                <td class="d-none d-md-table-cell"><?=$myFormatForView?></td>
                                <td class="d-none d-md-table-cell"><span>&#8369; </span><?=$order['pr_price']?></td>
                                <td >
                                <span class="badge badge-success">Completed</span>
                                </td>
                                <td >
                                <button type="button" class="mb-1 btn btn-success btn-sm">Process</button>
                                <button type="button" class="mb-1 btn btn-danger btn-sm">Cancel</button>
                                </td>
                            </tr>
                            <?php 
                                } 
                            ?>

                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>

