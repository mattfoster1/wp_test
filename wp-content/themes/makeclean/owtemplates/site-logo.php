<?php global $ow_option; ?>

<div class="logo-section mobile-hide">
	<?php
	if( IsNullOrEmptyString( $ow_option['opt_site_logo']['url'] ) && $ow_option['opt_logo_select'] == '2' ):
		?>
		<a class="image-logo" href="<?php echo esc_url( home_url( '/' ) ); ?>"><img src="<?php echo esc_url( $ow_option['opt_site_logo']['url'] ); ?>" alt=""/></a>
		<?php
	else:
		?>
		<a class="text-logo" href="<?php echo esc_url( home_url( '/' ) ); ?>"><?php echo get_bloginfo('title'); ?></a>
		<?php
	endif;
	?>
</div>