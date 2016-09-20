(function($) {

	/* Event - Document Ready */	
	$(document).ready(function($) {

		/* Disable : Page Editor */
		if( $('body.post-type-page #postdivrich').length && $('select#page_template').length ) {

			/* Sidebar Layout */
			if( $('select#page_template').val() != 'default' ) {
				$('body.post-type-page #postdivrich').slideUp(500);
			}

			$('select#page_template').live('change', function() {

				/* Sidebar Layout */
				if( $('select#page_template').val() != 'default' ) {
					$('body.post-type-page #postdivrich').slideUp(500);
				}
				else {
					$('body.post-type-page #postdivrich').slideDown(500);
					$(window).scrollTop($(window).scrollTop()+1);
				}

			});
		}

		/* Post : Formats */
		if( $('#post-formats-select').length ) {

			if( $('input[id="post-format-video"]').is(':checked') ) {
				$('#ow_cf_metabox_post_video').slideDown(500); /* Enable Video */
				// $('#ow_cf_metabox_post_quote').slideUp(500); /* Disable Quote */
				$('#ow_cf_metabox_post_gallery').slideUp(500); /* Disable Gallery */
				$('#ow_cf_metabox_post_audio').slideUp(500); /* Disable Audio */
			}
			else if( $('input[id="post-format-quote"]').is(':checked') ) {
				$('#ow_cf_metabox_post_video').slideUp(500); /* Disable Video */
				// $('#ow_cf_metabox_post_quote').slideDown(500); /* Enable Quote */
				$('#ow_cf_metabox_post_gallery').slideUp(500); /* Disable Gallery */
				$('#ow_cf_metabox_post_audio').slideUp(500); /* Disable Audio */
			}
			else if( $('input[id="post-format-gallery"]').is(':checked') ) {
				$('#ow_cf_metabox_post_video').slideUp(500); /* Disable Video */
				// $('#ow_cf_metabox_post_quote').slideUp(500); /* Disable Quote */
				$('#ow_cf_metabox_post_gallery').slideDown(500); /* Enable Gallery */
				$('#ow_cf_metabox_post_audio').slideUp(500); /* Disable Audio */
			}
			else if( $('input[id="post-format-audio"]').is(':checked') ) {
				$('#ow_cf_metabox_post_video').slideUp(500); /* Disable Video */
				// $('#ow_cf_metabox_post_quote').slideUp(500); /* Disable Quote */
				$('#ow_cf_metabox_post_gallery').slideUp(500); /* Disable Gallery */
				$('#ow_cf_metabox_post_audio').slideDown(500); /* Enable Audio */
			}
			else {
				$('#ow_cf_metabox_post_video').slideUp(500); /* Disable Video */
				// $('#ow_cf_metabox_post_quote').slideUp(500); /* Disable Quote */
				$('#ow_cf_metabox_post_gallery').slideUp(500); /* Disable Gallery */
				$('#ow_cf_metabox_post_audio').slideUp(500); /* Disable Audio */
			}

			/* On Change : Event */
			$('#post-formats-select').live('change', function() {
				if( $('input[id="post-format-video"]').is(':checked') ) {
					$('#ow_cf_metabox_post_video').slideDown(500); /* Enable Video */
					// $('#ow_cf_metabox_post_quote').slideUp(500); /* Disable Quote */
					$('#ow_cf_metabox_post_gallery').slideUp(500); /* Disable Gallery */
					$('#ow_cf_metabox_post_audio').slideUp(500); /* Disable Audio */
				}
				else if( $('input[id="post-format-quote"]').is(':checked') ) {
					$('#ow_cf_metabox_post_video').slideUp(500); /* Disable Video */
					// $('#ow_cf_metabox_post_quote').slideDown(500); /* Enable Quote */
					$('#ow_cf_metabox_post_gallery').slideUp(500); /* Disable Gallery */
					$('#ow_cf_metabox_post_audio').slideUp(500); /* Disable Audio */
				}
				else if( $('input[id="post-format-gallery"]').is(':checked') ) {
					$('#ow_cf_metabox_post_video').slideUp(500); /* Disable Video */
					// $('#ow_cf_metabox_post_quote').slideUp(500); /* Disable Quote */
					$('#ow_cf_metabox_post_gallery').slideDown(500); /* Enable Gallery */
					$('#ow_cf_metabox_post_audio').slideUp(500); /* Disable Audio */
				} 
				else if( $('input[id="post-format-audio"]').is(':checked') ) {
					$('#ow_cf_metabox_post_video').slideUp(500); /* Disable Video */
					// $('#ow_cf_metabox_post_quote').slideUp(500); /* Disable Quote */
					$('#ow_cf_metabox_post_gallery').slideUp(500); /* Disable Gallery */
					$('#ow_cf_metabox_post_audio').slideDown(500); /* Enable Audio */
				}
				else {
					$('#ow_cf_metabox_post_video').slideUp(500); /* Disable Video */
					// $('#ow_cf_metabox_post_quote').slideUp(500); /* Disable Quote */
					$('#ow_cf_metabox_post_gallery').slideUp(500); /* Disable Gallery */
					$('#ow_cf_metabox_post_audio').slideUp(500); /* Disable Audio */
				}
			});
		}

		/* Post : Video */
		if( $('#ow_cf_post_video_source').val() == 'video_link' ) {
			$('.cmb2-id-ow-cf-post-video-link').slideDown(500); /* Enable Video Link */
			$('.cmb2-id-ow-cf-post-video-embed').slideUp(500); /* Disable Embed */
			$('.cmb2-id-ow-cf-post-video-local').slideUp(500); /* Disable Video Local */
		}
		else if ( $('#ow_cf_post_video_source').val() == 'video_embed_code' ) {
			$('.cmb2-id-ow-cf-post-video-link').slideUp(500); /* Disable Video Link */
			$('.cmb2-id-ow-cf-post-video-embed').slideDown(500); /* Enable Embed */
			$('.cmb2-id-ow-cf-post-video-local').slideUp(500); /* Disable Video Local */
		}
		else if ( $('#ow_cf_post_video_source').val() == 'video_upload_local' ) {
			$('.cmb2-id-ow-cf-post-video-link').slideUp(500); /* Disable Video Link */
			$('.cmb2-id-ow-cf-post-video-embed').slideUp(500); /* Disable Embed */
			$('.cmb2-id-ow-cf-post-video-local').slideDown(500); /* Enable Video Local */
		}
		else {
			$('.cmb2-id-ow-cf-post-video-link').slideUp(500); /* Disable Video Link */
			$('.cmb2-id-ow-cf-post-video-embed').slideUp(500); /* Disable Embed */
			$('.cmb2-id-ow-cf-post-video-local').slideUp(500); /* Disable Video Local */
		}

		/* On Change : Event */
		$('#ow_cf_post_video_source').live('change', function() {

			if( $('#ow_cf_post_video_source').val() == 'video_link' ) {
				$('.cmb2-id-ow-cf-post-video-link').slideDown(500); /* Enable Video Link */
				$('.cmb2-id-ow-cf-post-video-embed').slideUp(500); /* Disable Embed */
				$('.cmb2-id-ow-cf-post-video-local').slideUp(500); /* Disable Video Local */
			}
			else if ( $('#ow_cf_post_video_source').val() == 'video_embed_code' ) {
				$('.cmb2-id-ow-cf-post-video-link').slideUp(500); /* Disable Video Link */
				$('.cmb2-id-ow-cf-post-video-embed').slideDown(500); /* Enable Embed */
				$('.cmb2-id-ow-cf-post-video-local').slideUp(500); /* Disable Video Local */
			}
			else if ( $('#ow_cf_post_video_source').val() == 'video_upload_local' ) {
				$('.cmb2-id-ow-cf-post-video-link').slideUp(500); /* Disable Video Link */
				$('.cmb2-id-ow-cf-post-video-embed').slideUp(500); /* Disable Embed */
				$('.cmb2-id-ow-cf-post-video-local').slideDown(500); /* Enable Video Local */
			}
			else {
				$('.cmb2-id-ow-cf-post-video-link').slideUp(500);
				$('.cmb2-id-ow-cf-post-video-embed').slideUp(500);
				$('.cmb2-id-ow-cf-post-video-local').slideUp(500);
			}
		});

		/* Post : Audio */
		if( $('#ow_cf_post_audio_source').val() == 'soundcloud_link' ) {
			$('.cmb2-id-ow-cf-post-soundcloud-url').slideDown(500); /* Enable Soundcloud URL */
			$('.cmb2-id-ow-cf-post-audio-local').slideUp(500); /* Disable Audio Local */
		}
		else if ( $('#ow_cf_post_audio_source').val() == 'audio_upload_local' ) {
			$('.cmb2-id-ow-cf-post-soundcloud-url').slideUp(500); /* Enable Soundcloud URL */
			$('.cmb2-id-ow-cf-post-audio-local').slideDown(500); /* Disable Audio Local */
		}
		else {
			$('.cmb2-id-ow-cf-post-soundcloud-url').slideUp(500); /* Enable Soundcloud URL */
			$('.cmb2-id-ow-cf-post-audio-local').slideUp(500); /* Disable Audio Local */
		}

		/* On Change : Event */
		$('#ow_cf_post_audio_source').live('change', function() {
			if( $('#ow_cf_post_audio_source').val() == 'soundcloud_link' ) {
				$('.cmb2-id-ow-cf-post-soundcloud-url').slideDown(500); /* Enable Soundcloud URL */
				$('.cmb2-id-ow-cf-post-audio-local').slideUp(500); /* Disable Audio Local */
			}
			else if ( $('#ow_cf_post_audio_source').val() == 'audio_upload_local' ) {
				$('.cmb2-id-ow-cf-post-soundcloud-url').slideUp(500); /* Enable Soundcloud URL */
				$('.cmb2-id-ow-cf-post-audio-local').slideDown(500); /* Disable Audio Local */
			}
			else {
				$('.cmb2-id-ow-cf-post-soundcloud-url').slideUp(500); /* Enable Soundcloud URL */
				$('.cmb2-id-ow-cf-post-audio-local').slideUp(500); /* Disable Audio Local */
			}
		});

		/* Page : Metabox */
		if( $('#ow_cf_metabox_page').length || $('#ow_cf_metabox_portfolio_page').length ) {

			/* Header Background Color */
			if( $('select#ow_cf_page_title').val() != 'enable' ) {
				$('.cmb2-id-ow-cf-page-sub-title').slideUp(500);
				$('.cmb2-id-ow-cf-page-header-img').slideUp(500);
			}

			$('#ow_cf_page_title').live('change', function() {

				/* Header Background Image */
				if( $('select#ow_cf_page_title').val() == 'disable' ) {
					$('.cmb2-id-ow-cf-page-sub-title').slideUp(500);
					$('.cmb2-id-ow-cf-page-header-img').slideUp(500);
				}
				else {
					$('.cmb2-id-ow-cf-page-sub-title').slideDown(500);
					$('.cmb2-id-ow-cf-page-header-img').slideDown(500);
				}
			});

			/* Sidebar Layout - Page */
			if( $('select#ow_cf_sidebar_layout').val() == 'no_sidebar' ) {
				$('.cmb2-id-ow-cf-widget-area').slideUp(500);
			}

			$('select#ow_cf_sidebar_layout').live('change', function() {

				/* Sidebar Layout - Page */
				if( $('select#ow_cf_sidebar_layout').val() == 'no_sidebar' ) {
					$('.cmb2-id-ow-cf-widget-area').slideUp(500);
				}
				else {
					$('.cmb2-id-ow-cf-widget-area').slideDown(500);
				}

			});
		}

		// Uploads			
		var ow_img_frame;

		$(document).on('click', 'input.select-img', function( event ) {

			var $this = $(this);

			event.preventDefault();

			var OWImage = wp.media.controller.Library.extend({
				defaults :  _.defaults({
						id:        'ow-insow-image',
						title:      $this.data( 'uploader_title' ),
						allowLocalEdits: false,
						displaySettings: true,
						displayUserSettings: false,
						multiple : false,
						library: wp.media.query( { type: 'image' } )
				  }, wp.media.controller.Library.prototype.defaults )
			});

			// Create the media frame.
			ow_img_frame = wp.media.frames.ow_img_frame = wp.media({
			  button: {
				text: $( this ).data( 'uploader_button_text' ),
			  },
			  state : 'ow-insow-image',
				  states : [
					  new OWImage()
				  ],
			  multiple: false  // Set to true to allow multiple files to be selected
			});

			// When an image is selected, run a callback.
			ow_img_frame.on( 'select', function() {

				var state = ow_img_frame.state('ow-insow-image');
				var selection = state.get('selection');
				var display = state.display( selection.first() ).toJSON();
				var obj_attachment = selection.first().toJSON();

				display = wp.media.string.props( display, obj_attachment );

				var image_field = $this.siblings('.img');
				var imgurl = display.src;

				// Copy image URL
				image_field.val(imgurl);

				// Show in preview
				var image_preview_wrap = $this.siblings('.ow-preview-wrap');
				image_preview_wrap.show();
				image_preview_wrap.find('img').attr('src',imgurl);
			});

			// Finally, open the modal
			ow_img_frame.open();
		});
	});
})(jQuery);