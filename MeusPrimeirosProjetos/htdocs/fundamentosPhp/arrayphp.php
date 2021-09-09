<?php

$cores = array("azul", "amarelo", "verde", "branco");

echo $cores[1];

echo "<br/>";

$anos = array();

$anos[] = 2001;
$anos[] = 2002;
$anos[] = 2003;
$anos[] = 2004;
$anos[] = 2005;
$anos[8] = 2006;
$anos[] = 2007;

echo $anos[0] . "<br/>";
echo $anos[1] . "<br/>";
echo $anos[2] . "<br/>";
echo $anos[3] . "<br/>";
echo $anos[4] . "<br/>";
echo $anos[8] . "<br/>";
echo $anos[9] . "<br/>";

$letras = array(0 => "azul", 1 => "amarelo", 2=> "verde", 3=> "branco", 4 => "rosa", 5 =>  "verde");

echo $letras[3] . "<br/>";

print_r($letras);

echo  "<br/>";
echo  "<br/>";

for($i = 0; $i < 10; $i++){
	echo("numero" . $i . "<br/>");
}

for($i = 0; $i < count($letras); $i++){
	echo $letras[$i] . "<br/>";
}

?>

<select>
	<option>Selecione o ano de nascimento</option>
	<?php
		for($i = 2021; $i > 1910; $i--)
		{
			echo "<option value='".$i."' >" . $i . "<option>";
		}
	?>
</select>