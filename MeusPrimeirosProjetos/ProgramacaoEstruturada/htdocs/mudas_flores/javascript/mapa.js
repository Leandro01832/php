 var valor_frete = 0;
    var padrao_frete = 4;
    var valor_mudas = document.getElementById("valor_m");
   
   
   
    function verifica_valor(){        
         if (valor_mudas > 9000){
            padrao_frete = (10 / 100) * padrao_frete;
        } else
         if (valor_mudas > 8000){
             padrao_frete = (20 / 100) * padrao_frete;
        } else
         if (valor_mudas > 7000){
             padrao_frete = (30 / 100) * padrao_frete;
        } else
         if (valor_mudas > 6000){
            padrao_frete = (40 / 100) * padrao_frete;
        } else
         if (valor_mudas > 5000){
             padrao_frete = (50 / 100) * padrao_frete;
        }else
         if (valor_mudas > 4000){
             padrao_frete = (60 / 100) * padrao_frete;
        }else
         if (valor_mudas > 3000){
            padrao_frete = (70 / 100) * padrao_frete;
        }else
         if (valor_mudas > 2000){
             padrao_frete = (80 / 100) * padrao_frete;
        }else
         if (valor_mudas > 1000){
             padrao_frete = (90 / 100) * padrao_frete;
        }
        else 
        {
             padrao_frete = (100 / 100) * padrao_frete;
        }
    }

        function CalculaDistancia() {
            $('#litResultado').html('Aguarde...');
            //Instanciar o DistanceMatrixService
            var service = new google.maps.DistanceMatrixService();
            //executar o DistanceMatrixService
            service.getDistanceMatrix(
              {
                  //Origem
                  origins: [$("#txtOrigem").val()],
                  //Destino
                  destinations: [$("#txtDestino").val()],
                  //Modo (DRIVING | WALKING | BICYCLING)
                  travelMode: google.maps.TravelMode.DRIVING,
                  //Sistema de medida (METRIC | IMPERIAL)
                  unitSystem: google.maps.UnitSystem.METRIC
                  //Vai chamar o callback
              }, callback);
        }
        //Tratar o retorno do DistanceMatrixService
        function callback(response, status) {
            //Verificar o Status
            if (status != google.maps.DistanceMatrixStatus.OK)
                //Se o status não for "OK"
                $('#litResultado').html(status);
            else {
                //response.rows[0].elements[0].duration.text
                var dias = 0;
                var kms = response.rows[0].elements[0].distance.text.replace(".", "");
                dias = (parseFloat(kms) / 500) * 5;


                $('#litResultado').html("<strong>Origem</strong>: " + response.originAddresses +
                    "<br /><strong>Destino:</strong> " + response.destinationAddresses +
                    "<br /><strong>Distância</strong>: " + response.rows[0].elements[0].distance.text +
                    " <br /><strong>Prazo de entrega</strong>: " + parseInt(dias) + " dias uteis."
                    );
                //Atualizar o mapa
                $("#map").attr("src", "https://maps.google.com/maps?saddr=" + response.originAddresses + "&daddr=" + response.destinationAddresses + "&output=embed");
            }
            verifica_valor();
            var km = response.rows[0].elements[0].distance.text.replace(".", "");
            valor_frete = padrao_frete * parseInt(km);

            document.getElementById("valor_frete").value =  valor_frete.toFixed(2);

            document.getElementById("total").value = parseFloat(document.getElementById("valor_frete").value) + parseFloat(parseFloat(document.getElementById("valor_m").value));
        }       

        window.onload = function(){
           document.getElementById('finalizar').disabled=true;
           setInterval(ativar, 1000);
            
           }

           
           function ativar(){
           if (document.getElementById("valor_frete").value == "0" || document.getElementById("cep").value.length != 8 || document.getElementById("rua").value == ""){
              document.getElementById('finalizar').disabled=true;
          }             
           else 
          {
             document.getElementById('finalizar').disabled=false;
          }
        }
       