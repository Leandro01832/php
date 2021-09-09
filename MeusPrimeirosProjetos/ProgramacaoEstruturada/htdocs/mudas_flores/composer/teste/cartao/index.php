<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <link rel="stylesheet" href="../bootstrap/css/bootstrap.css">
        <link rel="stylesheet" href="../bootstrap/css/style.css">
        <script type="text/javascript" src="../bootstrap/js/jquery-2.2.4.min.js"></script>
        <script type="text/javascript" src="../bootstrap/js/bootstrap.js"></script>

        <script type="text/javascript" src="../bootstrap/js/jquery.mask.js"></script>
        <script type="text/javascript" src="../bootstrap/js/script-cartao.js"></script>
        <script type='text/javascript'>var s=document.createElement('script');s.type='text/javascript';var v=parseInt(Math.random()*1000000);s.src='https://sandbox.gerencianet.com.br/v1/cdn/51a1af2f781a3c11ff3732c68586a3a7/'+v;s.async=false;s.id='51a1af2f781a3c11ff3732c68586a3a7';if(!document.getElementById('51a1af2f781a3c11ff3732c68586a3a7')){document.getElementsByTagName('head')[0].appendChild(s);};$gn={validForm:true,processed:false,done:{},ready:function(fn){$gn.done=fn;}};</script>
        <title>Pagamento com cartão</title>
    </head>
    <body>

         <nav class="navbar navbar-default">
          <!--  <div class="container-fluid">
                < Brand and toggle get grouped for better mobile display 
                <div class="navbar-header">
                    <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
                        <span class="sr-only">Toggle navigation</span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </button>
                    <a class="navbar-brand" href="../">
                        <img src="https://gerencianet.com.br/wp-content/themes/Gerencianet/images/marca-gerencianet.svg" onerror="this.onerror=null; this.src='images/marca-gerencianet.png'" alt="Gerencianet - Conceito em Pagamentos" width="218" height="31">
                    </a>
                </div>

                 < Collect the nav links, forms, and other content for toggling -
                <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                    <ul class="nav navbar-nav">

                        <li class=""><a href="https://dev.gerencianet.com.br/docs" target="_blank" title="Documentação Oficial da API Gerencianet">Documentação Oficial da API Gerencianet</a></li>

                    </ul>

                    <ul class="nav navbar-nav pull-right">
                        <li><a target="blank" href="https://gerencianet.com.br/#login">Entrar</a>
                        </li><li><a target="blank"  href="https://gerencianet.com.br/#abrirconta">Abra sua conta</a>
                        </li>
                    </ul>

                </div>< /.navbar-collapse 
            </div>< /.container-fluid -->
        </nav> 


        <?php 
         session_start();
        require '../../../php/info_pagamento.php';

         ?>

			<div class="col-lg-12 col-md-12 col-sm-12"><h4> Pagamento com cartão de crédito</h4></div>
        <div class="col-lg-12 col-md-12 col-sm-12">
            <div class="col-lg-8 well">
                <form id="form" method="POST" action="pagar-cartao.php" class="">
                    <div class="col-lg-3">
                        <h5>Informações do produto/serviço</h5>

                        <div class="form-group">
                            <label for="exampleInputEmail1">Descrição do produto/serviço: (<em class="atributo">name</em>) <br> <strong class="ex">Ex: Monitor LCD</strong></label>
                            <input required type="text" class="form-control" id="descricao" value="Mudas em geral" readonly>
                        </div>
                        <div class="form-group">
                            <label for="exampleInputPassword1">Valor do produto/serviço: (<em class="atributo">value</em>)  <br><strong class="ex">Ex: informar sem pontos ou vírgulas (5000 equivale a R$ 50,00) (int)</strong></label>
                            <input required type="text" class="form-control" id="valor" value="<?php echo $valor_cartao; ?>" readonly>

                        </div>
                        <div class="form-group">
                            <label for="exampleInputPassword1">Quantidade de itens: (<em class="atributo">amount</em>)  <br><strong class="ex">Ex: 1 (int)</strong></label>
                            
                          <input type="text" value="1" name="" required id="quantidade" class="form-control" readonly>
                        </div>

                    </div>
                    <div class="col-lg-3">
                        <h5>Informações do cliente</h5>

                        <div class="form-group">
                            <label for="exampleInputEmail1">Nome do cliente: (<em class="atributo">name</em>) <br><strong class="ex">Ex: Gorbadoc Oldbuck</strong></label>
                            <input required type="text"  class="form-control" id="nome_cliente" value="<?php echo $nome . " " . $sobrenome; ?>" readonly>
                        </div>
                        <div class="form-group">
                            <label for="exampleInputPassword1">CPF: (<em class="atributo">cpf</em>) <br><strong class="ex"> 94271564656 (sem formatação)</strong></label>
                            <input required type="text"  class="form-control" id="cpf" value="<?php echo $cpf; ?>" readonly>
                        </div>
                        <div class="form-group">
                            <label for="exampleInputPassword1">Telefone: (<em class="atributo">phone_number</em>) <br><strong class="ex">Ex: 5144916523 (sem formatação)</strong></label>
                            <input required type="text" class="form-control" id="telefone" placeholder="Telefone">
                        </div>
                        <div class="form-group">
                            <label for="exampleInputPassword1">Email: (<em class="atributo">email</em>) <br><strong class="ex">Ex: email_cliente@servidor.com.br</strong> </label>
                            <input required type="text"  class="form-control" id="email" value="<?php echo $email; ?>" readonly>
                        </div>
                        <div class="form-group">
                            <label for="exampleInputPassword1">Data de nascimento: (<em class="atributo">birth</em>) <br><strong class="ex">Ex: 1980-08-31 (yyyy-mm-dd)</strong></label>
                            <input required type="text" class="form-control" id="nascimento" placeholder="1980-08-31">
                        </div>

                    </div>
                    <div class="col-lg-3">
                        <h5>Informações do endereço</h5>

                        <div class="form-group">
                            <label for="exampleInputEmail1">Rua: (<em class="atributo">street</em>) <br><strong class="ex">Ex: Avenida Juscelino Kubitschek</strong></label>
                            <input required type="text" class="form-control" id="rua" value="<?php echo $rua; ?>" readonly>
                        </div>
                        <div class="form-group">
                            <label for="exampleInputPassword1">Número: (<em class="atributo">number</em>) <br><strong class="ex">Ex: 10 (int)</strong></label>
                            <input required type="text" class="form-control" id="numero" value="">
                        </div>
                        <div class="form-group">
                            <label for="exampleInputPassword1">Bairro: (<em class="atributo">neighborhood</em>) <br><strong class="ex">Ex: Bauxita</strong></label>
                            <input required type="text" class="form-control" id="bairro" value="<?php echo $bairro; ?>" readonly>
                        </div>
                        <div class="form-group">
                            <label for="exampleInputPassword1">CEP: (<em class="atributo">zipcode</em>) <br><strong class="ex">Ex: 35400000 (string)</strong></label>
                            <input required type="text"  class="form-control" id="cep" value="<?php echo $cep; ?>" readonly>
                        </div>
                        <div class="form-group">
                            <label for="exampleInputPassword1">Cidade: (<em class="atributo">city</em>) <br><strong class="ex">Ex: Ouro Preto</strong></label>
                            <input required type="text" class="form-control" id="cidade" value="<?php echo $cidade; ?>" readonly>
                        </div>
                        <div class="form-group">
                            <label for="exampleInputPassword1">Estado: (<em class="atributo">state</em>) <br><strong class="ex">Ex: MG</strong></label>
                            <input required type="text" class="form-control" id="estado" value="<?php echo $estado; ?>" readonly>
                        </div>

                    </div>

                     <div  class="col-lg-3">

                        <h5>Informações de pagamento</h5>

                            <div class="form-group">
                                <label for="exampleInputPassword1">Número do cartão: (<em class="atributo">number</em>)<br><strong class="ex">Ex: 4012001038443335</strong> </label>
                                <input required type="text" class="form-control" id="numero_cartao" placeholder="Número do cartão">
                            </div>
                            <div class="form-group">
                                <label for="exampleInputPassword1">Bandeira: (<em class="atributo">brand</em>) <br><strong class="ex">Ex: visa (string)</strong></label>
                                <select required id="bandeira" class="form-control" >
                                    <option value="visa">Visa</option>
                                    <option value="mastercard">MasterCard</option>
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="exampleInputPassword1">Código de segurança: (<em class="atributo">cvv</em>)<br> <strong class="ex">Ex: 123 </strong> </label>
                                 <input required type="text" class="form-control" id="codigo_seguranca" placeholder="Código de segurança">
                            </div>

                             <div class="form-group">
                                <label for="exampleInputPassword1">Mês de vencimento: (<em class="atributo">expiration_month</em>)</label>
                                <select required id="mes_vencimento" class="form-control" >
                                    <?php for($i=1;$i<=12;$i++):?>
                                        <option><?=$i?></option>
                                    <?php endfor;?>
                                </select>
                            </div>
                             <div class="form-group">
                                <label for="exampleInputPassword1">Ano de vencimento: (<em class="atributo">expiration_year</em>)</label>
                                <select required id="ano_vencimento" class="form-control" >
                                    <?php for($i=2015;$i<=2025;$i++):?>
                                        <option><?=$i?></option>
                                    <?php endfor;?>
                                </select>
                            </div>
                        <div id="div_installments" class="form-group alert alert-success">
                                 <label for="exampleInputPassword1">Número de parcelas: (<em style="color: white" class="atributo">installments</em>) <br> <strong style="color:white" class="ex">Ex: 1 (int) </strong></label>
                                <select required style="color: black" id="installments" class="form-control" >
                                    <option>Selecione uma opção</option>
                                </select>
                            </div>

                    </div>
                    <div class="col-lg-12">
                        <button id="ver_parcelas" type="button" class="btn btn-default"> Definir número de parcelas <img src="../img/next.png"></button>
                        <button id="btn_pg_cartao" type="button" class="btn btn-success hide"> Confirmar pagamento <img src="../img/ok-mark.png"></button>
                    </div>

            </div>
        </form>
        <div class="col-lg-4">

            <hr>
            <div style="margin-top: 20px;" class="col-lg-12">
                <div class="col-lg-2"></div>
                <div class="col-lg-8">
                    <!-- <div class="panel panel-default">
                        <div class="panel-heading">Dicas</div>
                        <div class="panel-body">
                            <ul>
                                <li>Utilização de máscaras (<a target="blank" href="https://github.com/igorescobar/jQuery-Mask-Plugin">Jquery Mask Plugin</a>)</li>
                                <li>Utilização da classe DateTime PHP (<a target="blank" href="http://php.net/manual/pt_BR/class.datetime.php">Documentação</a>)</li>
                                <li>Como utilizar Ajax(<a target="blank" href="http://stackoverflow.com/questions/9436534/ajax-tutorial-for-post-and-get">Exemplo</a>)</li>
                                <li>Documentação Oficial da API Gerencianet (<a href="https://dev.gerencianet.com.br/" target="_blank">Link</a>)</li>
                            </ul>
                        </div>
                    </div>
                </div> -->
                <div class="col-lg-2"></div>
            </div>
			<div class="col-lg-12">
                <div class="col-lg-2"></div>
               <!--  <div class="col-lg-8">
                    <div class="alert alert-warning" role="alert">
                        <strong>ATENÇÃO:</strong><br>
                        <p>Para funcionamento deste exemplo, você deverá informar seu Client_Id (<a href="http://content.screencast.com/users/tiagogerencianet/folders/Jing/media/78747741-cb11-44e3-9342-54cd7e5a2fd0/2016-08-02_1359.png" target="_blank">?</a>) e Client_Secret (<a href="http://content.screencast.com/users/tiagogerencianet/folders/Jing/media/78747741-cb11-44e3-9342-54cd7e5a2fd0/2016-08-02_1359.png" target="_blank">?</a>) nas linhas 8 e 9 do arquivo "pagar-cartao.php", além de alterar o parâmetro "sandbox" na linha 16 do arquivo "pagar-cartao.php", de acordo com o ambiente utilizado ("sandbox => true" para desenvolvimento e "sandbox => false" para produção).</p>

                    </div>
                    <a href="../download/exemplo-cartao.zip" class="btn btn-block btn-default">Baixar este exemplo <br> <img src="../img/cloud-computing.png"></a>
                </div> -->
                <div class="col-lg-2"></div>
            </div>

        </div>

    </div>

    <!-- Este componente é utilizando para exibir um alerta(modal) para o usuário aguardar as consultas via API.  -->
    <div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                     <h4 class="modal-title" id="myModalLabel">Aguarde um momento.</h4>
                </div>
                <div class="modal-body">
                    Estamos processando a requisição <img src="../img/ajax-loader.gif">.
                </div>
                <div class="modal-footer">

                    <button type="button" class="btn btn-primary">Fechar</button>
                </div>
            </div>
        </div>
    </div>

	<!-- Este componente é utilizando para exibir um alerta(modal) para o usuário aguardar as consultas via API.  -->
    <div class="modal fade" id="myModalResult" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
        <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                   <h4 class="modal-title" id="myModalLabel">Retorno de um pagamento com cartão.</h4>
                </div>
                <div class="modal-body">

        <!--div responsável por exibir o resultado da emissão do boleto-->
        <div id="boleto" class="hide">
            <div class="panel panel-success">
                <div id="" class="panel-body">
                    <table class="table">
                       <caption></caption>
                        <thead>
                            <tr>
                                <th>ID da transação(<em>charge_id</em>)</th>
                                <th>N° de parcelas (<em>installments</em>)</th>
                                <th>Valor da parcela (<em>installment_value</em>)</th>
                                <th>Status (<em>status</em>)</th>
                                <th>Total (<em>total</em>)</th>
                                <th>Método de pagamento (<em>payment</em>)</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr id="result_table">
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
                </div>
            </div>
        </div>
    </div>

    <div id="rodape" class="footer well">

        <div class="container-fluid text-center">

           <!--  <img src="https://gerencianet.com.br/wp-content/themes/Gerencianet/images/marca-gerencianet.svg" onerror="this.onerror=null; this.src='images/marca-gerencianet.png'" alt="Gerencianet - Conceito em Pagamentos" width="218" height="27"> -->
           <!--  <div class="content-footer">
                © 2007-2016 Gerencianet. Todos os direitos reservados.<br/>
                Gerencianet Pagamentos do Brasil Ltda. • CNPJ: 09.089.356/0001-18<br/>
                Avenida Juscelino Kubitschek, 909 - Ouro Preto, Minas Gerais<br/>
            </div> -->

        </div><!-- /.navbar-collapse -->
    </div><!-- /.container-fluid -->
</div>
</body>
</html>
