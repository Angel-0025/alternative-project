
<!-- START SECTION BREADCRUMB -->
<div class="breadcrumb_section bg_gray page-title-mini">
    <div class="container">
        <!-- STRART CONTAINER -->
        <div class="row align-items-center">
        	<div class="col-md-6">
                <div class="page-title">
            		<h1>Reset Code</h1>
                </div>
            </div>
            <div class="col-md-6">
                <ol class="breadcrumb justify-content-md-end">
                    <li class="breadcrumb-item"><a href="index.php?page=home_page">Home</a></li>
                    <li class="breadcrumb-item"><a href="#">Pages</a></li>
                    <li class="breadcrumb-item active">Reset Code</li>
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
                           
                            <h3>Reset Code</h3>
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
                        <form method="post" id="resetCode" enctype="multipart/form-data">
                            <div class="form-group">
                                <input type="number" required="" class="form-control" name="rCode" id="rCode" placeholder="Enter Your Reset Code">
                            </div>
                            <div class="form-group">
                                <button type="submit" class="btn btn-fill-out btn-block" name="codeSubmit" id="codeSubmit">Submit</button>
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
      $('#resetCode').on('submit', function(event){
        event.preventDefault();
        $('#codeSubmit').attr("disabled","disabled");
        $.ajax({
            url:"./assets/php/resetcode_process.php",
            method:"POST",
            data: new FormData(this),
            contentType:false,
            cache:false,
            processData:false,
            beforeSend:function(){
            $('#codeSubmit').val('Submitting...');
            },
            success:function(response){
                if(response == 1){
                    window.location.href="index.php?page=change_password";   
                }
                if(response == 2){
                    $(".login-message").html('<div class="alert alert-danger alert-dismissible mt-2"><button type="button" class="close" data-dismiss="alert">x</button> <strong>The code you enter doesn\'t match</strong></div>');
                    $('#codeSubmit').removeAttr("disabled","disabled");
 
                }
                if(response == 3){
                    $(".login-message").html('<div class="alert alert-danger alert-dismissible mt-2"><button type="button" class="close" data-dismiss="alert">x</button> <strong>The password you entered is wrong</strong></div>');
                    $('#codeSubmit').removeAttr("disabled","disabled");

                }
              
            }
        }); 
        setInterval(function(){
                $('.alert-message').html('');
            }, 9999) 
    });
</script>