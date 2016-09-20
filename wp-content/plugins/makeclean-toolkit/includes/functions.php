<?php
/* Custom Excerpt Limit */
if ( ! function_exists( 'custom_excerpts' ) ) :
	function custom_excerpts( $limit ) {
		$excerpt = explode(' ', get_the_excerpt(), $limit);
		if ( count($excerpt) >= $limit ) :
		
			array_pop($excerpt);
			$excerpt = implode(" ",$excerpt).'...';
		
		else :
		
			$excerpt = implode(" ",$excerpt);
		
		endif; 

		$excerpt = preg_replace('`\[[^\]]*\]`','',$excerpt);
		return $excerpt;
	}
endif;

/* Check string for Null or Empty & Print It */
if ( ! function_exists( 'makeclean_content' ) ) :

	function makeclean_content( $before_val, $after_val, $val ) {

		if( $val != "" ) {
			return $before_val.$val.$after_val;
		}
		else {
			return "";
		}
	}
endif;

/* Check array element for Null or Empty */
if ( ! function_exists( 'IsNullOrEmptyArray' ) ) :
	function IsNullOrEmptyArray( $arrOptions, $strKey ) {

		if( is_array( $arrOptions )
			&& array_key_exists( $strKey, $arrOptions ) 
			&& isset( $arrOptions[$strKey] ) 
			&& trim( $arrOptions[$strKey] ) != '' 
		) {
			return true;
		} 
		
		return false;
	}
endif;

/* Check string for Null or Empty */
if ( ! function_exists( 'IsNullOrEmptyString' ) ) :
	function IsNullOrEmptyString( $strValue ) {
		if ( isset( $strValue ) && trim( $strValue ) != '' ) :
			return true;
		endif;
		
		return false;
	}
endif;

?>