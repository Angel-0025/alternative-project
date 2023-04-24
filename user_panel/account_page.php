
<!-- START SECTION BREADCRUMB -->
<div class="breadcrumb_section bg_gray page-title-mini">
    <div class="container"><!-- STRART CONTAINER -->
        <div class="row align-items-center">
        	<div class="col-md-6">
                <div class="page-title">
            		<h1>My Account</h1>
                </div>
            </div>
            <div class="col-md-6">
                <ol class="breadcrumb justify-content-md-end">
                    <li class="breadcrumb-item"><a href="">Home</a></li>
                    <li class="breadcrumb-item"><a href="#">Pages</a></li>
                    <li class="breadcrumb-item active">My Account</li>
                </ol>
            </div>
        </div>
    </div><!-- END CONTAINER-->
</div>
<!-- END SECTION BREADCRUMB -->

<!-- START MAIN CONTENT -->
<div class="main_content">

<!-- START SECTION SHOP -->
<div class="section">
	<div class="container">
        <div class="row">
            <div class="col-lg-3 col-md-4">
                <div class="dashboard_menu">
                    <ul class="nav nav-tabs flex-column" role="tablist">
                        <li class="nav-item">
                        <a class="nav-link active" id="orders-tab" data-toggle="tab" href="#orders" role="tab" aria-controls="orders" aria-selected="false"><i class="ti-shopping-cart-full"></i>Orders</a>
                      </li>
                      <li class="nav-item">
                        <a class="nav-link " id="dashboard-tab" data-toggle="tab" href="#dashboard" role="tab" aria-controls="dashboard" aria-selected="false"><i class="ti-layout-grid2"></i>Order History</a>
                      </li>
                      <li class="nav-item">
                        <a class="nav-link" id="address-tab" data-toggle="tab" href="#address" role="tab" aria-controls="address" aria-selected="true"><i class="ti-location-pin"></i>My Address</a>
                      </li>
                      <li class="nav-item">
                        <a class="nav-link" id="account-detail-tab" data-toggle="tab" href="#account-detail" role="tab" aria-controls="account-detail" aria-selected="true"><i class="ti-id-badge"></i>Account details</a>
                      </li>
                      <li class="nav-item">
                        <a class="nav-link" href="logout.php"><i class="ti-lock"></i>Logout</a>
                      </li>
                    </ul>
                </div>
            </div>
            <div class="col-lg-9 col-md-8">
                <div class="tab-content dashboard_content">
                    <!-- Order List -->
                    <div class="tab-pane fade active show" id="orders" role="tabpanel" aria-labelledby="orders-tab">
                    	<div class="card">
                        	<div class="card-header">
                                <h3>Orders</h3>
                            </div>
                            <div class="card-body">
                    			<div class="table-responsive">
                                    <table class="table">
                                        <thead>
                                            <tr>
                                                <th>Order</th>
                                                <th>Date</th>
                                                <th>Status</th>
                                                <th>Total</th>
                                                <th>Actions</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php
                                                $connect = new PDO("mysql:host=localhost;dbname=alternative_project", "root", "");
                                                $stmt = $connect->prepare('SELECT * FROM order_table where user_id = ?');
                                                $stmt->execute([$_SESSION['userID']]);
                                                while($order = $stmt->fetch(PDO::FETCH_ASSOC)){
                                            ?>
                                            <tr>
                                                <form method="post" enctype="multipart/form-data">
                                                    <td><?=$order['ref_num']?></td>
                                                    <td><?php echo date('F d, Y', strtotime($order["order_at"]));?></td>
                                                    <td><?=$order['order_status']?></td>
                                                    <td><span>&#8369; </span><?=number_format($order['amount'], 2)?></td>
                                                    <td>
                                                        <a href="index.php?page=view_order&id=<?php echo $order["id"];?>" class="btn btn-fill-out btn-sm">View</a>
                                                        <?php
                                                            if($order['order_status'] == "Order in Process"){
                                                        ?>
                                                            <a type="button" id="<?php echo $order["id"];?>" name="<?=$order['ref_num']?>" class="btn btn-fill-out btn-sm order_cancel">Cancel Order</a>
                                                        <?php
                                                            }
                                                            else{
                                                        ?>
                                                            
                                                        <?php
                                                            }
                                                        ?>
                                                    
                                                    </td>
                                                </form>
                                            </tr>
                                                <?php }?>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                  	</div>
                    <!-- Order History -->
                  	<div class="tab-pane fade " id="dashboard" role="tabpanel" aria-labelledby="dashboard-tab">
                      <div class="card">
                        	<div class="card-header">
                                <h3>Orders History</h3>
                            </div>
                            <div class="card-body">
                    			<div class="table-responsive">
                                    <table class="table">
                                        <thead>
                                            <tr>
                                                <th>Order</th>
                                                <th>Date</th>
                                                <th>Status</th>
                                                <th>Total</th>
                                                <th>Actions</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php
                                                $connect = new PDO("mysql:host=localhost;dbname=alternative_project", "root", "");
                                                $stmt = $connect->prepare('SELECT * FROM order_archive where user_id = ?');
                                                $stmt->execute([$_SESSION['userID']]);
                                                while($order = $stmt->fetch(PDO::FETCH_ASSOC)){
                                            ?>
                                            <tr>
                                                <td><?=$order['ref_num']?></td>
                                                <td><?php echo date('F d, Y', strtotime($order["order_at"]));?></td>
                                                <td><?=$order['order_status']?></td>
                                                <td><span>&#8369; </span><?=number_format($order['amount'], 2)?></td>
                                                <td>
                                                    <a href="index.php?page=view_order_archive&id=<?php echo $order["id"];?>" class="btn btn-fill-out btn-sm">View</a>
                                                </td>
                                            </tr>
                                                <?php }?>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                  	</div>
                    <!-- Order Address -->   	
					<div class="tab-pane fade" id="address" role="tabpanel" aria-labelledby="address-tab">
                        <?php 
                            $connect = new PDO("mysql:host=localhost;dbname=alternative_project", "root", "");
                            $uAddress = $connect->prepare('SELECT * FROM product_user where user_id = ?');
                            $uAddress->execute([$_SESSION['userID']]);
                            $info = $uAddress->fetch(PDO::FETCH_ASSOC)
                        ?>
                        <div class="card">
                            <div class="update-message"></div>
                        	<div class="card-header">
                                <h3>Account Address</h3>
                            </div>
                            <div class="card-body">
                                <form method="post" id="update_address" enctype="multipart/form-data">
                                    <div class="form-row">
                                        <div class="form-group col-md-12">
                                            <label for="userAddress">Address</label>
                                            <input type="text" required="" class="form-control form-control-sm" id="userAddress" name="userAddress" placeholder="Enter Your Address" value="<?=$info['address'];?>">
                                        </div>
                                    </div>

                                    <div class="form-row">
                                        <div class="form-group col-md-4">
                                            <label for="userCity">City</label>
                                            <input type="text" required="" class="form-control form-control-sm" id="userCity" name="userCity" placeholder="Enter Your City" value="<?=$info['city'];?>">
                                        </div>
                                        <div class="form-group col-md-4">
                                            <label for="userProvince">Province</label>
                                            <input type="text" required="" class="form-control form-control-sm" id="userProvince" name="userProvince" placeholder="Enter Your Province" value="<?=$info['province'];?>">
                                        </div>
                                        <div class="form-group col-md-4">
                                            <label for="userZcode">Zip Code</label>
                                            <input type="number" required="" class="form-control form-control-sm" id="userZcode" name="userZcode" placeholder="Enter Your ZIP Code"  value="<?=$info['zip_code'];?>">
                                        </div>
                                    </div>
                                    <div class="col-md-12 ">
                                        <button type="submit" class="btn btn-fill-out float-right btn-sm" name="updateAdd" id="updateAdd" value="Submit">Update</button>
                                    </div>
                                </form>
                            </div>
                        </div>
					</div>
                    <div class="tab-pane fade" id="account-detail" role="tabpanel" aria-labelledby="account-detail-tab">
						<div class="card">
                            <div class="updateInfo-message"></div>
                        	<div class="card-header">
                                <h3>Account Details</h3>
                            </div>
                            <div class="card-body">
                                <?php 
                                    $connect = new PDO("mysql:host=localhost;dbname=alternative_project", "root", "");
                                    $uinfo = $connect->prepare('SELECT * FROM product_user where user_id = ?');
                                    $uAddress->execute([$_SESSION['userID']]);
                                    $info = $uAddress->fetch(PDO::FETCH_ASSOC)
                                ?>
                                <form method="post" id="update_info" enctype="multipart/form-data">
                                    <div class="form-row">
                                        <div class="form-group col-md-6">
                                            <label for="user_fname">First Name</label>
                                            <input type="text" required="" class="form-control form-control-sm" id="user_fname" name="user_fname" placeholder="Enter Your First Name" value="<?=$info['first_name'];?>">
                                        </div>
                                        <div class="form-group col-md-6">
                                            <label for="user_lname">Last Name</label>
                                            <input type="text" required="" class="form-control form-control-sm" id="user_lname" name="user_lname" placeholder="Enter Your Last Name" value="<?=$info['last_name'];?>">
                                        </div>
                                    </div>
                                    <div class="form-row">
                                        <div class="form-group col-md-12">
                                            <label for="usermobileNum">Mobile Number</label>
                                            <input type="number" required="" class="form-control form-control-sm" id="usermobileNum" name="usermobileNum" placeholder="+63" value="<?=$info['mobile_num'];?>">
                                        </div>
                                    </div>
                                    <div class="form-row">
                                        <div class="form-group col-md-12">
                                            <label for="email">Email</label>
                                            <input type="email" required="" class="form-control form-control-sm" id="user_email" name="user_email" placeholder="Enter Your Email" value="<?=$info['user_email'];?>">
                                        </div>
                                    </div>
                                    <div class="form-row">
                                        <div class="form-group col-md-12">
                                            <label for="new_pass">New Password</label>
                                            <input type="password"  class="form-control form-control-sm" id="new_pass" name="new_pass" placeholder="New Password">
                                        </div>
                                    </div>
                                    <div class="form-row">
                                        <div class="form-group col-md-12">
                                            <label for="cnpassword">Confirm Password</label>
                                            <input type="password"  class="form-control form-control-sm" id="cnpassword" name="cnpassword" placeholder="Confirm Password">
                                        </div>
                                    </div>
                                    <div class="col-md-12 ">
                                        <button type="submit" class="btn btn-fill-out float-right btn-sm" name="updateInfo" id="updateInfo" value="Submit">Update</button>
                                    </div>
                                </form>
                            </div>
                        </div>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>
