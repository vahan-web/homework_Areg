(function ($) {
    "use strict";
       

    /* affix the navbar after scroll below header */
    function navStick ($) {
        if($('#nav').length){
            /* smooth scrolling for scroll to top */
            $('.scroll-top').click(function(){
                alert('asfaf');
              $('body,html').animate({scrollTop:100},1000);
            })
        };
    };

    $(window).scroll(function () {
        if ($(window).scrollTop() >= 1) {
            $(".navbar").addClass("affix");
        }else {
            $(".navbar").removeClass("affix");
        }
    });

    /* smooth scrolling for nav sections */
    $('#nav .navbar-nav li>a').click(function(){
      var link = $(this).attr('href');
	  if(jQuery(link).length){
      var posi =jQuery(link).offset().top;
     jQuery('body,html').animate({scrollTop:posi},700);
	  }
    });


    /* satisfied client */
   jQuery(document).ready(function() {
	 jQuery("#logo").owlCarousel({
		responsiveClass:true,
		autoplaySpeed: 200,
		autoPlay: true,
		navSpeed: 200,
		dragEndSpeed: 200,
		lazyLoad:true,
		nav:false,
		loop:true,
		dots:false,
		responsive:{
			0:{
				items:1
			},
			479:{
				items:2
			},
			768:{
				items:3
			}
		}
	  });
	});

    // wow activator
    function wowActivator () {
        new WOW().init();
    }

    /*=================================*/
    /* PRE LOADER  */
    /*=================================*/    
    $(window).load(function() {
        $('.loader').delay(100).fadeOut('slow');
        $('.preloader').delay(500).fadeOut('slow');
        $('body').delay(500).css({
            'overflow': 'visible'
        });
    })

    /* scroll top */
    $(".scroll-top").click(function(e){
        $("html, body").animate({ scrollTop: "0" }, 900 );
          return false;     
    });
    


    })(jQuery);


 /*=================================*/
    /* wow animations
    /*=================================*/

    var wow = new WOW(
            {
                boxClass:     'wow',      // animated element css class (default is wow)
                animateClass: 'animated', // animation css class (default is animated)
                offset:       100,          // distance to the element when triggering the animation (default is 0)
                mobile:       true,       // trigger animations on mobile devices (default is true)
                live:         true,       // act on asynchronously loaded content (default is true)
                callback:     function(box) {
                  // the callback is fired every time an animation is started
                  // the argument that is passed in is the DOM node being animated
                }
            }
        );
        wow.init();



