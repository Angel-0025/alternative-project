<?php
include 'db_connect.php';
$month = isset($_GET['month']) ? $_GET['month'] : date('Y-m');
$mothlyPrSales = isset($_GET['month1']) ? $_GET['month1'] : date('Y-m');
$year = isset($_GET['year']) ? $_GET['year'] : date('Y');
?>
<style>
    .yearpicker-container{
        width: 172px;
    }
</style>
<div class="content">
    <!-- Monthly Sales -->
    <div class="row">
        <div class="col-12"> 
        <!-- Monthly Sales -->
            <div class="card card-table-border-none" id="recent-orders">
                <div class="card-header justify-content-between">
                    <h2>Monthly Sales</h2>
                    <div class="form-group row" style="margin-bottom: 0px;">
                        <label for="" class="col-sm-3 col-form-label col-form-label-sm" style="font-size: .8rem; font-weight: 400; padding-right: 5px;margin-bottom: 0px;margin-top: 0px;">Month</label>
                        <div class="col-sm-8" style="padding-right: 0px; padding-left: 0px;">
                            <input type="month" name="month" id="month" value="<?php echo $month;?>" class="form-control form-control-sm">
                            <input type="hidden" name="getmonth" id="getmonth" value="<?php echo date('M Y', strtotime($month));?>">
                        </div>
                    </div>
                </div>
                <div class="card-body pt-0 pb-5">
                    <table  class="table table-condensed table-bordered table-hover dataTable  no-footer" id="monthlysales" style="margin-bottom: 0px; width:100%; border-collapse: separate;">
                        <thead>
                            <tr> 
                                <th scope="col" class="no-sort">#</th>
                                <th scope="col" class="no-sort" style="text-align: left;">Reference Number</th>
                                <th scope="col" class="no-sort" style="text-align: left;">Name</th>
                                <th scope="col" class="no-sort" style="text-align: left;">Date</th>
                                <th scope="col" class="no-sort" style="text-align: left;">Paid Amount</th>
                            </tr>
                        </thead>
                        <tbody>     
                            <?php 
                                $i = 1;
                                $sql = mysqli_query($con, "SELECT * FROM order_archive WHERE order_status LIKE 'Received' AND date_format(order_at,'%Y-%m') = '$month' order by unix_timestamp(order_at) asc");    
                                while ($row = mysqli_fetch_array($sql)) {
                                    $timestamp = $row['order_at'];
                                    $pay = number_format($row['amount'], 2);
                                ?>       
                            <tr>
                                <td scope="col" class="no-sort d-none d-md-table-cell text-dark" ><?php echo $i++; ?></td>
                                <td style="text-align: left;"  class="text-dark"><?php echo $row['ref_num']; ?></td>
                                <td style="text-align: left;" class="d-none d-md-table-cell"><?php echo ucwords($row['customer_fname']). ' '.ucwords($row['customer_lname']);?></td>
                                <td style="text-align: left;" class="d-none d-md-table-cell"><?php echo date('M d, Y', strtotime($timestamp));?></td>
                                <td style="text-align: right;" class="d-none d-md-table-cell"><span>&#8369; </span><?php echo $pay; ?></td>
                            </tr>
                            <?php  }?>
                        </tbody>
                        <tfoot>
                            <tr>
                                <th>#</th>
                                <th>Reference Number</th>
                                <th>Name</th>
                                <th>Date</th>
                                <?php $result = mysqli_query($con, "SELECT SUM(amount) as value_sum FROM order_archive WHERE date_format(order_at,'%Y-%m') = '$month' order by unix_timestamp(order_at)"); 
                                $row3 = mysqli_fetch_assoc($result); 
                                $sum = $row3['value_sum']; ?>
                                <th><span>Total:</span> &nbsp;<span>&#8369; <?php echo number_format($sum, 2); ?></span></th>
                            </tr>
                        </tfoot>
                    </table>   
                </div>
            </div>
        </div>
    </div>
    <!-- Product Sales -->
    <div class="row">
        <div class="col-12"> 
            <!-- Product Sales -->
            <div class="card card-table-border-none" id="recent-orders">
                <div class="card-header justify-content-between">
                    <h2>Monthly Product Sales</h2>
                    <div class="form-group row" style="margin-bottom: 0px;">
                        <label for="" class="col-sm-3 col-form-label col-form-label-sm" style="font-size: .8rem; font-weight: 400; padding-right: 5px;margin-bottom: 0px;margin-top: 0px;">Month</label>
                        <div class="col-sm-8" style="padding-right: 0px; padding-left: 0px;">
                            <input type="month" name="mothlyPrSales" id="mothlyPrSales" value="<?php echo $mothlyPrSales;?>" class="form-control form-control-sm">
                            <input type="hidden" name="mPrSales" id="mPrSales" value="<?php echo date('M Y', strtotime($mothlyPrSales));?>">
                        </div>
                    </div>
                </div>
                <div class="card-body pt-0 pb-5">
                    <table  class="table table-condensed table-bordered table-hover dataTable no-footer" id="productsales" style="margin-bottom: 0px; width:100%; border-collapse: separate;">
                        <thead>
                            <tr>
                                <th scope="col" class="no-sort">#</th>
                                <th>Reference Number</th>
                                <th>Product Name</th>
                                <th class="d-none d-md-table-cell">Quantity</th>
                                <th class="d-none d-md-table-cell">Price</th>
                                <th class="d-none d-md-table-cell">Size</th>
                                <th>Stock</th>
                                <th>Date</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php 
                                $i = 1;
                                $sql = mysqli_query($con, "SELECT * FROM order_archive WHERE order_status LIKE 'Received' AND date_format(order_at,'%Y-%m') = '$mothlyPrSales' order by unix_timestamp(order_at) asc");    
                                while ($row = mysqli_fetch_array($sql)) {
                                    $timestamp = $row['order_at'];
                                    $pay = number_format($row['amount'], 2);

                                    $connect = new PDO("mysql:host=localhost;dbname=alternative_project", "root", "");
                                    $order_item = $connect->prepare("SELECT * from order_table_item where order_id = ? ");
                                    $order_item->execute([$row['order_id']]);
                                    while($or_item = $order_item->fetch(PDO::FETCH_ASSOC)){
                            ?>  
                            <tr>
                                <td scope="col" class="no-sort d-none d-md-table-cell text-dark" ><?php echo $i++; ?></td>
                                <td ><?php echo $row['ref_num']; ?></td>
                                    <?php
                                        $connect = new PDO("mysql:host=localhost;dbname=alternative_project", "root", "");
                                        $product = $connect->prepare("SELECT * from product where product_id = ? ");
                                        $product->execute([$or_item['product_id']]);
                                        $product_info = $product->fetch(PDO::FETCH_ASSOC)
                                    ?>
                                <td >
                                    <a class="text-dark" href=""><?php echo $product_info['name']; ?></a>
                                </td>
                                <td class="d-none d-md-table-cell"><?php echo $or_item['quantity']; ?></td>
                                <td class="d-none d-md-table-cell"><span>&#8369; </span><?php echo  number_format($or_item['item_price'], 2); ?></td>
                                <td class="d-none d-md-table-cell"><?php echo $or_item['size']; ?></td>
                                <td >
                                    <span class="badge badge-success"><?php echo $row['order_status']; ?></span>
                                </td>
                                <td class="d-none d-md-table-cell"><?php echo date('M d, Y', strtotime($timestamp));?></td>
                            </tr>
                            <?php  }}?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
    <!-- Yearly Sales -->
    <div class="row">
        <div class="col-12"> 
        <!-- Yearly Sales -->
            <div class="card card-table-border-none" id="recent-orders">
                <div class="card-header justify-content-between">
                    <h2>Yearly Sales</h2>
                    <div class="form-group row" style="margin-bottom: 0px;">
                        <label for="" class="col-sm-3 col-form-label col-form-label-sm" style="font-size: .8rem; font-weight: 400; padding-right: 5px;margin-bottom: 0px;margin-top: 0px;">Month</label>
                        <div class="col-sm-8" style="padding-right: 0px; padding-left: 0px;">
                            <input type="year" name="year" id="year" value="<?php echo $year;?>" class="form-control form-control-sm">
                            <input type="hidden" name="getyear" id="getyear" value="<?php echo date('Y', strtotime($year));?>">
                        </div>
                    </div>
                </div>
                <div class="card-body pt-0 pb-5">
                    <table  class="table table-condensed table-bordered table-hover dataTable no-footer" id="yearsales" style="margin-bottom: 0px; width:100%; border-collapse: separate;">
                        <thead>
                            <tr> 
                                <th scope="col" class="no-sort">#</th>
                                <th scope="col" class="no-sort" style="text-align: left;">Reference Number</th>
                                <th scope="col" class="no-sort" style="text-align: left;">Name</th>
                                <th scope="col" class="no-sort" style="text-align: left;">Date</th>
                                <th scope="col" class="no-sort" style="text-align: left;">Paid Amount</th>
                            </tr>
                        </thead>
                        <tbody>     
                            <?php 
                                $i = 1;
                                $sql = mysqli_query($con, "SELECT * FROM order_archive WHERE order_status LIKE 'Received' AND date_format(order_at,'%Y') = '$year' order by unix_timestamp(order_at) asc");    
                                while ($row1 = mysqli_fetch_array($sql)) {
                                    $timestamp1 = $row1['order_at'];
                                    $pay1 = number_format($row1['amount'], 2);
                                ?>       
                            <tr>
                                <td scope="col" class="no-sort d-none d-md-table-cell text-dark" ><?php echo $i++; ?></td>
                                <td style="text-align: left;" class="text-dark"><?php echo $row1['ref_num']; ?></td>
                                <td style="text-align: left;" class="d-none d-md-table-cell"><?php echo ucwords($row1['customer_fname']). ' '.ucwords($row1['customer_lname']);?></td>
                                <td style="text-align: left;" class="d-none d-md-table-cell"><?php echo date('M d, Y', strtotime($timestamp1));?></td>
                                <td style="text-align: right;" class="d-none d-md-table-cell"><span>&#8369; </span><?php echo $pay1; ?></td>
                            </tr>
                            <?php  }?>
                        </tbody>
                        <tfoot>
                            <tr>
                                <th>#</th>
                                <th>Reference Number</th>
                                <th >Name</th>
                                <th  >Date</th>
                                <?php $result1 = mysqli_query($con, "SELECT SUM(amount) as value_sum FROM order_archive WHERE date_format(order_at,'%Y') = '$year' order by unix_timestamp(order_at)"); 
                                $row4 = mysqli_fetch_assoc($result1); 
                                $sum1 = $row4['value_sum']; ?>
                                <th><span>Total:</span> &nbsp;<span>&#8369; <?php echo number_format($sum1, 2); ?></span> </th>
                            </tr>
                        </tfoot>
                    </table>   
                </div>
            </div>
        </div>
    </div>
