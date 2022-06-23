<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Home Page</title>
</head>
<body>
    <?php include 'header.php' ?>
	<?php include 'navbar.php' ?>
    <main id="main_content" >
    <div class="alert-message"></div>
        <?php $page = isset($_GET['page']) ? $_GET['page'] : 'home_page'; ?>
        <?php include $page.'.php' ?>
    </main>
    <?php include 'footer.php' ?>
    <!-- LOADER -->
    <div class="preloader">
        <div class="lds-ellipsis">
            <span></span>
            <span></span>
            <span></span>
        </div>
    </div>
    <!--END LOADER-->
    
</body>
<script src="assets/Js/script.js"></script>
<script type="text/javascript">
$(document).ready(function () {  
    $('#addtocart').on('submit', function(event){
        event.preventDefault();
        $('#submit').attr("disabled","disabled");
        $.ajax({
            url:"addTocart.php",
            method:"POST",
            data: new FormData(this),
            contentType:false,
            cache:false,
            processData:false,
            beforeSend:function(){
            $('#submit').val('Submitting...');
            },
            success:function(response){
                $(".alert-message").html(response);
                window.scrollTo(0,0);
                load_cart_item_number();
            }
        });  
    });
    load_cart_item_number();

    function load_cart_item_number(){
        $.ajax({
            url:"admin_class.php",
            method: "get",
            data: {cart_item:"cartItem"},
            success:function(response){
                $("#cartItem").html(response);
            }
        });
    }

    
    $(document).on('click','#addwl', function(e) {
        e.preventDefault();
        var form = $(this).closest('.addTowl');
        var id = form.find(".pID").val();
        $.ajax({
            url: 'addtowishlist.php',
            type: "POST",
            data: {pID:id},
            success: function(data) {
               if(data == '1')
               {
                  $('a.add_wishlist> i.whishstate').addClass("active");
               }
               else{
                   $('a.add_wishlist> i.whishstate').removeClass("active");
               }
          }   
       });   
    }); 
});
</script>
</html>