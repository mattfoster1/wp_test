<?php
/**
 * @author  WooThemes
 * @package WooCommerce/Templates
 * @version 2.5.0
 */
?>
<form method="get" class="searchform woocommerce-product-search" action="<?php echo esc_url( home_url( '/'  ) ); ?>">
	<div class="input-group">
		<input type="text" required="" class="search-field form-control" placeholder="<?php echo esc_attr_x( 'FIND HERE&hellip;', 'placeholder', 'makeclean' ); ?>" value="<?php echo get_search_query(); ?>" name="s" title="<?php echo esc_attr_x( 'Search for:', 'label', 'makeclean' ); ?>" />
		<span class="input-group-btn">
			<button type="submit" class="btn btn-default"><i class="fa fa-search"></i></button>	
			<input type="hidden" name="post_type" value="product" />
		</span>
	</div>
</form>