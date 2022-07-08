<?php
include 'db_connect.php';
$year = isset($_GET['year']) ? $_GET['year'] : date('Y');

$month = isset($_GET['month']) ? $_GET['month'] : date('Y-m');
?>
<div class="content">						 
  <!-- Top Statistics -->
  <div class="row">
    <div class="col-xl-3 col-sm-6">
      <div class="card card-mini mb-4">
        <div class="card-body">
          <?php
            $connect = new PDO("mysql:host=localhost;dbname=alternative_project", "root", "");
            $user = $connect->prepare("SELECT * from product_user");
            $user->execute();
            $user_count = $user->rowCount();
          ?>
          <h2 class="mb-1"><?php echo $user_count?></h2>
          <p>Registered Accounts</p>
        </div>
      </div>
    </div>
    <div class="col-xl-3 col-sm-6">
      <div class="card card-mini  mb-4">
        <div class="card-body">
          <?php
            $connect = new PDO("mysql:host=localhost;dbname=alternative_project", "root", "");
            $order_list = $connect->prepare("SELECT * from order_table");
            $order_list->execute();
            $order_count = $order_list->rowCount();
          ?>
          <h2 class="mb-1"><?php echo $order_count?></h2>
          <p>New Orders</p>
        </div>
      </div>
    </div>
    <div class="col-xl-3 col-sm-6">
      <div class="card card-mini mb-4">
        <div class="card-body">
          <?php
            $result1 = mysqli_query($con, "SELECT SUM(amount) as value_sum FROM order_archive WHERE date_format(order_at,'%Y-%m') = '$month' order by unix_timestamp(order_at)"); 
            $row4 = mysqli_fetch_assoc($result1); 
            $sum1 = $row4['value_sum'];
          ?>
          <h2 class="mb-1"><span>&#8369; <?php echo number_format($sum1, 2); ?></h2>
          <p>Monthly Total Order</p>
        </div>
      </div>
    </div>
    <div class="col-xl-3 col-sm-6">
      <div class="card card-mini mb-4">
        <div class="card-body">
          <?php
            $totalamount = mysqli_query($con, "SELECT SUM(amount) as value_sum FROM order_archive"); 
            $rowAmount = mysqli_fetch_assoc($totalamount); 
            $sum = $rowAmount['value_sum'];
          ?>
          <h2 class="mb-1"><span>&#8369; <?php echo number_format($sum, 2); ?></h2>
          <p>Total Revenue</p>
        </div>
      </div>
    </div>
  </div>
  <!-- Sales and Sales per categories -->
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
                <input type="hidden" name="getyear" id="getyear" value="<?php echo date('Y', strtotime($timestamp1));?>">
                <td style="text-align: right;" class="d-none d-md-table-cell"><span>&#8369; </span><?php echo $pay1; ?></td>
              </tr>
              <?php  }?>
            </tbody>
            <tfoot>
              <tr>
                <th >#</th>
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
   <!-- Recent orders table -->
  <div class="row">
	  <div class="col-12"> 
      <!-- Recent Order Table -->
      <div class="card card-table-border-none" id="recent-orders">
        <div class="card-header justify-content-between">
          <h2>Recent Orders</h2>
        </div>
        <div class="card-body pt-0 pb-5">
          <table  class="table table-condensed table-bordered table-hover dataTable no-footer" id="orderTable" style="margin-bottom: 0px; width:100%; border-collapse: separate;">
            <thead>
              <tr>
                <th scope="col" class="no-sort">#</th>
                <th scope="col" class="no-sort" style="text-align: left;">Reference</th>
                <th scope="col" class="no-sort" style="text-align: left;">Name</th>
                <th scope="col" class="no-sort" style="text-align: left;">Total Price</th>
                <th scope="col" class="no-sort" style="text-align: left;">Status</th>
                <th scope="col" class="no-sort" style="text-align: left;">Order Date</th>
              </tr>
            </thead>
            <tbody>
              <?php
                $i = 1;
                $connect = new PDO("mysql:host=localhost;dbname=alternative_project", "root", "");
                $order_list = $connect->prepare("SELECT * from order_table order by order_at ASC ");
                $order_list->execute();
                while($order = $order_list->fetch(PDO::FETCH_ASSOC)){
                  $orderTime = $order['order_at'];
              ?>
              <tr>
                <td scope="col" class="no-sort d-none d-md-table-cell text-dark" ><?php echo $i++; ?></td>
                <td style="text-align: left;" class="text-dark"><?php echo $order['ref_num']; ?></td>
                <td style="text-align: left;" class="d-none d-md-table-cell"><?php echo ucwords($order['customer_fname']). ' '.ucwords($order['customer_lname']);?></td>
                <td style="text-align: left;" class="d-none d-md-table-cell"><span>&#8369; </span><?php echo  number_format($order['amount'], 2); ?></td>
                <td style="text-align: left;" class="d-none d-md-table-cell"><span class="badge badge-warning"><?php echo $order['order_status']; ?></span></td>
                <td style="text-align: left;" class="d-none d-md-table-cell"><?php echo date('M d, Y', strtotime($orderTime)); ?></td>
              </tr>
              <?php }?>
            </tbody>
          </table>
        </div>
      </div>
    </div>
  </div>
  <!-- TOp products and Notifications  -->
</div>
<script>
  $('#year').change(function(){
    location.replace('index.php?page=dashboard&year='+$(this).val());
  })
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
  $('#orderTable').DataTable( {
    "paging":   true,
    "info":     false,
    "scrollX": true,
    "ordering": false,
    "pageLength": 5,
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
</script>

