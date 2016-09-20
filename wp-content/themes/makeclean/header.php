<?php
/**
 * The Header for our theme
 *
 *
 * @package WordPress
 * @subpackage Makeclean
 * @since Makeclean 1.0
 */
 global $ow_option;
?><!DOCTYPE html>
<!--[if lt IE 7 ]> <html class="ie6" <?php language_attributes(); ?>> <![endif]-->
<!--[if IE 7 ]>    <html class="ie7" <?php language_attributes(); ?>> <![endif]-->
<!--[if IE 8 ]>    <html class="ie8" <?php language_attributes(); ?>> <![endif]-->
<!--[if IE 9 ]>    <html class="ie9" <?php language_attributes(); ?>> <![endif]-->
<!--[if (gt IE 9)|!(IE)]><!--><html class="" <?php language_attributes(); ?>> <!--<![endif]-->

<!--<![endif]-->
<head>

	<meta charset="<?php bloginfo( 'charset' ); ?>">
	<meta name="viewport" content="width=device-width, initial-scale=1">

	<link rel="profile" href="http://gmpg.org/xfn/11">
	<link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>">

	<?php wp_head(); ?>

</head>

<body <?php body_class(); ?> data-offset="200" data-spy="scroll" data-target=".primary-navigation">

	<a id="top"></a>

	<header id="header-section" class="header-section">

		<div id="slidepanel">

			<div class="top-header">

				<div class="container">

					<div class="pull-left">
					
						<p><img src="<?php echo esc_url( IMG_URI ); ?>/icon/thumbs-icon.png" alt="thumbs-icon"/><?php echo esc_attr( $ow_option["opt_header_left"] ); ?></p>
					
					</div>
					
					<div class="pull-right">
					
						<p><img src="<?php echo esc_url( IMG_URI ); ?>/icon/clock-icon.png" alt="clock-icon"/><?php echo esc_attr( $ow_option["opt_header_right"] ); ?></p>
					
					</div>
					
				</div>
				
			</div>	
			
			<div class="logo-block">
			
				<div class="container">
			
					<div class="owpull-left">
					
						<?php get_template_part("owtemplates/site","logo"); ?>
						
					</div>

					<div class="cart-block owpull-right">

						<?php
						if ( class_exists( 'Woocommerce' ) ) {

							global $woocommerce;
							
							?>
							<div class="shop-cart">
							
								<a title="View your shopping cart" href="<?php echo esc_url( $woocommerce->cart->get_cart_url() ); ?>" class="cart-control">
								
									<i class="fa fa-shopping-cart"></i>

									<span><?php echo esc_attr( $woocommerce->cart->cart_contents_count ); ?></span>
									
								</a>

								<p class="pull-right"><?php esc_html_e('Cart - ', 'makeclean'); ?><?php echo html_entity_decode( $woocommerce->cart->get_cart_subtotal() ); ?></p>
								
							</div>
							<?php
						} ?>

					</div>
					
					<div class="call-us owpull-right">
						
						<img src="<?php echo esc_url( IMG_URI ); ?>/icon/mobile-icon.png" alt="mobile-icon" />
						
						<p><?php echo esc_attr( $ow_option["opt_header_title"] ); ?><span><?php echo esc_attr( $ow_option["opt_header_phone"] ); ?></span></p>
					
					</div>

				</div>
				
			</div>

		</div>
		
		<div class="menu-block">

			<div class="container">

				<div class="row">

					<nav class="navbar navbar-default primary-navigation col-md-9 ow-navigation">

						<div class="container">

							<div class="row">

								<div class="navbar-header no-padding container-fluid">

									<?php get_template_part("owtemplates/site","logo-mobile"); ?>

									<button aria-controls="navbar" aria-expanded="false" data-target="#navbar" data-toggle="collapse" class="owpull-right navbar-toggle collapsed" type="button">
										<span class="sr-only"><?php esc_html_e("Toggle navigation",'makeclean'); ?></span>
										<span class="icon-bar"></span>
										<span class="icon-bar"></span>
										<span class="icon-bar"></span>
									</button>

									<div id="loginpanel" class="owpull-right slidepanel-btn">
										<div id="toggle" class="right">
											<a href="#slidepanel" id="slideit"><i class="fo-icons fa fa-inbox"></i></a>
											<a href="#slidepanel" id="closeit"><i class="fo-icons fa fa-close"></i></a>
										</div>
									</div>

								</div>

								<div class="navbar-collapse collapse no-margin no-padding" id="navbar">

									<?php get_template_part("owtemplates/navigation","menu"); ?>

								</div>

							</div>

						</div>

					</nav>

					<div class="col-md-3 quote">

						<a title="Free Quote" href="#" data-toggle="modal" data-target="#scheduleservices_h">
							<?php esc_html_e("free instant quote", 'makeclean'); ?>
						</a>

					</div>

					<div class="scheduleservices">

						<div class="modal fade" id="scheduleservices_h" tabindex="-1" role="dialog">

							<div class="modal-dialog" role="document">

								<div class="modal-content">

									<button type="button" class="close" data-dismiss="modal" aria-label="Close">
										<span aria-hidden="true">&times;</span>
									</button>

									<div class="modal-body">
										<?php echo do_shortcode( $ow_option['opt_quoteform'] ); ?>
									</div>

								</div>

							</div>

						</div>

					</div>

				</div>

			</div>

		</div>

	</header>

	<?php get_template_part("owtemplates/page","header"); ?>