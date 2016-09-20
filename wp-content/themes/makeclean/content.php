<?php
/**
 * The default template for displaying content
 *
 * Used for both single and index/archive/search.
 *
 * @package WordPress
 * @subpackage Makeclean
 * @since Makeclean 1.0
 */
?>
<article id="post-<?php the_ID(); ?>" <?php post_class('blog-one-column'); ?>>

	<h2 class="no-padding no-margin hide"><?php echo the_title(); ?></h2>

	<div class="blog-box">
		
		<?php
		// Get post format
		$post_format = get_post_format();

		/* Post Format : Gallery */
		if( $post_format == "gallery" && count( get_post_meta( get_the_ID(), 'ow_cf_post_gallery', 1 ) ) > 0 && is_array( get_post_meta( get_the_ID(), 'ow_cf_post_gallery', 1 ) ) ) {
			?>
			<div class="entry-cover">

				<!-- Carousel -->
				<div id="blog-carousel-<?php echo the_ID(); ?>" class="carousel slide" data-ride="carousel">
					<div class="carousel-inner" role="listbox">
						<?php
						$active=1;
						foreach ( (array) get_post_meta( get_the_ID(), 'ow_cf_post_gallery', 1 ) as $attachment_id => $attachment_url ) {
							?>
							<div class="item<?php if( $active == 1 ) { echo ' active'; } ?>">
								<?php echo wp_get_attachment_image( $attachment_id, 'thumb-720-285' ); ?>
							</div>
							<?php
							$active++;
						} ?>
					</div>
					<a title="Previous" class="left carousel-control" href="#blog-carousel-<?php echo the_ID(); ?>" role="button" data-slide="prev">
						<span class="fa fa-chevron-left" aria-hidden="true"></span>
					</a>
					<a title="Next" class="right carousel-control" href="#blog-carousel-<?php echo the_ID(); ?>" role="button" data-slide="next">
						<span class="fa fa-chevron-right" aria-hidden="true"></span>
					</a>
				</div><!-- /.carousel -->

			</div>
			<?php
		}

		/* Post Format : Video */
		if( $post_format == "video" ) {

			if( get_post_meta( get_the_ID(), 'ow_cf_post_video_source', 1 ) == "video_link" && IsNullOrEmptyString( get_post_meta( get_the_ID(), 'ow_cf_post_video_link', 1 ) ) ) {
				echo wp_oembed_get( esc_url( get_post_meta( get_the_ID(), 'ow_cf_post_video_link', true ) ) );
			}
			elseif( get_post_meta( get_the_ID(), 'ow_cf_post_video_source', 1 ) == "video_embed_code" && IsNullOrEmptyString( get_post_meta( get_the_ID(), 'ow_cf_post_video_embed', 1 ) ) ) {
				echo get_post_meta( get_the_ID(), 'ow_cf_post_video_embed', 1 );
			}
			elseif( get_post_meta( get_the_ID(), 'ow_cf_post_video_source', 1 ) == "video_upload_local" && IsNullOrEmptyString( get_post_meta( get_the_ID(), 'ow_cf_post_video_local', 1 ) ) ) {
				?>
				<video controls>
					<source src="<?php echo esc_url( get_post_meta( get_the_ID(), 'ow_cf_post_video_local', 1 ) ); ?>" type="video/mp4">
					<?php esc_html_e("Your browser does not support the video tag.",'makeclean'); ?>
				</video> 
				<?php			
			}
		}

		/* Post Format : Audio */
		if( $post_format == "audio" ) {

			if( get_post_meta( get_the_ID(), 'ow_cf_post_audio_source', 1 ) == "soundcloud_link" && IsNullOrEmptyString( get_post_meta( get_the_ID(), 'ow_cf_post_soundcloud_url', 1 ) ) ) {
				?>
				<iframe src="<?php echo esc_url( get_post_meta( get_the_ID(), 'ow_cf_post_soundcloud_url', 1 ) ); ?>"></iframe>
				<?php
			}
			elseif( get_post_meta( get_the_ID(), 'ow_cf_post_audio_source', 1 ) == "audio_upload_local" && IsNullOrEmptyString( get_post_meta( get_the_ID(), 'ow_cf_post_audio_local', 1 ) ) ) {
				?>
				<audio controls>
					<source src="<?php echo esc_url( get_post_meta( get_the_ID(), 'ow_cf_post_audio_local', 1 ) ); ?>" type="audio/mpeg">
					<?php esc_html_e("Your browser does not support the audio element.",'makeclean'); ?>
				</audio>
				<?php
			}
		}

		if( has_post_thumbnail() && ( $post_format != "audio" && $post_format != "video" && $post_format != "gallery" ) ) {
			?>
			<div class="entry-cover">

				<a href="<?php echo esc_url( get_permalink() ); ?>" class="post-thumbnail" data-animsition-out="fade-out-up-sm" data-animsition-out-duration="500">
					<?php the_post_thumbnail(); ?>
				</a>

				<div class="posted-on">
					<?php if( function_exists('get_simple_likes_button') ) { ?><div class="like"><?php echo get_simple_likes_button( get_the_ID() ); ?></div><?php } ?>
					<span class="date"><?php echo get_the_date( 'n M', get_the_ID() ); ?></span>
				</div>

			</div>
			<?php
		} ?>

		<div class="blog-box-inner">

			<div class="entry-header">
				<?php
				if ( is_single() ) :
					the_title( '<h3 class="entry-title">', '</h3>' );
				else :
					the_title( sprintf( '<h3 class="entry-title"><a href="%s" rel="bookmark">', esc_url( get_permalink() ) ), '</a></h3>' );
				endif;
				?>
			</div>

			<footer class="entry-meta">

				<div class="byline">
					<span class="author"> <?php esc_html_e("BY ", 'makeclean'); ?> <a href="<?php echo get_author_posts_url( get_the_author_meta( 'ID' ) ); ?>" class="url fn n"><?php echo get_the_author(); ?><?php esc_html_e(",", 'makeclean'); ?></a></span>
				</div>

				<?php if( function_exists('get_simple_likes_button') ) { ?><div class="postlike">
					<div class="like"><?php echo get_simple_likes_button( get_the_ID() ); ?></div>
				</div><?php } ?>

				<div class="post-tags"><?php echo the_tags(); ?></div>

			</footer>

			<div class="entry-content">
				<?php
				if( is_single() ) {
					/* translators: %s: Name of current post */
					the_content( sprintf(
						esc_html__( 'Continue reading %s', 'makeclean' ),
						the_title( '<span class="screen-reader-text">', '</span>', false )
					) );

					wp_link_pages( array(
						'before'      => '<div class="page-links"><span class="page-links-title">' . esc_html__( 'Pages:', 'makeclean' ) . '</span>',
						'after'       => '</div>',
						'link_before' => '<span>',
						'link_after'  => '</span>',
						'pagelink'    => '<span class="screen-reader-text">' . esc_html__( 'Page', 'makeclean' ) . ' </span>%',
						'separator'   => '<span class="screen-reader-text">, </span>',
					) );
					?>
					<div class="col-md-5 col-sm-12 col-xs-6 post-tags no-left-padding">
						<?php echo the_tags(); ?>
					</div>
					<ul class="col-md-7 col-sm-12 col-xs-6 social-share no-right-padding">
						<li><?php esc_html_e( 'Share This Post : ', 'makeclean' ); ?></li>
						<li><a href="javascript: void(0)" data-action="facebook" data-title="<?php the_title(); ?>" data-url="<?php echo esc_url(the_permalink()); ?>"><i class="fa fa-facebook"></i></a>
						<li><a href="javascript: void(0)" data-action="twitter" data-title="<?php the_title(); ?>" data-url="<?php echo esc_url(the_permalink()); ?>"><i class="fa fa-twitter"></i></a>
						<li><a href="javascript: void(0)" data-action="pinterest" data-title="<?php the_title(); ?>" data-url="<?php echo esc_url(the_permalink()); ?>"><i class="fa fa-pinterest"></i></a>
						<li><a href="javascript: void(0)" data-action="google-plus" data-url="<?php echo esc_url(the_permalink()); ?>"><i class="fa fa-google-plus"></i></a>
						<li><a href="javascript: void(0)" data-action="linkedin" data-title="<?php the_title(); ?>" data-url="<?php echo esc_url(the_permalink()); ?>"><i class="fa fa-linkedin"></i></a>
						<li><a href="javascript: void(0)" data-action="digg" data-title="<?php the_title(); ?>" data-url="<?php echo esc_url(the_permalink()); ?>"><i class="fa fa-digg"></i></a>
						<li><a href="javascript: void(0)" data-action="reddit" data-title="<?php the_title(); ?>" data-url="<?php echo esc_url(the_permalink()); ?>"><i class="fa fa-reddit"></i></a>
					</ul>
					<?php
				}
				else {

					the_excerpt(); ?>

					<a href="<?php echo esc_url( get_permalink() ); ?>" class="btn"><?php esc_html_e("Read more", 'makeclean'); ?></a>

					<?php
				}
				?>
			</div>

		</div>

	</div>

</article>

<div class="clearfix"></div>