<?php


// [paginas pag="1"]
function paginas( $atts ) {
 $url = "http://www.siteprofissional.somee.com/api/PaginaApi/" . $atts["pag"];

  $ch = curl_init($url);
  curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
  curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
  $resultado = json_decode(curl_exec($ch));

//var_dump($resultado->html);
  //foreach ($resultado->results as $ator) {
  //	var_dump($ator);

 // 	echo "Nome: " . $ator->name . "<br>";
 // 	echo "<hr>";

//  }

	return get_header() . " <div class='content'> {$resultado->html } </div>" . get_footer();

//return "";
}
add_shortcode( 'paginas', 'paginas' );