
var dias = ["domingo",  "segunda-feira", "terça-feira", "quarta-feira", "quinta-feira", "sexta-feira", "sabado"]
var data = new Date();


alert("fazendo leitura de javascript");






window.onload = function()
{
	if (dias[data.getDay()] == "domingo"){	
	document.getElementsByTagName('body')[0].style.backgroundImage = "url('../css/back/back9.gif')";
	}
	if (dias[data.getDay()] == "segunda-feira"){	
	document.getElementsByTagName('body')[0].style.backgroundImage = "url('../css/back/back8.gif')";
	}
	if (dias[data.getDay()] == "terça-feira"){	
	document.getElementsByTagName('body')[0].style.backgroundImage = "url('../css/back/back7.gif')";
	}
	if (dias[data.getDay()] == "quarta-feira"){	
	document.getElementsByTagName('body')[0].style.backgroundImage = "url('../css/back/back6.gif')";
	}
	if (dias[data.getDay()] == "quinta-feira"){	
	document.getElementsByTagName('body')[0].style.backgroundImage = "url('../css/back/back5.gif')";

	}
	if (dias[data.getDay()] == "sexta-feira"){	
	document.getElementsByTagName('body')[0].style.backgroundImage = "url('../css/back/back4.gif')";
	}
	if (dias[data.getDay()] == "sabado-feira"){	
	document.getElementsByTagName('body')[0].style.backgroundImage = "url('../css/back/back3.jpg')";
	}

	

	
	
}