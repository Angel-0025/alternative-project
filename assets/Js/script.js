(function($) {
	'use strict';
/*===================================*
01. LOADING JS
/*===================================*/
$(window).on('load', function() {
	setTimeout(function () {
		$(".preloader").delay(700).fadeOut(700).addClass('loaded');
	}, 800);
});

//Main navigation scroll spy for shadow
$(window).on('scroll', function() {
	var scroll = $(window).scrollTop();
	  if (scroll >= 150) {
	    $('header.fixed-top').addClass('nav-fixed');
	  } else {
	    $('header.fixed-top').removeClass('nav-fixed');
	  }
  });
	//Show Hide dropdown-menu Main navigation 
	$(document).ready(function () {
		$( '.dropdown-menu a.dropdown-toggler' ).on( 'click', function () {
			//var $el = $( this );
			//var $parent = $( this ).offsetParent( ".dropdown-menu" );
			if ( !$( this ).next().hasClass( 'show' ) ) {
				$( this ).parents( '.dropdown-menu' ).first().find( '.show' ).removeClass( "show" );
			}
			var $subMenu = $( this ).next( ".dropdown-menu" );
			$subMenu.toggleClass( 'show' );
			
			$( this ).parent( "li" ).toggleClass( 'show' );
	
			$( this ).parents( 'li.nav-item.dropdown.show' ).on( 'hidden.bs.dropdown', function () {
				$( '.dropdown-menu .show' ).removeClass( "show" );
			} );
			
			return false;
		});
	});
	
	//Hide Navbar Dropdown After Click On Links
	var navBar = $(".header_wrap");
	var navbarLinks = navBar.find(".navbar-collapse ul li a.page-scroll");

    $.each( navbarLinks, function() {

      var navbarLink = $(this);

        navbarLink.on('click', function () {
          navBar.find(".navbar-collapse").collapse('hide');
		  $("header").removeClass("active");
        });

    });
	
	//Main navigation Active Class Add Remove
	$('.navbar-toggler').on('click', function() {
		$("header").toggleClass("active");
		if($('.search-overlay').hasClass('open'))
		{
			$(".search-overlay").removeClass('open');
			$(".search_trigger").removeClass('open');
		}
	});
	
	$(document).ready(function () {
		if ($('.header_wrap').hasClass("fixed-top") && !$('.header_wrap').hasClass("transparent_header") && !$('.header_wrap').hasClass("no-sticky")) {
			$(".header_wrap").before('<div class="header_sticky_bar d-none"></div>');
		}
	});
	
	$(window).on('scroll', function() {
		var scroll = $(window).scrollTop();

	    if (scroll >= 150) {
	        $('.header_sticky_bar').removeClass('d-none');
			$('header.no-sticky').removeClass('nav-fixed');
			
	    } else {
	        $('.header_sticky_bar').addClass('d-none');
	    }

	});
	
	var setHeight = function() {
		var height_header = $(".header_wrap").height();
		$('.header_sticky_bar').css({'height':height_header});
	};
	
	$(window).on('load', function() {
	  setHeight();
	});
	
	$(window).on('resize', function() {
	  setHeight();
	});
	
	$('.sidetoggle').on('click', function () {
		$(this).addClass('open');
		$('body').addClass('sidetoggle_active');
		$('.sidebar_menu').addClass('active');
		$("body").append('<div id="header-overlay" class="header-overlay"></div>');
	});
	
	$(document).on('click', '#header-overlay, .sidemenu_close',function() {
		$('.sidetoggle').removeClass('open');
		$('body').removeClass('sidetoggle_active');
		$('.sidebar_menu').removeClass('active');
		$('#header-overlay').fadeOut('3000',function(){
			$('#header-overlay').remove();
		});  
		 return false;
	});
	
	$(".categories_btn").on('click', function() {
		$('.side_navbar_toggler').attr('aria-expanded', 'false');
		$('#navbarSidetoggle').removeClass('show');
	});
	
	$(".side_navbar_toggler").on('click', function() {
		$('.categories_btn').attr('aria-expanded', 'false');
		$('#navCatContent').removeClass('show');
	});
	
	$(".pr_search_trigger").on('click', function() {
		$(this).toggleClass('show');
		$('.product_search_form').toggleClass('show');
	});
	
	var rclass = true;
	
	$("html").on('click', function () {
		if (rclass) {
			$('.categories_btn').addClass('collapsed');
			$('.categories_btn,.side_navbar_toggler').attr('aria-expanded', 'false');
			$('#navCatContent,#navbarSidetoggle').removeClass('show');
		}
		rclass = true;
	});
	
	$(".categories_btn,#navCatContent,#navbarSidetoggle .navbar-nav,.side_navbar_toggler").on('click', function() {
		rclass = false;
	});



	/*===================================*
	02. BACKGROUND IMAGE JS
	*===================================*/
	/*data image src*/
	$(".background_bg").each(function() {
		var attr = $(this).attr('data-img-src');
		if (typeof attr !== typeof undefined && attr !== false) {
			$(this).css('background-image', 'url(' + attr + ')');
		}
	});
	/*===================================*
  06. SEARCH JS
	*===================================*/
    
	$(".close-search").on("click", function() {
		$(".search_wrap,.search_overlay").removeClass('open');
		$("body").removeClass('search_open');
	});
	
	var removeClass = true;
	$(".search_wrap").after('<div class="search_overlay"></div>');
	$(".search_trigger").on('click', function () {
		$(".search_wrap,.search_overlay").toggleClass('open');
		$("body").toggleClass('search_open');
		removeClass = false;
		if($('.navbar-collapse').hasClass('show'))
		{
			$(".navbar-collapse").removeClass('show');
			$(".navbar-toggler").addClass('collapsed');
			$(".navbar-toggler").attr("aria-expanded", false);
		}
	});
	$(".search_wrap form").on('click', function() {
		removeClass = false;
	});
	$("html").on('click', function () {
		if (removeClass) {
			$("body").removeClass('open');
			$(".search_wrap,.search_overlay").removeClass('open');
			$("body").removeClass('search_open');
		}
		removeClass = true;
	});
	
$('.slick-slider').slick({
  dots: true,
  infinite: true,
  speed: 300,
  slidesToShow: 3,
  slidesToScroll: 4,
  navText: ['<i class="ion-ios-arrow-left"></i>', '<i class="ion-ios-arrow-right"></i>'],
  responsive: [
    {
      breakpoint: 1024,
      settings: {
        slidesToShow: 3,
        slidesToScroll: 3,
        infinite: true,
        dots: true
      }
    },
    {
      breakpoint: 600,
      settings: {
        slidesToShow: 2,
        slidesToScroll: 2
      }
    },
    {
      breakpoint: 480,
      settings: {
        slidesToShow: 1,
        slidesToScroll: 1
      }
    }
    // You can unslick at a given breakpoint now by adding:
    // settings: "unslick"
    // instead of a settings object
  ]
});	

$('.product_slider').owlCarousel({
    loop:true,
    margin:10,
	dots: false,
	nav: true,
    responsiveClass:true,
	lazyLoad:true,
	navText: ['<i class="ion-ios-arrow-left"></i>', '<i class="ion-ios-arrow-right"></i>'],
    responsive:{
        0:{
            items:1,
            nav:false
        },
        481:{
            items:2,
            nav:false
        },
        768:{
            items:3,
            nav:true,
            loop:true
        },
		1199:{
            items:4,
            nav:true,
            loop:true
        },
		1250:{
            items:4,
            nav:true,
            loop:true
        },
		1680:{
            items:4,
            nav:true,
            loop:true
        }
    }
})
$('.cat_slider').owlCarousel({
    loop:true,
    margin:10,
	dots: false,
	nav: true,
    responsiveClass:true,
	lazyLoad:true,
	navText: ['<i class="ion-ios-arrow-left"></i>', '<i class="ion-ios-arrow-right"></i>'],
    responsive:{
        0:{
            items:3,
            nav:false
        },
        481:{
            items:3,
            nav:false
        },
        768:{
            items:3,
            nav:true,
            loop:true
        },
		1199:{
            items:4,
            nav:true,
            loop:true
        },
		1250:{
            items:7,
            nav:true,
            loop:false
        },
		1680:{
            items:7,
            nav:true,
            loop:false
        }
    }
})
	/*===================================*
	25. Cart Page Payment option
	*===================================*/	
	$(document).ready(function () {
		$('[name="payment_option"]').on('change', function() {
			var $value = $(this).attr('value');
			$('.payment-text').slideUp();
			$('[data-method="'+$value+'"]').slideDown();
		});
	});

	//Plus minus

	$('.plus').on('click', function() {
		if ($(this).prev().val()) {
			$(this).prev().val(+$(this).prev().val() + 1);
		}
	});
	$('.minus').on('click', function() {
		if ($(this).next().val() > 1) {
			if ($(this).next().val() > 1) $(this).next().val(+$(this).next().val() - 1);
		}
	});
	
})(jQuery);