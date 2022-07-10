<!DOCTYPE html>
<html lang="en">
<head>
  <head>
  <meta charset="utf-8" />
  <meta http-equiv="X-UA-Compatible" content="IE=edge" />
  <meta name="viewport" content="width=device-width, initial-scale=1" />
  <title>Admin Login</title>

  <?php include('../admin_panel/header.php'); ?>
  <?php
    if (isset($_SESSION['admin_id'])) {
        header("Location: ../admin_panel/index.php");
    }
    ?>
</head>

  <body class="bg-light-gray" id="body">
    <div class="container d-flex flex-column justify-content-between vh-100">
      <div class="row justify-content-center mt-5">
        <div class="col-xl-5 col-lg-6 col-md-10">
          <div class="card">
            <div class="card-header bg-primary">
              <div class="app-brand">
                <a href="/index.html">
                  <img src="assets/img/shoes (2).png" alt="">
                  <span class="brand-name">Dashboard</span>
                </a>
              </div>
            </div>
            <div class="card-body p-5">
              <div class="login-message"></div>
              <form method="post" id="adminloginAcc" enctype="multipart/form-data">
                <div class="row">
                  <div class="form-group col-md-12 mb-4">
                    <input type="email" class="form-control input-lg" name="admin_email" id="admin_email" aria-describedby="emailHelp" placeholder="Email">
                  </div>
                  <div class="form-group col-md-12 ">
                    <input type="password" class="form-control input-lg" name="admin_password" id="admin_password"  placeholder="Password">
                  </div>
                  <div class="col-md-12">
                    <button type="submit" class="btn btn-lg btn-primary btn-block mb-4" name="addminlogin" id="addminlogin">Sign In</button>
                  </div>
                </div>
              </form>
            </div>
          </div>
        </div>
      </div>
    </div>
    <script>
      $('#adminloginAcc').on('submit', function(event){
        event.preventDefault();
        $('#addminlogin').attr("disabled","disabled");
        $.ajax({
            url:"login_process.php",
            method:"POST",
            data: new FormData(this),
            contentType:false,
            cache:false,
            processData:false,
            beforeSend:function(){
            $('#addminlogin').val('logging-in...');
            },
            success:function(response){
                if(response == 1){
                    window.location.href="../admin_panel/index.php";   
                }
                if(response == 2){
                    $(".login-message").html('<div class="alert alert-danger alert-dismissible mt-2"><button type="button" class="close" data-dismiss="alert">x</button> <strong>Sorry, we counldn\'t an account with that email</strong></div>');
                    $('#addminlogin').removeAttr("disabled","disabled");
 
                }
                if(response == 3){
                    $(".login-message").html('<div class="alert alert-danger alert-dismissible mt-2"><button type="button" class="close" data-dismiss="alert">x</button> <strong>The password you entered is wrong</strong></div>');
                    $('#addminlogin').removeAttr("disabled","disabled");

                }
              
            }
        }); 
        setInterval(function(){
                $('.alert-message').html('');
            }, 9999) 
    });
    </script>
</body>
</html>