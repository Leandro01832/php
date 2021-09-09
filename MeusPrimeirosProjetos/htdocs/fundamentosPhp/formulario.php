
<!DOCTYPE html>
<html>
<head>
	<title>formulario</title>
</head>
<body>

	<form method="POST" action="resultado.php">		
		<label>Nome</label>
		<input type="text" name="nome"><br>
		<label>N1</label>
		<input type="text" name="n1"><br>

		<label>Operação</label>
		<select name="operacao">
			<option value="adicao">Adicao</option>
			<option value="subtracao">Subtração</option>
			<option value="divisao">Divisão</option>
			<option value="multiplicacao">Multiplicação</option>
		</select><br>

		<label>N2</label>
		<input type="text" name="n2"><br>
		<input type="submit" value="Calcular">
	</form>

</body>
</html>