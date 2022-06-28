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
    //Display the item inside the cart
    load_cart_item_number();
    //Add to cart function
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
    //function for counting the item in cart
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
    //Display the item inside the wishlist
    load_wishlist_list_number();
    //Add and remove wishlist function
    $(document).on('click','#addwl', function(e) {
        e.preventDefault();
        var form = $(this).closest('.addTowl');
        var id = form.find(".pID").val();
        $.ajax({
            url: 'addtowishlist.php',
            type: "POST",
            data: {pID:id},
            success:function(response) {
            load_wishlist_list_number();  
            if(response == '1')
                {                    
                    $('a.add_wishlist> i.whishstate').addClass("active");
               }
                else{
                    $('a.add_wishlist> i.whishstate').removeClass("active");   
                }
          }   
       });   
    }); 
    //function for counting the item in wishlist
    function load_wishlist_list_number(){
        $.ajax({
            url:"admin_class.php",
            method: "get",
            data: {wishlist_item:"wishlistItem"},
            success:function(response){
                $("#wishlistItem").html(response);
            }
        });
    }
    //Removing the item display in the wishlist table
    $(document).on('click', '.remove', function(){
        var del_id= $(this).attr('id');
        var $ele = $(this).parent().parent();
        $.ajax({
            type: "POST",
            url: 'del_wl.php',
            data: {del_id:del_id},
            success:function(data) {
                if(data=="YES"){
                 $ele.fadeOut().remove();
                 load_wishlist_list_number();  
                }else{
                    alert("can't delete the row")
                }
          }   
       });  
    });
    //Removing the item inside the cart
    $(document).on('click', '.cart_remove', function(){  
        var delct_id= $(this).attr('id');
        var $ele = $(this).parent().parent();
        $.ajax({
            type: "POST",
            url: 'del_itemcart.php',
            data: {delct_id:delct_id},
            success:function(data) {
                if(data=="YES"){
                 $ele.fadeOut().remove();
                 load_cart_item_number();
                 load_total_cart();
                }else{
                    alert("can't delete the row")
                }
          }   
       });  
    });
    load_total_cart();
    function load_total_cart(){
        $.ajax({
            url:"admin_class.php",
            method: "get",
            data: {carttotal:"cart_subtotal"},
            success:function(response){
                $("#cart_subtotal").html(response);
                $("#cart_total").html(response);
                $("#subtotal_checkout").html(response);
                $("#total_checkout").html(response);
            }
        });
    }

});
</script>
</html>