<?php
global $ow_option;
 
if( has_nav_menu('ow_primary') ) :
	wp_nav_menu( array(
		'theme_location' => 'ow_primary',
		'container' => false,
		'items_wrap' => '<ul id="%1$s" class="%2$s">%3$s</ul>',
		'depth' => 10,
		'menu_class' => 'nav navbar-nav',
		'depth' => 10 ,
		'walker' => new makeclean_nav_walker
	));
else :
	echo '<ul class="nav navbar-nav">'
		.wp_list_pages(array(
		'echo'            => 0,
		'walker'          => new makeclean_wp_page_walker,
		'title_li'        => ''
	)).'</ul>';
endif;
?>