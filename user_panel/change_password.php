
<!-- START SECTION BREADCRUMB -->
<div class="breadcrumb_section bg_gray page-title-mini">
    <div class="container">
        <!-- STRART CONTAINER -->
        <div class="row align-items-center">
        	<div class="col-md-6">
                <div class="page-title">
            		<h1>Change Password</h1>
                </div>
            </div>
            <div class="col-md-6">
                <ol class="breadcrumb justify-content-md-end">
                    <li class="breadcrumb-item"><a href="index.php?page=home_page">Home</a></li>
                    <li class="breadcrumb-item"><a href="#">Pages</a></li>
                    <li class="breadcrumb-item active">Change Password</li>
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
                           
                            <h3>Change Password</h3>
                            <div class="login-message"></div>
                            <?php 
                            if(isset($_SESSION['info'])){
                                ?>
                                <div class="alert alert-success text-center" style="padding: 0.4rem 0.4rem">
                                    <?php echo $_SESSION['info']; ?>
                                </div>
                                <?php
                            }
                            ?>
                        </div>
                        <form method="post" id="changepass" enctype="multipart/form-data">
                            <div class="form-group">
                                <input type="text" required="" class="form-control" name="pass" id="pass" placeholder="Enter Your New Password">
                            </div>
                            <div class="form-group">
                                <input type="text" required="" class="form-control" name="cpass" id="cpass" placeholder="Confirm Your New Password">
                            </div>
                            <div class="form-group">
                                <button type="submit" class="btn btn-fill-out btn-block" name="npassSubmit" id="npassSubmit">Submit</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- END LOGIN SECTION -->
<script>
      $('#changepass').on('submit', function(event){
        event.preventDefault();
        $('#npassSubmit').attr("disabled","disabled");
        $.ajax({
            url:"assets/php/changepass_process.php",
            method:"POST",
            data: new FormData(this),
            contentType:false,
            cache:false,
            processData:false,
            beforeSend:function(){
            $('#npassSubmit').val('Submitting...');
            },
            success:function(response){
                if(response == 1){
                    window.location.href="index.php?page=changepass_complete";   
                }
                if(response == 2){
                    $(".login-message").html('<div class="alert alert-danger alert-dismissible mt-2"><button type="button" class="close" data-dismiss="alert">x</button> <strong>The password you enter doesn\'t match</strong></div>');
                    $('#npassSubmit').removeAttr("disabled","disabled");
 
                }
                if(response == 3){
                    $(".login-message").html('<div class="alert alert-danger alert-dismissible mt-2"><button type="button" class="close" data-dismiss="alert">x</button> <strong>Something went wrong</strong></div>');
                    $('#npassSubmit').removeAttr("disabled","disabled");

                }
              
            }
        }); 
        setInterval(function(){
                $('.alert-message').html('');
            }, 9999) 
    });
</script>