<!-- END SECTION SHOP -->
<script>
$(document).ready(function () {  
     $(document).on('click', '.order_cancel', function(){  
        var cancel_id= $(this).attr('id');
        var cancel_ref= $(this).attr('name');
        var $ele = $(this).parent().parent();
        $.ajax({
            type: "POST",
            url: 'assets/php/cancel_order.php',
            data: {cancel_id:cancel_id, cancel_ref:cancel_ref},
            success:function(data) {
                if(data== 1){
                 $ele.fadeOut().remove();
                 load_cart_item_number();
                 load_total_cart();
                }
                if(data == 2){
                    alert("can't delete the row");
                }
          }   
       });  
    });

    $('#update_address').on('submit', function(event){
        event.preventDefault();
        $('#updateAdd').attr("disabled","disabled");
        $.ajax({
            url:"./assets/php/update_address.php",
            method:"POST",
            data: new FormData(this),
            contentType:false,
            cache:false,
            processData:false,
            beforeSend:function(){
            $('#updateAdd').val('Updating...');
            },
            success:function(response){
                if(response == 1){
                    $(".update-message").html('<div class="alert alert-success alert-dismissible mt-2"><button type="button" class="close" data-dismiss="alert">x</button> <strong>Address is Updated</strong></div>');
                    $('#updateAdd').removeAttr("disabled","disabled");
                    window.scrollTo(0,0);
                }
                if(response == 2){
                    $(".update-message").html('<div class="alert alert-danger alert-dismissible mt-2"><button type="button" class="close" data-dismiss="alert">x</button> <strong>Password not match</strong></div>');
                    $('#updateAdd').removeAttr("disabled","disabled");
                    window.scrollTo(0,0);
                }
            }
        }); 
        setInterval(function(){
                $('.update-message').html('');
            }, 9999) 
    });
    
    $('#update_info').on('submit', function(event){
        event.preventDefault();
        $('#updateInfo').attr("disabled","disabled");
        $.ajax({
            url:"./assets/php/update_info.php",
            method:"POST",
            data: new FormData(this),
            contentType:false,
            cache:false,
            processData:false,
            beforeSend:function(){
            $('#updateInfo').val('Updating...');
            },
            success:function(response){
                if(response == 1){
                    $(".updateInfo-message").html('<div class="alert alert-success alert-dismissible mt-2"><button type="button" class="close" data-dismiss="alert">x</button> <strong>Information is Updated</strong></div>');
                    $('#updateInfo').removeAttr("disabled","disabled");
                    window.scrollTo(0,0);
                }
                if(response == 2){
                    $(".updateInfo-message").html('<div class="alert alert-danger alert-dismissible mt-2"><button type="button" class="close" data-dismiss="alert">x</button> <strong>Something went wrong</strong></div>');
                    $('#updateInfo').removeAttr("disabled","disabled");
                    window.scrollTo(0,0);
                }
                if(response == 3){
                    $(".updateInfo-message").html('<div class="alert alert-danger alert-dismissible mt-2"><button type="button" class="close" data-dismiss="alert">x</button> <strong>Password not match</strong></div>');
                    $('#updateInfo').removeAttr("disabled","disabled");
                    window.scrollTo(0,0);
                }
            }
        }); 
        setInterval(function(){
                $('.updateInfo-message').html('');
            }, 9999) 
    });
});
</script>