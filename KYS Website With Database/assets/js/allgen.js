 
$(document).ready(function(){
    
	$('.slider-for').slick({
		slidesToShow: 1,
		slidesToScroll: 1,
		arrows: false,
		fade: true,
		asNavFor: '.slider-nav'
	});
	
	$('.slider-nav').slick({
		slidesToShow: 3,
		slidesToScroll: 1,
		asNavFor: '.slider-for',
		dots: false,
		centerMode: false,
		focusOnSelect: true,
		autoplay: true,
		autoplaySpeed: 2000,
		responsive: [
		  //  {
		  //    breakpoint: 1024,
		  //    settings: {
		  //      slidesToShow: 3,
		   //     slidesToScroll: 3,
		   //     infinite: true,
		   //     dots: true
		   //   }
		  //  },
			{
		      breakpoint: 1200,
		      settings: {
		        slidesToShow: 3,
		        slidesToScroll: 1,
		        infinite: true,
		        dots: true
		      }
		    },
			{
		      breakpoint: 960,
		      settings: {
		        slidesToShow: 3,
		        slidesToScroll: 1,
		        infinite: true,
		        dots: true
		      }
		    },
			{
		      breakpoint: 700,
		      settings: {
		        slidesToShow: 3,
		        slidesToScroll: 3,
		        infinite: true,
		        dots: true
		      }
		    },
			{
		      breakpoint: 370,
		      settings: {
		        slidesToShow: 1,
		        slidesToScroll: 1,
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
		    }
		]
	}); 
	 
});
 
 $(document).ready(function(){
	$('a[href^="#"]').on('click',function (e) {
	    e.preventDefault();

	    var target = this.hash;
	    var $target = $(target);

	    $('html, body').stop().animate({
	        'scrollTop': $target.offset().top
	    }, 900, 'swing', function () {
	        window.location.hash = target;
	    });
	});
});$(document).ready(function()
{
   $("#back_to_top").hide();
    $(window).scroll(function()
    {
        $("#back_to_top").fadeIn(500);
        if ($("body").scrollTop() == 0)
        {
           $("#back_to_top").fadeOut(500);
        }
    });
    $("#back_to_top").click(function()
    {
        $("html,body").animate({scrollTop: 0}, 500, function(){});
    });
});


var wow = new WOW({
    	offset:100,        // distance to the element when triggering the animation (default is 0)
    	mobile:false       // trigger animations on mobile devices (default is true)
  	});
	wow.init();
	
 $(window).load(function(){
      $('.flexslider, .flexslider500').flexslider({
        animation: "fade",
       
        start: function(){},            //Callback: function(slider) - Fires when the slider loads the first slide
		before: function(){captionMoveOut();},           //Callback: function(slider) - Fires asynchronously with each slider animation
		after: function(){captionMoveIn();},            //Callback: function(slider) - Fires after each slider animation completes
		end: function(){},              //Callback: function(slider) - Fires when the slider reaches the last slide (asynchronous)
		added: function(){},            //{NEW} Callback: function(slider) - Fires after a slide is added
		removed: function(){} 
      });
      
      $('.flex-caption').hide();
      
       $('.flex-caption').fadeIn(2000);
    });
    
    function captionMoveIn() {
		$('.flex-caption')
		.animate({top: "35%"},0)
		.fadeIn(2000)
	;};
	
	
	function captionMoveOut() {
		$('.flex-caption')
		.animate({top: "-40%"},700)
		.fadeOut("normal")
		
	;};


$(document).ready(function(){

  $(".a-wrap").hover(function(){
    $(this).find("img").fadeTo(200, 0.7);
  },function(){
    $(this).find("img").fadeTo(200, 1.0);
  });

  $(".slideshow").slick({
    infinite: true,
    slidesToShow: 1,
    slidesToScroll: 1,
    speed: 800,
    autoplay: true,
    dots: false,
    fade: true,
    cssEase: 'linear',
    arrows: true,
  });

 $('a[href*=#]').click(function() {
			if (location.pathname.replace(/^\//,'') == this.pathname.replace(/^\//,'')
					&& location.hostname == this.hostname) {
							var $target = $(this.hash);
							$target = $target.length && $target || $('[id=' + this.hash.slice(1) +']');
							if ($target.length) {
									var targetOffset = $target.offset().top;
									$('html,body').animate({scrollTop: targetOffset}, 1000);
									return false;
							}
					}
			});

    });


jQuery(document).ready(function(){
  jQuery(".staffall").hide();
  jQuery('.toggle').click(function(){
    jQuery("#staff00").show();
	jQuery("#staff00").empty().html(
	jQuery("#"+jQuery(this).data('target')).html()
	);
    //jQuery("#"+jQuery(this).data('target')).slideToggle();
	
  });
});





jQuery(document).ready(function(){

	var catTopPosition = jQuery('#oltre').offset().top;
	

	jQuery('.slider.slider-nav a').click(function(){
		// Scroll down to 'catTopPosition'
		jQuery('html, body').animate({scrollTop:catTopPosition}, 'slow');
		// This stops the anchor link from acting like a normal anchor link
		return false;
	});
	

});
$(document).ready(function() {
    
    /* Every time the window is scrolled ... */
    $(window).scroll( function(){
    
        /* Check the location of each desired element */
        $('.hideme').each( function(i){
            
            var bottom_of_object = $(this).offset().top + $(this).outerHeight();
            var bottom_of_window = $(window).scrollTop() + $(window).height();
            
            /* If the object is completely visible in the window, fade it it */
            if( bottom_of_window > bottom_of_object ){
                
                $(this).animate({'opacity':'1'},500);
                    
            }
            
        }); 
    
    });
    
});

$(document).ready(function()
{
   $("#back_to_top").hide();
    $(window).scroll(function()
    {
        $("#back_to_top").fadeIn(500);
        if ($("body").scrollTop() == 0)
        {
           $("#back_to_top").fadeOut(500);
        }
    });
    $("#back_to_top").click(function()
    {
        $("html,body").animate({scrollTop: 0}, 500, function(){});
    });
});


var wow = new WOW({
    	offset:100,        // distance to the element when triggering the animation (default is 0)
    	mobile:false       // trigger animations on mobile devices (default is true)
  	});
	wow.init();
	
	