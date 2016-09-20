(function($) {

	"use strict";

	/* Event - Window Scroll */
	$(window).scroll(function() {

		var scroll	=	$(window).scrollTop();
		var height	=	$(window).height();

		/*** set sticky menu ***/
		if( scroll >= 90 ){
			$('.menu-block').addClass("navbar-fixed-top").delay( 2000 ).fadeIn();
		}
		else if ( scroll <= height ){
			$('.menu-block').removeClass("navbar-fixed-top");
		}
		else {
			$('.menu-block').removeClass("navbar-fixed-top");
		} // set sticky menu - end		

		if ( $( this ).scrollTop() >= 50 ){
			// If page is scrolled more than 50px
			$('#back-to-top').fadeIn(200);    // Fade in the arrow
		}
		else {
			$('#back-to-top').fadeOut(200);   // Else fade out the arrow
		}

	});
	/* Event - Window Scroll /- */

	/* Event - Document Ready /- */	
	$(document).ready(function($) {

		var scroll	=	$(window).scrollTop();
		var height	=	$(window).height();

		/*** set sticky menu ***/
		if( scroll >= height -500 ) {
			$('.menu-block').addClass("navbar-fixed-top").delay( 2000 ).fadeIn();
		}
		else if ( scroll <= height ) {
			$('.menu-block').removeClass("navbar-fixed-top");
		}
		else {
			$('.menu-block').removeClass("navbar-fixed-top");
		} // set sticky menu - end

		/* Service Section */
		$("#make-clean-service").owlCarousel( {

			autoPlay: 3000, //Set AutoPlay to 3 seconds

			items : 3, //10 items above 1000px browser width
			itemsDesktop : [1000,2], //5 items between 1000px and 901px
			itemsDesktopSmall : [900,2], // 3 items betweem 900px and 601px
			itemsTablet: [700,2], //2 items between 600 and 0;
			itemsMobile : [480,1], // itemsMobile disabled - inherit from itemsTablet option 
			navigation : true,
			pagination: false
		});

		/* Team Section */
		$("#make-clean-team").owlCarousel( {

			autoPlay: 3000, //Set AutoPlay to 3 seconds

			items : 3, //10 items above 1000px browser width
			itemsDesktop : [1200,2], //2 items between 1200px and 901px
			itemsDesktopSmall : [900,2], // 3 items betweem 900px and 601px
			itemsTablet: [700,2], //2 items between 600 and 0;
			itemsMobile : [480,1], // itemsMobile disabled - inherit from itemsTablet option 
			navigation : true,
			pagination: false
		});

		/* Partners Section */
		$("#make-clean-partner").owlCarousel( {

			autoPlay: 3000, //Set AutoPlay to 3 seconds

			items : 6, //10 items above 1000px browser width
			itemsDesktop : [1200,4], //2 items between 1200px and 901px
			itemsDesktopSmall : [900,3], // 3 items betweem 900px and 601px
			itemsTablet: [700,3], //2 items between 600 and 0;
			itemsMobile : [550,2], // itemsMobile disabled - inherit from itemsTablet option
			navigation : true,
			pagination: false
		});

		/* Type 1 */
		$('.statistics-section').each(function () {

			var $this = $(this);
			var myVal = $(this).data("value");

			$this.appear(function() {

				var statistics_item_count = 0;
				var statistics_count = 0;					
				statistics_item_count = $( "[id*='statistics_1_count-']" ).length;

				for(var i=1; i<=statistics_item_count; i++) {

					statistics_count = $( "[id*='statistics_1_count-"+i+"']" ).attr( "data-statistics_percent" );
					$("[id*='statistics_1_count-"+i+"']").animateNumber({ number: statistics_count }, 2000);
				}				
			});
		});

		/* Portfolio Details Slider */
		$('#portfolio-carousel').flexslider({
			animation: "slide",
			controlNav: false,			
			animationLoop: true,
			slideshow: false,
			itemWidth: 110,
			itemMargin: 10,
			asNavFor: '#portfolio-slider',
		});

		$('#portfolio-slider').flexslider({
			animation: "fade",
			controlNav: false,
			animationLoop: false,
			slideshow: false,
			sync: '#portfolio-carousel',
			directionNav: false
		});
		
		/* Product Details Slider */
		$('#product-carousel').flexslider({
			animation: "slide",
			controlNav: false,
			animationLoop: false,
			slideshow: false,
			itemWidth: 125,
			itemMargin: 10,
			asNavFor: '#product-slider',
		});

		$('#product-slider').flexslider({
			animation: "fade",
			controlNav: false,
			animationLoop: false,
			slideshow: false,
			sync: "#product-carousel",
			directionNav: false
		});
		
		/* Lightbox for Highlights Gallery	*/
		$('.portfolio-image-block .zoom-link').magnificPopup({
			delegate: 'a:first-Child',
			type: 'image',
			tLoading: 'Loading image #%curr%...',
			mainClass: 'mfp-img-mobile',
			gallery: {
				enabled: true,
				navigateByImgClick: true,
				preload: [0,1] // Will preload 0 - before current, and 1 after the current image
			},
			image: {
				tError: '<a href="%url%">The image #%curr%</a> could not be loaded.',				
			}
		});

		if( $('.portfolio-items').length ) {

			/* Portfolio Isotope Filter */
			var $container = $('.portfolio-items');
			$container.isotope({
				filter: '*',
				animationOptions: {
					duration: 750,
					easing: 'linear',
					queue: false
				}
			});

			$('.cat-filter a').click(function() {

				$('.cat-filter .active').removeClass('active');

				$(this).addClass('active');

				var selector = $(this).attr('data-filter');
			
				$container.isotope({
					filter: selector,
					animationOptions: {
						duration: 750,
						easing: 'linear',
						queue: false
					}
				});

				return false;
			});
		}

		/* - Responsive Caret */
		$('.responsive-caret').on('click', function() {

			var li = $(this).parent();

			if ( li.hasClass('dm-active') || li.find('.dm-active').length !== 0 || li.find('.dropdown-menu').is(':visible') ) {
				li.removeClass('dm-active');
				li.children().find('.dm-active').removeClass('dm-active');
				li.children('.dropdown-menu').slideUp();	
			}
			else {
				li.addClass('dm-active');
				li.children('.dropdown-menu').slideDown();
			}
		});

	});
	/* document.ready /- */

})(jQuery);