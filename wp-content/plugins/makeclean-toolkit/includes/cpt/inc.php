<?php

	/* Include all individual CPT. */
	$prefix_cpt = "cpt_";

	/* Portfolio */
	require_once( $prefix_cpt . "portfolio.php" );

	/* Services */
	require_once( $prefix_cpt . "services.php" );

	/* Team */
	require_once( $prefix_cpt . "team.php" );

	/* Testimonials */
	require_once( $prefix_cpt . "testimonials.php" );
?>