<?
session_start(); 
require_once ("validalogin.php");

//Requer conexão previa com o banco
require_once ("configs/conn.php");

//Busca o nome dos convenios
$sql = "SELECT nome, id FROM convenios";
$resultado = mysql_query($sql);

//Busca o nome dos profissionais
$sqlp = "SELECT id, nome FROM profissionais WHERE tipo = 'CRO'";
$resultadop = mysql_query($sqlp);
?>

<!DOCTYPE html>
<html>
<head>
	<link rel='stylesheet' type='text/css' href='css/menu.css' />
	<script src='js/jquery-1.9.1.js'></script>
	<script src='js/jquery-ui-1.10.3.custom.js'></script>
	<script type="text/javascript" src="js/jquery.maskedinput.js"/></script>
	<link rel='stylesheet' type='text/css' href='css/cupertino/jquery-ui-1.10.3.custom.css' />
	<link rel="shortcut icon" type="image/x-icon" href="imagens/PRODOM.ico"/>
	<meta charset="UTF-8">
		
	<script>
		$(function() {
			$('#convenio').change(function(){
				if( $(this).val() ) {					
					$.getJSON('getprod.php?search=',{convenio: $(this).val(), ajax: 'true'}, function(j){
						var options = '<option value=""></option>';	
						for (var i = 0; i < j.length; i++) {
							options += '<option value="' + j[i].codigo + '">' + j[i].codigo + '</option>';	
						}
						$('#codconvenio').html(options).show();
						$('#codconvenio2').html(options).show();
						$('#codconvenio3').html(options).show();
						$('#codconvenio4').html(options).show();
						$('#codconvenio5').html(options).show();
						$('#codconvenio6').html(options).show();
						$('#codconvenio7').html(options).show();
						$('#codconvenio8').html(options).show();
						$('#codconvenio9').html(options).show();
						$('#codconvenio10').html(options).show();
					});
				}
			});
			$('#codconvenio').change(function(){
				if( $(this).val() ) {
					
				   var cod = $(this).val();
				   var conv = $('#convenio').val();
				   var aux = '';
				   $.ajax({
				         url: 'getinfo.php',
				         //dataType: 'html',
				         data: {codigo:cod, convenio:conv},
				         success: function(data){
				           $("input[name='proc']").val(data);
				          }
				   });
				   $.ajax({
				         url: 'getpreco.php',
				         //dataType: 'html',
				         data: {codigo:cod, convenio:conv},
				         success: function(data1){
				           $("input[name='dente']").val(aux);	
				           $("input[name='valor']").val(data1);
				          }
				   });
				}
			});
			$('#codconvenio2').change(function(){
				if( $(this).val() ) {
					
				   var cod = $(this).val();
				   var conv = $('#convenio').val();
				   var aux = '';
				   $.ajax({
				         url: 'getinfo.php',
				         //dataType: 'html',
				         data: {codigo:cod, convenio:conv},
				         success: function(data){
				           $("input[name='proc2']").val(data);
				          }
				   });
				   $.ajax({
				         url: 'getpreco.php',
				         //dataType: 'html',
				         data: {codigo:cod, convenio:conv},
				         success: function(data1){
				           $("input[name='dente2']").val(aux);	
				           $("input[name='valor2']").val(data1);
				          }
				   });
				}
			});
			$('#codconvenio3').change(function(){
				if( $(this).val() ) {
					
				   var cod = $(this).val();
				   var conv = $('#convenio').val();
				   var aux = '';
				   $.ajax({
				         url: 'getinfo.php',
				         //dataType: 'html',
				         data: {codigo:cod, convenio:conv},
				         success: function(data){
				           $("input[name='proc3']").val(data);
				          }
				   });
				   $.ajax({
				         url: 'getpreco.php',
				         //dataType: 'html',
				         data: {codigo:cod, convenio:conv},
				         success: function(data1){
				           $("input[name='dente3']").val(aux);	
				           $("input[name='valor3']").val(data1);
				          }
				   });
				}
			});
			$('#codconvenio4').change(function(){
				if( $(this).val() ) {
					
				   var cod = $(this).val();
				   var conv = $('#convenio').val();
				   var aux = '';
				   $.ajax({
				         url: 'getinfo.php',
				         //dataType: 'html',
				         data: {codigo:cod, convenio:conv},
				         success: function(data){
				           $("input[name='proc4']").val(data);
				          }
				   });
				   $.ajax({
				         url: 'getpreco.php',
				         //dataType: 'html',
				         data: {codigo:cod, convenio:conv},
				         success: function(data1){
				         	$("input[name='dente4']").val(aux);
				           $("input[name='valor4']").val(data1);
				          }
				   });
				}
			});
			$('#codconvenio5').change(function(){
				if( $(this).val() ) {
					
				   var cod = $(this).val();
				   var conv = $('#convenio').val();
				   var aux = '';
				   $.ajax({
				         url: 'getinfo.php',
				         //dataType: 'html',
				         data: {codigo:cod, convenio:conv},
				         success: function(data){
				           $("input[name='proc5']").val(data);
				          }
				   });
				   $.ajax({
				         url: 'getpreco.php',
				         //dataType: 'html',
				         data: {codigo:cod, convenio:conv},
				         success: function(data1){
				           $("input[name='dente5']").val(aux);	
				           $("input[name='valor5']").val(data1);
				          }
				   });
				}
			});
			$('#codconvenio6').change(function(){
				if( $(this).val() ) {
					
				   var cod = $(this).val();
				   var conv = $('#convenio').val();
				   var aux = '';
				   $.ajax({
				         url: 'getinfo.php',
				         //dataType: 'html',
				         data: {codigo:cod, convenio:conv},
				         success: function(data){
				           $("input[name='proc6']").val(data);
				          }
				   });
				   $.ajax({
				         url: 'getpreco.php',
				         //dataType: 'html',
				         data: {codigo:cod, convenio:conv},
				         success: function(data1){
				           $("input[name='dente6']").val(aux);	
				           $("input[name='valor6']").val(data1);
				          }
				   });
				}
			});
			$('#codconvenio7').change(function(){
				if( $(this).val() ) {
					
				   var cod = $(this).val();
				   var conv = $('#convenio').val();
				   var aux = '';
				   $.ajax({
				         url: 'getinfo.php',
				         //dataType: 'html',
				         data: {codigo:cod, convenio:conv},
				         success: function(data){
				           $("input[name='proc7']").val(data);
				          }
				   });
				   $.ajax({
				         url: 'getpreco.php',
				         //dataType: 'html',
				         data: {codigo:cod, convenio:conv},
				         success: function(data1){
				           $("input[name='dente7']").val(aux);	
				           $("input[name='valor7']").val(data1);
				          }
				   });
				}
			});
			$('#codconvenio8').change(function(){
				if( $(this).val() ) {
					
				   var cod = $(this).val();
				   var conv = $('#convenio').val();
				   var aux = '';
				   $.ajax({
				         url: 'getinfo.php',
				         //dataType: 'html',
				         data: {codigo:cod, convenio:conv},
				         success: function(data){
				           $("input[name='proc8']").val(data);
				          }
				   });
				   $.ajax({
				         url: 'getpreco.php',
				         //dataType: 'html',
				         data: {codigo:cod, convenio:conv},
				         success: function(data1){
				           $("input[name='dente8']").val(aux);	
				           $("input[name='valor8']").val(data1);
				          }
				   });
				}
			});
			$('#codconvenio9').change(function(){
				if( $(this).val() ) {
					
				   var cod = $(this).val();
				   var conv = $('#convenio').val();
				   var aux = '';
				   $.ajax({
				         url: 'getinfo.php',
				         //dataType: 'html',
				         data: {codigo:cod, convenio:conv},
				         success: function(data){
				           $("input[name='proc9']").val(data);
				          }
				   });
				   $.ajax({
				         url: 'getpreco.php',
				         //dataType: 'html',
				         data: {codigo:cod, convenio:conv},
				         success: function(data1){
				           $("input[name='dente9']").val(aux);	
				           $("input[name='valor9']").val(data1);
				          }
				   });
				}
			});
			$('#codconvenio10').change(function(){
				if( $(this).val() ) {
					
				   var cod = $(this).val();
				   var conv = $('#convenio').val();
				   var aux = '';
				   $.ajax({
				         url: 'getinfo.php',
				         //dataType: 'html',
				         data: {codigo:cod, convenio:conv},
				         success: function(data){
				           $("input[name='proc10']").val(data);
				          }
				   });
				   $.ajax({
				         url: 'getpreco.php',
				         //dataType: 'html',
				         data: {codigo:cod, convenio:conv},
				         success: function(data1){
				           $("input[name='dente10']").val(aux);	
				           $("input[name='valor10']").val(data1);
				          }
				   });
				}
			});
			$( "#tabs" ).tabs();
			$("#data").datepicker({
			    dateFormat: 'dd/mm/yy',
			    dayNames: ['Domingo','Segunda','Terça','Quarta','Quinta','Sexta','Sábado'],
			    dayNamesMin: ['D','S','T','Q','Q','S','S','D'],
			    dayNamesShort: ['Dom','Seg','Ter','Qua','Qui','Sex','Sáb','Dom'],
			    monthNames: ['Janeiro','Fevereiro','Março','Abril','Maio','Junho','Julho','Agosto','Setembro','Outubro','Novembro','Dezembro'],
			    monthNamesShort: ['Jan','Fev','Mar','Abr','Mai','Jun','Jul','Ago','Set','Out','Nov','Dez'],
			    nextText: 'Próximo',
			    prevText: 'Anterior',
			    showOn: "button",
				buttonImage: "imagens/calendar.gif",
				buttonImageOnly: true
			});
			$('input[type="submit"]').each(function () {
			   $(this).hide().after('<button>').next().button({
			        icons: { primary: $(this).attr('icon') },
			        label: $(this).val()
			    }).click(function (event) {
			         event.preventDefault();
			         alert("Dados salvos!!!!");
			         $(this).prev().click();
			    });
			});
			$('input[name="pesquisar"]').each(function () {
			   $(this).hide().after('<button>').next().button({
			        icons: { primary: $(this).attr('icon') },
			        label: $(this).val()
			    }).click(function (event) {
			         event.preventDefault();
			         $(this).prev().click();
			    });
			});
			//$( "#dialog-form" ).dialog({
				//autoOpen: false,
				//height: 300,
				//width: 350,
				//modal: true,
				//buttons: {
				//"Adicionar": function() {
					//$( this ).dialog( "close" );
				//},
				//Cancel: function() {
					//$( this ).dialog( "close" );
				//}
				//}
			//});
		//$( "#create-user" )
			//.button()
			//.click(function() {
				//$( "#dialog-form" ).dialog( "open" );
		//});
		});
		//jQuery(function($){
   			//$("#data").mask("99/99/9999");
		//});
	</script>
	<script type="text/javascript">
  		$(document).ready(function(){
    		
    		$.ajax({
               url: 'buscaDados.php',
               type: 'POST',
               dataType: 'json',
               success: function(data){
                     $('#buscanome').autocomplete(
                     {
                           source: data,
                           minLength: 2
                     });
               }
          });
 	 	});