</div>
<script>    
    $('#month').change(function(){
    location.replace('index.php?page=analytics&month='+$(this).val());
    })
    $('#year').change(function(){
    location.replace('index.php?page=analytics&year='+$(this).val());
    })
    $('#mothlyPrSales').change(function(){
    location.replace('index.php?page=analytics&month1='+$(this).val());
    })
    /*----------Data Table----------*/
    
$(document).ready(function() {
    getmonth =  $('#getmonth').val();
    getyear = $('#getyear').val();
    getMPrSales = $('#mPrSales').val();

    $('#monthlysales').DataTable( {
        "paging":   true,
        "info":     false,
        "scrollX": true,
        "ordering": false,
        "pageLength": 10,
        columnDefs: [
            { targets: 'no-sort', orderable: false }
        ],
        dom: 'Bfrtip',
        buttons: [
            { extend: 'copy', footer: true, title: 'Monthly Sales |'+ getmonth +''},
            { extend: 'csv', footer: true, title: 'Monthly Sales | '+ getmonth +'' },
            { extend: 'pdf', footer: true, title: 'Monthly Sales | '+ getmonth +'' },
            { extend: 'print', footer: true, title: 'Monthly Sales | '+ getmonth +'' }
        ]
    } );
    $('#yearsales').DataTable( {
        "paging":   true,
        "info":     false,
        "scrollX": true,
        "ordering": false,
        "pageLength": 10,
        columnDefs: [
            { targets: 'no-sort', orderable: false }
        ],
        dom: 'Bfrtip',
        buttons: [
            { extend: 'copy', footer: true, title: 'Yearly Sales | '+ getyear +'' },
            { extend: 'csv', footer: true, title: 'Yearly Sales | '+ getyear +'' },
            { extend: 'pdf', footer: true, title: 'Yearly Sales | '+ getyear +'' },
            { extend: 'print', footer: true, title: 'Yearly Sales | '+ getyear +'' }
        ]
    } );

    $('#productsales').DataTable( {
        "paging":   true,
        "info":     false,
        "scrollX": true,
        "ordering": false,
        "pageLength": 10,
        columnDefs: [
            { targets: 'no-sort', orderable: false }
        ],
        dom: 'Bfrtip',
        buttons: [
            { extend: 'copy', footer: true, title: 'Monthly Product Sales | '+ getMPrSales +'' },
            { extend: 'csv', footer: true, title: 'Monthly Product Sales | '+ getMPrSales +'' },
            { extend: 'pdf', footer: true, title: 'Monthly Product Sales | '+ getMPrSales +'' },
            { extend: 'print', footer: true, title: 'Monthly Product Sales | '+ getMPrSales +'' }
        ]
    } );
  
} );

</script>
