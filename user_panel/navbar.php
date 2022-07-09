<!-- START nav -->
<header class="header_wrap fixed-top header_with_topbar">
    <div class="top-header">
        <div class="container">
        <div class="row align-items-center">
            <div class="col-md-6">
            <div class="d-flex align-items-center justify-content-center justify-content-md-start">
                <ul class="contact_detail text-center text-lg-left">
                <li><i class="ti-mobile"></i><span>123-456-7890</span></li>
                </ul>
            </div>
            </div>
            <div class="col-md-6">
            <div class="text-center text-md-right">
                <ul class="header_list">

                    <li><a class="nav-login_page" 
                        <?php
                            if(isset($_SESSION["userID"]) != ""){
                        ?>
                            href="index.php?page=account_page" 
                        <?php }
                            if((isset($_SESSION["userID"]) == "")){
                        ?>
                            href="index.php?page=login_page" 
                        <?php
                            }
                        ?>                    
                    ><i class="ti-user"></i><span>
                        <?php
                            if(isset($_SESSION["userID"]) != ""){
                                $connect = new PDO("mysql:host=localhost;dbname=alternative_project", "root", "");
                                $user_info = $connect->prepare("SELECT * from product_user WHERE user_id=?");
                                $user_info->execute([$_SESSION["userID"]]);
                                $info= $user_info->fetch(PDO::FETCH_ASSOC)
                        ?>
                           Welcome, <?=ucwords( $info['first_name']);?>
                        <?php }
                            if((isset($_SESSION["userID"]) == "")){
                        ?>
                            Login
                        <?php
                            }
                        ?>     
                    </span></a></li>
                </ul>
            </div>
            </div>
        </div>
        </div>
    </div>
    <div class="bottom_header dark_skin main_menu_uppercase">
    	<div class="container">
            <nav class="navbar navbar-expand-lg"> 
                <a class="navbar-brand" href="index.html">
                    <img class="logo_light" src="" alt="logo" />
                    <img class="logo_dark" src="" alt="logo" />
                </a>
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-expanded="false"> 
                    <span class="ion-android-menu"></span>
                </button>
                <div class="collapse navbar-collapse justify-content-end" id="navbarSupportedContent">
                    <ul class="navbar-nav">
                        <li><a class="nav-link nav_item nav-home_page" href="index.php?page=home_page">Home</a></li> 
                        <li class="dropdown">
                            <a class="dropdown-toggle nav-link nav-register_page nav-login_page" href="#" data-toggle="dropdown">Pages</a>
                            <div class="dropdown-menu">
                                <ul> 
                                    <li><a class="dropdown-item nav-link nav_item" href="contact.html">Contact Us</a></li> 
                                    <li><a class="dropdown-item nav-link nav_item nav-login_page" href="index.php?page=login_page">Login</a></li>
                                    <li><a class="dropdown-item nav-link nav_item nav-register_page" href="index.php?page=register_page">Register</a></li>
                                    <li><a class="dropdown-item nav-link nav_item nav-account_page" href="index.php?page=account_page">Account</a></li>
                                    <li><a class="dropdown-item nav-link nav_item nav-tnc_page" href="index.php?page=tnc_page">Terms and Conditions</a></li>
                                    <li><a class="dropdown-item nav-link nav_item nav-cOrder_page" href="index.php?page=cOrder_page">Order Complete</a></li>
                                </ul>
                            </div>
                        </li>
                        <li class="dropdown dropdown-mega-menu">
                            <a class="dropdown-toggle nav-link" href="#" data-toggle="dropdown">Products</a>
                            <div class="dropdown-menu">
                                <ul class="mega-menu d-lg-flex">
                                    <li class="mega-menu-col col-lg-3">
                                        <ul> 
                                            <li class="dropdown-header">Woman's</li>
                                            <li><a class="dropdown-item nav-link nav_item"  href="index.php?page=product_detail&id=20">Ultraboost DNA</a></li>
                                            <li><a class="dropdown-item nav-link nav_item" href="index.php?page=product_detail&id=21">Nike ZoomX Streakfly</a></li>
                                            <li><a class="dropdown-item nav-link nav_item" href="index.php?page=product_detail&id=22">Zig Dynamica</a></li>
                                        </ul>
                                    </li>
                                    <li class="mega-menu-col col-lg-3">
                                        <ul>
                                            <li class="dropdown-header">Men's</li>
                                            <li><a class="dropdown-item nav-link nav_item" href="index.php?page=product_detail&id=7">LeBron 19</a></li>
                                            <li><a class="dropdown-item nav-link nav_item" href="index.php?page=product_detail&id=1">D Rose Son of Chi</a></li>
                                            <li><a class="dropdown-item nav-link nav_item" href="index.php?page=product_detail&id=4">Air Jordan XXXVI Low Luka</a></li>
                                            <li><a class="dropdown-item nav-link nav_item" href="index.php?page=product_detail&id=11">Nike Air Zoom Pegasus 39</a></li>
                                            <li><a class="dropdown-item nav-link nav_item" href="index.php?page=product_detail&id=17">VZigWild Trail 6</a></li>
                                        </ul>
                                    </li>
                                    <li class="mega-menu-col col-lg-3">
                                        <ul>
                                            <li class="dropdown-header">Boy's and Girls</li>
                                            <li><a class="dropdown-item nav-link nav_item" href="index.php?page=product_detail&id=2">Harden Vol. 6 Shoes</a></li>
                                            <li><a class="dropdown-item nav-link nav_item" href="index.php?page=product_detail&id=10">Tensaur  Sport Training Lace Shoes</a></li>
                                            <li><a class="dropdown-item nav-link nav_item" href="index.php?page=product_detail&id=12">Reebok Road Supreme 2 Alt Shoes</a></li>
                                            <li><a class="dropdown-item nav-link nav_item" href="index.php?page=product_detail&id=16">Reebok XT Sprinter Slip-On Shoes</a></li>
                                            <li><a class="dropdown-item nav-link nav_item" href="index.php?page=product_detail&id=13">Run Falcon 2.0 Shoes</a></li>
                                        </ul>
                                    </li>
                                    <li class="mega-menu-col col-lg-3">
                                        <ul>
                                            <li class="dropdown-header">Shoes Type</li>
                                            <?php
                                                $typr = "running";
                                            ?>
                                            <li><a class="dropdown-item nav-link nav_item" href="index.php?page=type_search&catyp=<?=$typr?>">Running Shoes</a></li>
                                            <?php
                                                $typb = "basketball";
                                            ?>
                                            <li><a class="dropdown-item nav-link nav_item" href="index.php?page=type_search&catyp=<?=$typb?>">Basketball Shoes</a></li>
                                            <?php
                                                $trgt = "men";
                                            ?>
                                            <li><a class="dropdown-item nav-link nav_item" href="index.php?page=target_searchM&catrftm=<?=$trgt?>">Men's Shoes</a></li>
                                            <?php
                                                $trgt = "women";
                                            ?>
                                            <li><a class="dropdown-item nav-link nav_item" href="index.php?page=target_search&catrft=<?=$trgt?>">Women's Shoes</a></li>
                                            <?php
                                                $trgt = "unisex";
                                            ?>
                                            <li><a class="dropdown-item nav-link nav_item" href="index.php?page=target_search&catrft=<?=$trgt?>">Unisex Shoes</a></li>
                                        </ul>
                                    </li>
                                </ul>
                            </div>
                        </li>                        
                        <li><a class="nav-link nav_item nav-contact_page" href="index.php?page=contact_page">Contact Us</a></li> 
                    </ul>
                </div>
                <ul class="navbar-nav attr-nav align-items-center">
                    <li><a  class="nav-link search_trigger"><span class="lnr lnr-magnifier"></span></a>
                        <div class="search_wrap">
                            <span class="close-search"><i class="ion-ios-close-empty"></i></span>
                            <form method="post" id="search" enctype="multipart/form-data">
                                <input type="text" placeholder="Search" class="form-control" name="search_input" id="search_input">
                                <button type="button" class="search_icon" name="submitSearch" id="submitSearch" ><i class="ion-ios-search-strong"></i></button>
                            </form>
                        </div><div class="search_overlay"></div>
                    </li>
                    <li>
                        <a 
                            <?php
                                if(isset($_SESSION["userID"]) != ""){
                            ?>
                                    href="index.php?page=wishlist_page" 
                            <?php }
                                if((isset($_SESSION["userID"]) == "")){
                            ?>
                                    href="index.php?page=login_page" 
                            <?php
                                }
                            ?>
                                    class="nav-link wish_list nav-wishlist_page">
                                    <span class="lnr lnr-heart cart"><span class="wishlist_count" name="wishlistItem" id="wishlistItem" 
                            <?php
                                if((isset($_SESSION["userID"]) == "")){
                            ?>
                                    hidden="hidden"
                            <?php }?>></span>
                        </a>
                    </li>
                    <li>
                        <a  
                        <?php
                            if(isset($_SESSION["userID"]) != ""){
                        ?>
                            href="index.php?page=cart_page" 
                        <?php
                            }
                            if((isset($_SESSION["userID"]) == "")){
                        ?>
                          href="index.php?page=login_page" 
                        <?php
                            }
                        ?>
                        class="nav-link cart_trigger nav-cart_page">
                            <span class="lnr lnr-cart cart"><span class="cart_count" name="cartITem" id="cartItem" 
                            <?php
                                if((isset($_SESSION["userID"]) == "")){
                            ?>
                            hidden="hidden"
                            <?php }?>
                            ></span></span>
                        </a>
                    </li>
                </ul>
            </nav>
        </div>
    </div>
</header>
<!-- END nav -->
<script>
$('.nav-link').click(function(){
    console.log($(this).attr('href'))
})
$('.nav-<?php echo isset($_GET['page']) ? $_GET['page'] : '' ?>').addClass('active');

$(document).ready(function () {  
    $('#submitSearch').on('click', function() {

        var searchInput = $('#search_input').val();

        $('#submitSearch').attr("disabled","disabled");
        if(searchInput !=""){
            $.ajax({
                url: "./assets/php/search.php",
                type: "POST",
                data: {
                    searchInput: searchInput
                    },
                cache: false,
                success:function(response){
                    if(response == 1){
                        window.location = 'index.php?page=product_search';
                        $('#search')[0].reset();
                    }
                    if(response == 2){
                        $('#search')[0].reset();
                    }
                }
            });
            setInterval(function(){
                $('.update-message').html('');
            }, 9999) ; 
        }
        else
        {
            $('#search')[0].reset();
            $('#submitSearch').removeAttr("disabled","disabled");
            alert('Please fill all the field !');
        }
    });
});
</script>