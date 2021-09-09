<?php


// [render_aulas titulo="aulas do torne-se um programador"]
function render_aulas( $atts ) {
 //	$a = shortcode_atts($atts);

	return "<h1> {$atts["titulo"]} <h1/>";
}
add_shortcode( 'render_aulas', 'render_aulas' );