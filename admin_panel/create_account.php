<div class="content">
    <!-- Create Account -->
    <div class="row">
        <div class="col-12"> 
        <!-- Create Account -->
            <div class="card card-table-border-none" id="recent-orders">
                <div class="card-header justify-content-between">
                    <h2>Create New Account</h2>
                </div>
                <div class="register-message"></div>
                <div class="card-body pt-0 pb-5">
                  <form method="post" id="createAdminAcc" enctype="multipart/form-data">
                    <div class="row">
                      <div class="form-group col-md-12 mb-4">
                        <input type="text" class="form-control form-control-md input-lg" id="Cadmin_name" name="Cadmin_name" aria-describedby="nameHelp" placeholder="Enter Name">
                      </div>
                      <div class="form-group col-md-12 mb-4">
                        <input type="email" class="form-control form-control-md input-lg" id="Cadmin_email" name="Cadmin_email"  aria-describedby="emailHelp" placeholder="Enter Email">
                      </div>
                      <div class="form-group col-md-12 ">
                        <input type="password" class="form-control form-control-md input-lg" id="Cadmin_pass" name="Cadmin_pass"  placeholder="Enter Password">
                      </div>
                      <div class="form-group col-md-12 ">
                        <input type="password" class="form-control form-control-md input-lg"  id="Cadmin_cpass" name="Cadmin_cpass" placeholder="Confirm Password">
                      </div>
                      <div class="col-md-12 d-flex justify-content-center">
                        <button type="submit" name="create" id="create" class="btn btn-md btn-primary btn-block mb-4 col-md-5">Create Account</button>
                      </div>
                    </div>
                  </form>
                </div>
            </div>
        </div>
    </div>
</div>
<script>
    $('#createAdminAcc').on('submit', function(event){
        event.preventDefault();
        $('#create').attr("disabled","disabled");
        $.ajax({
            url:"./assets/php/create_admin_account.php",
            method:"POST",
            data: new FormData(this),
            contentType:false,
            cache:false,
            processData:false,
            beforeSend:function(){
            $('#create').val('Creating Account...');
            },
            success:function(response){
                if(response == 1){
                    $(".register-message").html('<div class="alert alert-success alert-dismissible mt-2"><button type="button" class="close" data-dismiss="alert">x</button> <strong>Account is now registered</strong></div>');
                    $('#create').removeAttr("disabled","disabled");
                    $('#createAdminAcc')[0].reset();
                    window.scrollTo(0,0);
                }
                if(response == 2){
                    $(".register-message").html('<div class="alert alert-danger alert-dismissible mt-2"><button type="button" class="close" data-dismiss="alert">x</button> <strong>Password not match</strong></div>');
                    $('#create').removeAttr("disabled","disabled");
                    window.scrollTo(0,0);
                }
            }
        }); 
        setInterval(function(){
                $('.register-message').html('');
            }, 9999) 
    });
    
</script>