</script>
</head>
<body>
<? include ("menu.php"); ?>
<br>


<form method="POST" action="salvaaut.php" name="salvaaut">
<div id="tabs">
	<ul>
		<li><a href="#tabs-1">Ficha de Autorização</a></li>
	</ul>
	<div id="tabs-1">
		<table>
			<tr>
				<td align="right" width="95"><label>Nome:</label></td>
				<td align="left"><input type="text" name="buscanome" id="buscanome" size=30 value="" class="text ui-widget-content ui-corner-all"></td>
				<!--<td><input type="button" value="Pesq" name="pesquisar" id="create-user" icon="ui-icon-search"/><br/></td>-->
				<td align="right" width="75"><label>Convênio:</label></td>
				<td align="left">
					<select name="convenio" id="convenio" class="text ui-widget-content ui-corner-all">
								<option value="">SELECIONE</option>
								<? while ($linhas = mysql_fetch_array($resultado, MYSQL_NUM)){ ?>
								<option value=<? echo $linhas[1];?>><? echo utf8_encode($linhas[0]);?></option>
								<?};?>
						</select>
				</td>
			</tr>
		</table><br>
		<table>
			<tr>
				<td align="right" width="95"><label>Data:</label></td>
				<td align="left"><input type="text" name="data" id="data" size=10 value="" class="text ui-widget-content ui-corner-all"></td>
				<td align="right" width="75"><label>Profissional:</label></td>
				<td align="left">
					<select name="profissional" class="text ui-widget-content ui-corner-all">
								<option value="">SELECIONE</option>
								<? while ($linhasp = mysql_fetch_array($resultadop, MYSQL_NUM)){ ?>
								<option value=<? echo $linhasp[0];?>><? echo utf8_encode($linhasp[1]);?></option>
								<?};?>
						</select>
				</td>
			</tr>
		</table><br>
		<table><tr><td align="right">
		<div id="users-contain" class="ui-widget">
			<table id="users" class="ui-widget ui-widget-content">
				<thead>
					<tr class="ui-widget-header ">
						<th>Código</th>
						<th>Procedimento</th>
						<th>Dente</th>
						<th>Valor R$</th>
					</tr>
				</thead>
				<tbody>
					<tr>
						<td><select name="codconvenio" id="codconvenio" class="text ui-widget-content ui-corner-all">
								<!--<option value="">SELECIONE</option>-->
							</select>
						</td>
						<td><input type="text" name="proc" id="proc" size=35 value="" class="text ui-widget-content ui-corner-all" readonly="readonly"></td>
						<td><input type="text" name="dente" id="dente" size=3 value="" class="text ui-widget-content ui-corner-all"></td>
						<td><input type="text" name="valor" id="valor" size=11 value="" class="text ui-widget-content ui-corner-all" readonly="readonly"></td>
					</tr>
					<tr>
						<td><select name="codconvenio2" id="codconvenio2" class="text ui-widget-content ui-corner-all">
								<!--<option value="">SELECIONE</option>-->
							</select>
						</td>
						<td><input type="text" name="proc2" id="proc2" size=35 value="" class="text ui-widget-content ui-corner-all" readonly="readonly"></td>
						<td><input type="text" name="dente2" id="dente2" size=3 value="" class="text ui-widget-content ui-corner-all"></td>
						<td><input type="text" name="valor2" id="valor2" size=11 value="" class="text ui-widget-content ui-corner-all" readonly="readonly"></td>
					</tr>
					<tr>
						<td><select name="codconvenio3" id="codconvenio3" class="text ui-widget-content ui-corner-all">
								<!--<option value="">SELECIONE</option>-->
							</select>
						</td>
						<td><input type="text" name="proc3" id="proc3" size=35 value="" class="text ui-widget-content ui-corner-all" readonly="readonly"></td>
						<td><input type="text" name="dente3" id="dente3" size=3 value="" class="text ui-widget-content ui-corner-all"></td>
						<td><input type="text" name="valor3" id="valor3" size=11 value="" class="text ui-widget-content ui-corner-all" readonly="readonly"></td>
					</tr>
					<tr>
						<td><select name="codconvenio4" id="codconvenio4" class="text ui-widget-content ui-corner-all">
								<!--<option value="">SELECIONE</option>-->
							</select>
						</td>
						<td><input type="text" name="proc4" id="proc4" size=35 value="" class="text ui-widget-content ui-corner-all" readonly="readonly"></td>
						<td><input type="text" name="dente4" id="dente4" size=3 value="" class="text ui-widget-content ui-corner-all"></td>
						<td><input type="text" name="valor4" id="valor4" size=11 value="" class="text ui-widget-content ui-corner-all" readonly="readonly"></td>
					</tr>
					<tr>
						<td><select name="codconvenio5" id="codconvenio5" class="text ui-widget-content ui-corner-all">
								<!--<option value="">SELECIONE</option>-->
							</select>
						</td>
						<td><input type="text" name="proc5" id="proc5" size=35 value="" class="text ui-widget-content ui-corner-all" readonly="readonly"></td>
						<td><input type="text" name="dente5" id="dente5" size=3 value="" class="text ui-widget-content ui-corner-all"></td>
						<td><input type="text" name="valor5" id="valor5" size=11 value="" class="text ui-widget-content ui-corner-all" readonly="readonly"></td>
					</tr>
					<tr>
						<td><select name="codconvenio6" id="codconvenio6" class="text ui-widget-content ui-corner-all">
								<!--<option value="">SELECIONE</option>-->
							</select>
						</td>
						<td><input type="text" name="proc6" id="proc6" size=35 value="" class="text ui-widget-content ui-corner-all" readonly="readonly"></td>
						<td><input type="text" name="dente6" id="dente6" size=3 value="" class="text ui-widget-content ui-corner-all"></td>
						<td><input type="text" name="valor6" id="valor6" size=11 value="" class="text ui-widget-content ui-corner-all" readonly="readonly"></td>
					</tr>
					<tr>
						<td><select name="codconvenio7" id="codconvenio7" class="text ui-widget-content ui-corner-all">
								<!--<option value="">SELECIONE</option>-->
							</select>
						</td>
						<td><input type="text" name="proc7" id="proc7" size=35 value="" class="text ui-widget-content ui-corner-all" readonly="readonly"></td>
						<td><input type="text" name="dente7" id="dente7" size=3 value="" class="text ui-widget-content ui-corner-all"></td>
						<td><input type="text" name="valor7" id="valor7" size=11 value="" class="text ui-widget-content ui-corner-all" readonly="readonly"></td>
					</tr>
					<tr>
						<td><select name="codconvenio8" id="codconvenio8" class="text ui-widget-content ui-corner-all">
								<!--<option value="">SELECIONE</option>-->
							</select>
						</td>
						<td><input type="text" name="proc8" id="proc8" size=35 value="" class="text ui-widget-content ui-corner-all" readonly="readonly"></td>
						<td><input type="text" name="dente8" id="dente8" size=3 value="" class="text ui-widget-content ui-corner-all"></td>
						<td><input type="text" name="valor8" id="valor8" size=11 value="" class="text ui-widget-content ui-corner-all" readonly="readonly"></td>
					</tr>
					<tr>
						<td><select name="codconvenio9" id="codconvenio9" class="text ui-widget-content ui-corner-all">
								<!--<option value="">SELECIONE</option>-->
							</select>
						</td>
						<td><input type="text" name="proc9" id="proc9" size=35 value="" class="text ui-widget-content ui-corner-all" readonly="readonly"></td>
						<td><input type="text" name="dente9" id="dente9" size=3 value="" class="text ui-widget-content ui-corner-all"></td>
						<td><input type="text" name="valor9" id="valor9" size=11 value="" class="text ui-widget-content ui-corner-all" readonly="readonly"></td>
					</tr>
					<tr>
						<td><select name="codconvenio10" id="codconvenio10" class="text ui-widget-content ui-corner-all">
								<!--<option value="">SELECIONE</option>-->
							</select>
						</td>
						<td><input type="text" name="proc10" id="proc10" size=35 value="" class="text ui-widget-content ui-corner-all" readonly="readonly"></td>
						<td><input type="text" name="dente10" id="dente10" size=3 value="" class="text ui-widget-content ui-corner-all"></td>
						<td><input type="text" name="valor10" id="valor10" size=11 value="" class="text ui-widget-content ui-corner-all" readonly="readonly"></td>
					</tr>
				</tbody>
			</table>
	</div></td></tr></table><br>
        <table>
			<tr>
				<td align="right" width="95"><label>Obs:</label></td>
                                <td align="left"><textarea rows="3" cols="50" name="obs" value="" class="text ui-widget-content ui-corner-all"></textarea></td>
			</tr>
		</table><br>
	<!--<table><tr><td align="right">
		<div id="users-contain" class="ui-widget">
			<table id="users" class="ui-widget ui-widget-content">
				<thead>
					<tr class="ui-widget-header ">
						<th>Total R$</th>
					</tr>
				</thead>
				<tbody>
					<td><input type="text" name="total" id="total" size=11 value="" class="text ui-widget-content ui-corner-all" readonly="readonly"></td>
				</tbody>
			</table>
	</div></td></tr></table>-->	
		<table align="center">
			<tr>
				<td><input type="hidden" name="metodo" value="incluir"></td>
				<td><input type="submit" value="Salvar" class="salvar" icon="ui-icon-disk"/><br/></td>
			</tr>
		</table>
	</div>
</div>
</form>
</body>
</html>
