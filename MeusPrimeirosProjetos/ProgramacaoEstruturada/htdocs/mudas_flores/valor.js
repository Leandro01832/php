var quantidades = document.getElementsByClassName('qnt'); // document.getElementsByName('qnt');
var valor = document.getElementsByClassName('vlr');
var tot = document.getElementsByClassName('total');







window.onload = function(){	

	document.getElementById("visualizar").onclick = function(){
	var ajax = new XMLHttpRequest();
	var r = document.getElementById("resposta");
	ajax.onreadystatechange = function(){
		if (ajax.readyState == 4){
			//alert("requisição chegou");
			//r.appendChild(document.createTextNode(ajax.responseText));
			r.innerHTML = ajax.responseText;
		}
	}
	ajax.open("Post", "../php/visualizacao_pedido.php");
	ajax.send(null);

	return false;
}
	

	for (var i = 0; i < quantidades.length; i++) 
	{
		
		quantidades[i].onkeyup = function()
		{
		calculo();
		}
	}	
}

function calculo(){
	document.getElementById("tudo").value = "0";
	for (var i = 0; i < tot.length; i++) 
  	{  		

  		tot[i].value =  parseFloat(valor[i].value)  * parseFloat(quantidades[i].value); 	
  		document.getElementById("tudo").value  = parseFloat(tot[i].value) + parseFloat(document.getElementById("tudo").value) ;
  		
  	}
}














