 function validacao(){


 	if ( document.formulario._cpf.value.length != 11) 
 	{
 		alert("Por favor digite um CPF valido.");
 		document.formulario._cpf.value = "";
 		document.formulario._cpf.focus();
 		return false;
 	}

 	if (document.formulario._nome.value==""){
 		alert("Por favor, preencher o campo nome.");
 		document.formulario._nome.focus();
 		return false;
 	}

 	if (document.formulario._sobrenome.value==""){
 		alert("Por favor, preencher o campo sobrenome.");
 		document.formulario._sobrenome.focus();
 		return false;
 	}  	

 		if (document.formulario.senha.value.length < 8){
 		alert("A senha deve conter no minimo 8 caracteres");
 		document.formulario.senha.focus();
 		return false;
 	}

 	if (document.formulario.senha.value != document.formulario.repetir_senha.value){
 		alert("As senhas não são iguais. Por favor redigite a senha.");
 		document.formulario.senha.value = "";
 		document.formulario.repetir_senha.value = "";
 		document.formulario.senha.focus();
 		return false;
 	}

 	

 }


 

// funções e modificadores.

	//alert(/javascript/i.test("Javascript"));
// Se atende a expressao regular;

//var str = "Qual é o Doce mais doce que o doce.";
//alert(/doce/ig.exec(str));
//alert (str.match(/doce/ig));


// metacaracteres

//alert(/./.test("pier21"));
//alert(/\w/.test("pier21"));
//alert(/\s/.test("pier 21"));
//alert(/\d/.test("pier21"));
//alert(/^21/.test("pier21"));
//alert(/21$/.test("pier21"));