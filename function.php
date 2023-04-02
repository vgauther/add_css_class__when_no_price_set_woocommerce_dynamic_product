<?php
add_filter( 'body_class', 'add_role_to_body_class2' );
function add_role_to_body_class2( $classes ) {
		global $product;
		if ($product) 
		{
			$zz =  str_replace(",", ".",explode("&",explode("<bdi>",$product->get_price_html())[1])[0]);
			$current_user = wp_get_current_user();
 			$current_role = (array) $current_user->roles;
			if( $current_role[0] )
			{
				if( $current_role[0] == "professionnel")
				{
					if ( floatval(round(wc_get_price_excluding_tax( $product ), 2)) == floatval($zz)) 
					{
						$classes[] = 'no-price-set';
					}
				}
			}
		}	
	return $classes;
}
