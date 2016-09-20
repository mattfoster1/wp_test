<?php
/* Widget Area */
if( IsNullOrEmptyString( get_post_meta( get_the_ID(), 'ow_cf_sidebar_layout', true ) ) ) {
	$sidebar_layout = get_post_meta( get_the_ID(), 'ow_cf_sidebar_layout', true );
}
else {
	$sidebar_layout = "";
}

if( $sidebar_layout == "right_sidebar" ) {
	$sidebar_css = "sidebar-right";
}
elseif( $sidebar_layout == "left_sidebar" ) {
	$sidebar_css = "sidebar-left";
}
elseif( $sidebar_layout == "no_sidebar" ) {
	$sidebar_css = "no-sidebar";
}
else {
	$sidebar_css = "sidebar-right";
}

if( IsNullOrEmptyString( get_post_meta( get_the_ID(), 'ow_cf_widget_area', true ) ) ) {
	$widget_area = get_post_meta( get_the_ID(), 'ow_cf_widget_area', true );
}
else {
	$widget_area = "sidebar-1";
}

if( $sidebar_layout != "no_sidebar" && is_active_sidebar( $widget_area ) ) {
	?>
	<div class="widget-area col-md-3 col-sm-4 <?php echo esc_attr( $sidebar_css ); ?>">
		<?php dynamic_sidebar( $widget_area ); ?>
	</div><!-- End Sidebar -->
	<?php
}
?>