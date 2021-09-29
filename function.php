add_filter( 'body_class', 'add_role_to_body_class2' );
function add_role_to_body_class2( $classes ) {
	global $product;
		if ($product) {
		$zz =  str_replace(",", ".",explode("&",explode("<bdi>",$product->get_price_html())[1])[0]);
		if ( floatval(wc_get_price_including_tax( $product )) != floatval($zz)) {
			$classes[] = 'no-price-set';
			}
		}
	return $classes;
}
