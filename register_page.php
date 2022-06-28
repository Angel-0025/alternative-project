<style>
    label{
        font-weight: 600;
    }
</style>
<!-- START SECTION BREADCRUMB -->
<div class="breadcrumb_section bg_gray page-title-mini">
    <div class="container"><!-- STRART CONTAINER -->
        <div class="row align-items-center">
        	<div class="col-md-6">
                <div class="page-title">
            		<h1>Register</h1>
                </div>
            </div>
            <div class="col-md-6">
                <ol class="breadcrumb justify-content-md-end">
                    <li class="breadcrumb-item"><a href="index.php?page=home_page">Home</a></li>
                    <li class="breadcrumb-item"><a href="#">Pages</a></li>
                    <li class="breadcrumb-item active">Register</li>
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
            <div class="col-xl-12 col-md-10">
                <div class="login_wrap">
            		<div class="padding_eight_all bg-white">
                        <div class="heading_s1">
                            <h3>Create an Account</h3>
                        </div>
                        <form method="post" id="createAcc" enctype="multipart/form-data">
                        <div class="form-row">
                                <div class="form-group col-md-6">
                                    <label for="first_name">First Name</label>
                                    <input type="text" required="" class="form-control form-control-sm" id="first_name" name="first_name" placeholder="Enter Your First Name">
                                </div>
                                <div class="form-group col-md-6">
                                    <label for="last_name">Last Name</label>
                                    <input type="text" required="" class="form-control form-control-sm" id="last_name" name="last_name" placeholder="Enter Your Last Name">
                                </div>
                            </div>
                            <div class="form-row">
                                <div class="form-group col-md-12">
                                    <label for="address">Address</label>
                                    <input type="text" required="" class="form-control form-control-sm" id="address" name="address" placeholder="Enter Your Address">
                                </div>
                            </div>
                            <div class="form-row">
                                <div class="form-group col-md-4">
                                    <label for="city">City</label>
                                    <input type="text" required="" class="form-control form-control-sm" id="city" name="city" placeholder="Enter Your City">
                                </div>
                                <div class="form-group col-md-4">
                                    <label for="province">Province</label>
                                    <input type="text" required="" class="form-control form-control-sm" id="province" name="province" placeholder="Enter Your Province">
                                </div>
                                <div class="form-group col-md-4">
                                    <label for="zip_code">Zip Code</label>
                                    <input type="number" required="" class="form-control form-control-sm" id="zcode" name="zcode" placeholder="Enter Your ZIP Code">
                                </div>
                            </div>
                            <div class="form-row">
                                <div class="form-group col-md-12">
                                    <label for="mobileNum">Mobile Number</label>
                                    <input type="number" required="" class="form-control form-control-sm" id="mobileNum" name="mobileNum" placeholder="+63">
                                </div>
                            </div>
                            <div class="form-row">
                                <div class="form-group col-md-12">
                                    <label for="email">Email</label>
                                    <input type="email" required="" class="form-control form-control-sm" id="user_email" name="user_email" placeholder="Enter Your Email">
                                </div>
                            </div>
                            <div class="form-row">
                                <div class="form-group col-md-12">
                                    <label for="password">Password</label>
                                    <input type="password" required="" class="form-control form-control-sm" id="password" name="password" placeholder="Password">
                                </div>
                            </div>
                            <div class="form-row">
                                <div class="form-group col-md-12">
                                    <label for="cpassword">Confirm Password</label>
                                    <input type="password" required="" class="form-control form-control-sm" id="cpassword" name="cpassword" placeholder="Confirm Password">
                                </div>
                            </div>
                            <div class="login_footer form-group">
                                <div class="chek-form">
                                    <div class="custome-checkbox">
                                        <input type="hidden" name="cBox" id="uncheck" value="unchecked">

                                        <input class="form-check-input" type="checkbox" name="cBox" id="cBox" value="checked">
                                        <label class="form-check-label" for="cBox"><span>I agree to terms &amp; Policy.</span></label>
                                        
                                    </div>
                                </div>
                            </div>
                            <div class="form-row justify-content-center">
                                <div class="form-group col-md-12">
                                    <button type="submit" class="btn btn-fill-out btn-block" name="register" id="register">Register</button>
                                </div>
                            </div>
                           
                        </form>
                        <div class="form-note text-center">Already have an account? <a href="index.php?page=login_page">Log in</a></div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- END LOGIN SECTION -->
<script>

    $('#createAcc').on('submit', function(event){
        event.preventDefault();
        $('#register').attr("disabled","disabled");
        $.ajax({
            url:"process_register.php",
            method:"POST",
            data: new FormData(this),
            contentType:false,
            cache:false,
            processData:false,
            beforeSend:function(){
            $('#register').val('Registering...');
            },
            success:function(response){
                if(response == 1){
                    $(".alert-message").html('<div class="alert alert-success alert-dismissible mt-2"><button type="button" class="close" data-dismiss="alert">x</button> <strong>Account is now registered</strong></div>');
                    $('#register').removeAttr("disabled","disabled");
                    $('#createAcc')[0].reset();
                    window.scrollTo(0,0);
                }
                if(response == 2){
                    $(".alert-message").html('<div class="alert alert-danger alert-dismissible mt-2"><button type="button" class="close" data-dismiss="alert">x</button> <strong>Password not match</strong></div>');
                    $('#register').removeAttr("disabled","disabled");
                    window.scrollTo(0,0);
                }
                if(response == 3){
                    $(".alert-message").html('<div class="alert alert-danger alert-dismissible mt-2"><button type="button" class="close" data-dismiss="alert">x</button> <strong>Please be sure to mark the terms & policy</strong></div>');
                    $('#register').removeAttr("disabled","disabled");
                    window.scrollTo(0,0);
                }
              
            }
        }); 
        setInterval(function(){
                $('.alert-message').html('');
            }, 9999) 
    });
    
</script>