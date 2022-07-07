<div class="content">
    <!-- Edit information -->
    <div class="row">
        <div class="col-12"> 
        <!-- Edit information -->
            <div class="card card-table-border-none" id="recent-orders">
                <div class="card-header justify-content-between">
                    <h2>Edit Information</h2>
                </div>
                <div class="updateInfo-message"></div>
                <div class="card-body pt-0 pb-5">
                <form method="post" id="update_info" enctype="multipart/form-data">
                    <?php
                        $connect = new PDO("mysql:host=localhost;dbname=alternative_project", "root", "");
                        $admin_info = $connect->prepare("SELECT * from admin_account WHERE admin_id=?");
                        $admin_info->execute([$_SESSION["admin_id"]]);
                        $info= $admin_info->fetch(PDO::FETCH_ASSOC)
                    ?>
                    <div class="row">
                      <div class="form-group col-md-12 mb-4">
                        <input type="text" class="form-control form-control-md input-lg" id="admin_name" name="admin_name" aria-describedby="nameHelp" placeholder="Name" value="<?=$info['admin_name'];?>">
                      </div>
                      <div class="form-group col-md-12 mb-4">
                        <input type="email" class="form-control form-control-md input-lg" id="admin_email" name="admin_email"  aria-describedby="emailHelp" placeholder="Email" value="<?=$info['admin_email'];?>">
                      </div>
                      <div class="form-group col-md-12 ">
                        <input type="password" class="form-control form-control-md input-lg" id="admin_pass" name="admin_pass" placeholder="Password">
                      </div>
                      <div class="form-group col-md-12 ">
                        <input type="password" class="form-control form-control-md input-lg" id="admin_cpass" name="admin_cpass" placeholder="Confirm Password">
                      </div>
                      <div class="col-md-12 d-flex justify-content-center">
                        <button type="submit" name="updateAdminInfo" id="updateAdminInfo" class="btn btn-md btn-success btn-block mb-4 col-md-5">Save Edit</button>
                      </div>
                    </div>
                  </form>
                </div>
            </div>
        </div>
    </div>
</div>
<script>
  $('#update_info').on('submit', function(event){
    event.preventDefault();
    $('#updateAdminInfo').attr("disabled","disabled");
    $.ajax({
      url:"./assets/php/update_info.php",
      method:"POST",
      data: new FormData(this),
      contentType:false,
      cache:false,
      processData:false,
      beforeSend:function(){
      $('#updateAdminInfo').val('Updating...');
      },
      success:function(response){
        if(response == 1){
          $(".updateInfo-message").html('<div class="alert alert-success alert-dismissible mt-2"><button type="button" class="close" data-dismiss="alert">x</button> <strong>Information is Updated</strong></div>');
          $('#updateAdminInfo').removeAttr("disabled","disabled");
          $('#update_info')[0].reset();
            window.scrollTo(0,0);
        }
        if(response == 2){
          $(".updateInfo-message").html('<div class="alert alert-danger alert-dismissible mt-2"><button type="button" class="close" data-dismiss="alert">x</button> <strong>Something went wrong</strong></div>');
          $('#updateAdminInfo').removeAttr("disabled","disabled");
          window.scrollTo(0,0);
        }
        if(response == 3){
          $(".updateInfo-message").html('<div class="alert alert-danger alert-dismissible mt-2"><button type="button" class="close" data-dismiss="alert">x</button> <strong>Password not match</strong></div>');
          $('#updateAdminInfo').removeAttr("disabled","disabled");
          window.scrollTo(0,0);
        }
      }
    }); 
    setInterval(function(){
      $('.updateInfo-message').html('');
    }, 9999) 
  });
</script>