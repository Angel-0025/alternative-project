<!-- START SECTION BREADCRUMB -->
<div class="breadcrumb_section bg_gray page-title-mini">
    <div class="container">
        <!-- STRART CONTAINER -->
        <div class="row align-items-center">
        	<div class="col-md-6">
                <div class="page-title">
            		<h1>Forgot Password</h1>
                </div>
            </div>
            <div class="col-md-6">
                <ol class="breadcrumb justify-content-md-end">
                    <li class="breadcrumb-item"><a href="index.php?page=home_page">Home</a></li>
                    <li class="breadcrumb-item"><a href="#">Pages</a></li>
                    <li class="breadcrumb-item active">Forgot Password</li>
                </ol>
            </div>
        </div>
    </div><!-- END CONTAINER-->
</div>
<!-- END SECTION BREADCRUMB -->

<!-- START MAIN CONTENT -->
<div class="main_content">

<!-- START LOGIN SECTION -->
<div class="login_register_wrap section">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-xl-6 col-md-10">
                <div class="login_wrap">
            		<div class="padding_eight_all bg-white">
                        <div class="heading_s1">
                            <div class="login-message"></div>
                            <h3>Forgot Password</h3>
                        </div>
                        <form method="post" id="forgotPass" enctype="multipart/form-data">
                            <div class="form-group">
                                <input type="text" required="" class="form-control" name="fuser_email" id="fuser_email" placeholder="Your Email">
                            </div>
                            <div class="form-group">
                                <button type="submit" class="btn btn-fill-out btn-block" name="ctnPass" id="ctnPass">Continue</button>
                            </div>
                        </form>
                        <div class="form-note text-center">Go back to login?<a href="index.php?page=login_page"> Login now</a></div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- END LOGIN SECTION -->
<script>
      $('#forgotPass').on('submit', function(event){
        event.preventDefault();
        $('#ctnPass').attr("disabled","disabled");
        $.ajax({
            url:"assets/php/forgotPass.php",
            method:"POST",
            data: new FormData(this),
            contentType:false,
            cache:false,
            processData:false,
            beforeSend:function(){
            $('#login').val('logging-in...');
            },
            success:function(response){
                if(response == 1){
                    window.location.href="index.php?page=reset_code";   
                }
                if(response == 2){
                    $(".login-message").html('<div class="alert alert-danger alert-dismissible mt-2"><button type="button" class="close" data-dismiss="alert">x</button> <strong>Sorry, email doesn\'t exist</strong></div>');
                    $('#login').removeAttr("disabled","disabled");

                }
                if(response == 3){
                    $(".login-message").html('<div class="alert alert-danger alert-dismissible mt-2"><button type="button" class="close" data-dismiss="alert">x</button> <strong>Something went wrong</strong></div>');
                    $('#login').removeAttr("disabled","disabled");

                }
              
            }
        }); 
        setInterval(function(){
                $('.alert-message').html('');
            }, 9999) 
    });
</script>