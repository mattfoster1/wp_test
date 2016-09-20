/*
	Project Name : Makeclean

	## Document Ready
		- Scrolling Navigation
		- Responsive Caret
		- Remove p empty tag for Shortcode
		- Social Share

*/

(function($) {

	"use strict"

	var uisearch = new UISearch( document.getElementById( 'sb-search' ) );

	/* ## Document Ready - Handler for .ready() called */
	$(document).ready(function($) {

		$(".post-navigation > .nav-links").addClass("container-fluid");

		/* - Scrolling Navigation */

		$('.logo-block a').on('click', function(event) {
			var anchor = $(this);

			if( anchor == 'undefined' || anchor == null || anchor.attr('href') == '#' ) { return; }
			if ( anchor.attr('href').indexOf('#') === 0 )
			{
				if( $(anchor.attr('href')).length )
				{
					$('html, body').stop().animate( { scrollTop: $(anchor.attr('href')).offset().top - 72 }, 1500, 'easeInOutExpo' );					
				}
				event.preventDefault();
			}
		});

		/* local url of page (minus any hash, but including any potential query string) */
		var url = location.href.replace(/#.*/,'');

		/* Find all anchors */
		$('#navbar').find('a[href]').each(function(i,a) {

			var $a = $(a);
			var href = $a.attr('href');

			/* check is anchor href starts with page's URI */
			if ( href.indexOf(url+'#') == 0 ) {

				/* remove URI from href */
				href = href.replace(url,'');

				/* update anchors HREF with new one */
				$a.attr('href',href);
			}
		});

		/* Add Easing Effect on Section Scroll */
		$('.navbar-nav li a[href*="#"]:not([href="#"]), .site-logo a[href*="#"]:not([href="#"])').on('click', function() {

			if ( location.pathname.replace(/^\//,'') == this.pathname.replace(/^\//,'') && location.hostname == this.hostname ) {
				var target = $(this.hash);
				target = target.length ? target : $('[name=' + this.hash.slice(1) +']');

				if (target.length) {

					$('html, body').animate( { scrollTop: target.offset().top - 83 }, 1500, 'easeInOutExpo' );
					return false;
				}
			}
		});

		/* - Responsive Caret */
		$('.ddl-switch').on('click', function() {

			var li = $(this).parent();

			if ( li.hasClass('ddl-active') || li.find('.ddl-active').length !== 0 || li.find('.dropdown-menu').is(':visible') ) {
				li.removeClass('ddl-active');
				li.children().find('.ddl-active').removeClass('ddl-active');
				li.children('.dropdown-menu').slideUp();	
			}
			else {
				li.addClass('ddl-active');
				li.children('.dropdown-menu').slideDown();
			}
		});
		
		/* - Remove p empty tag for Shortcode */
		$( 'p' ).each(function() {
			var $this = $( this );
				if( $this.html().replace(/\s|&nbsp;/g, '').length == 0) {
				$this.remove();
			}
		});

		/* - Social Share */
		if( $('.social-share').length ) {

			$('.social-share > li > a', this).bind('click', function(e) {

				e.preventDefault();
				e.stopPropagation();

				var data_action = $(this).attr('data-action');
				var data_title = $(this).attr('data-title');
				var data_url = $(this).attr('data-url');

				if( data_action == 'facebook' ) {		
					window.open('http://www.facebook.com/share.php?u='+encodeURIComponent(data_url)+'&title='+encodeURIComponent(data_title),'sharer','toolbar=0,status=0,width=580,height=325');					
				}
				else if( data_action == 'twitter' ) {
					window.open('http://twitter.com/intent/tweet?status='+encodeURIComponent(data_url)+'+'+encodeURIComponent(data_title),'sharer','toolbar=0,status=0,width=580,height=325');
				}
				else if( data_action == 'pinterest' ) {
					window.open('http://pinterest.com/pin/create/button/?url='+encodeURIComponent(data_url)+'&media=http://cdn2.wpbeginner.com/wp-content/uploads/2013/12/siteground-74x74.jpg&description='+encodeURIComponent(data_title),'sharer','toolbar=0,status=0,width=580,height=325');
				}
				else if( data_action == 'google-plus' ) {
					window.open('https://plus.google.com/share?url='+encodeURIComponent(data_url),'sharer','toolbar=0,status=0,width=580,height=325');
				}
				else if( data_action == 'linkedin' ) {
					window.open('http://www.linkedin.com/shareArticle?mini=true&url='+encodeURIComponent(data_url)+'&title='+encodeURIComponent(data_title)+'&source='+encodeURIComponent(data_url),'sharer','toolbar=0,status=0,width=580,height=325');
				}
				else if( data_action == 'digg' ) {
					window.open('http://digg.com/submit?url='+encodeURIComponent(data_url)+'&amp;title='+encodeURIComponent(data_title),'sharer','toolbar=0,status=0,width=580,height=325');
				}
				else if( data_action == 'reddit' ) {
					window.open('http://www.reddit.com/submit?url='+encodeURIComponent(data_url)+'&amp;title='+encodeURIComponent(data_title),'sharer','toolbar=0,status=0,width=580,height=325');
				}
			});
		}

		// Expand Panel
		$("#slideit").click(function() {

			$("#slidepanel").slideDown(1000);
			$("html").animate({ scrollTop: 0 }, 1000);
		});	

		// Collapse Panel
		$("#closeit").click(function() {

			$("#slidepanel").slideUp("slow");	
			$("html").animate({ scrollTop: 0 }, 1000);
		});		

		// Switch buttons from "Log In | Register" to "Close Panel" on click
		$("#toggle a").click(function () {

			$("#toggle a").toggle();
		});
	
	});

})(jQuery);