<?
session_start(); 
require_once ("validalogin.php");

//Requer conexão previa com o banco
require_once ("configs/conn.php");

if (isset($_GET["fichaaut"])){
  		$fichaaut = utf8_decode($_GET["fichaaut"]);
}else {if (isset($_POST["fichaaut"])){
  		$fichaaut = utf8_decode($_POST["fichaaut"]);
}};

//Busca informacoes da ficha de autorizacao
$sqla = "SELECT profissional, paciente, convenio, data FROM autorizacao WHERE id = '$fichaaut'";
$resultadoa = mysql_query($sqla);
$linhasa = mysql_fetch_array($resultadoa);

//Busca informacoes dos codigos autorizados
$sqlcod = "SELECT codconvenio FROM autorizacao_codigoconvenio WHERE codautorizacao = '$fichaaut'";
$resultadocod = mysql_query($sqlcod);

//Busca informacoes dos codigos autorizados
$sqlcod2 = "SELECT codconvenio FROM autorizacao_codigoconvenio WHERE codautorizacao = '$fichaaut'";
$resultadocod2 = mysql_query($sqlcod2);

//Busca informacoes dos codigos autorizados
$sqlcod3 = "SELECT codconvenio FROM autorizacao_codigoconvenio WHERE codautorizacao = '$fichaaut'";
$resultadocod3 = mysql_query($sqlcod3);

//Busca informacoes dos codigos autorizados
$sqlcod4 = "SELECT codconvenio FROM autorizacao_codigoconvenio WHERE codautorizacao = '$fichaaut'";
$resultadocod4 = mysql_query($sqlcod4);

//Busca informacoes dos codigos autorizados
$sqlcod5 = "SELECT codconvenio FROM autorizacao_codigoconvenio WHERE codautorizacao = '$fichaaut'";
$resultadocod5 = mysql_query($sqlcod5);

//Busca informacoes do paciente
$sqlpac = "SELECT nome FROM pacientes WHERE id = '$linhasa[1]'";
$resultadopac = mysql_query($sqlpac);
$linhaspac = mysql_fetch_array($resultadopac);

//Busca informacoes do profissional atual
$sqlprof = "SELECT nome, id FROM profissionais WHERE id = '$linhasa[0]'";
$resultadoprof = mysql_query($sqlprof);
$linhasprof = mysql_fetch_array($resultadoprof);

//Busca informacoes do convenio atual
$sqlconv = "SELECT nome FROM convenios WHERE id = '$linhasa[2]'";
$resultadoconv = mysql_query($sqlconv);
$linhasconv = mysql_fetch_array($resultadoconv);	

//Busca o nome dos convenios
$sql = "SELECT id, nome FROM convenios";
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
			$('#codconvenio').change(function(){
				if( $(this).val() ) {
					
				   var cod = $(this).val();
				   var conv = $('#convenio1').val();
				   var aux = 1;
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
				   var conv = $('#convenio1').val();
				   var aux = 1;
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
				   var conv = $('#convenio1').val();
				   var aux = 1;
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
				   var conv = $('#convenio1').val();
				   var aux = 1;
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
				   var conv = $('#convenio1').val();
				   var aux = 1;
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
		});
	</script>
</head>
<body>
<? include ("menu.php"); ?>
<br>

<form method="POST" action="salvaproc.php" name="salvaproc">
<div id="tabs">
	<ul>
		<li><a href="#tabs-1">Ficha de Procedimentos</a></li>
	</ul>
	<div id="tabs-1">
		<table>
			<tr>
				<td align="right" width="95"><label>Nome:</label></td>
				<td align="left"><input type="text" name="buscanome" id="buscanome" size=30 readonly="readonly" value="<? echo utf8_encode($linhaspac[0]);?>" class="text ui-widget-content ui-corner-all"></td>
				<td><input type="hidden" name="nome" value="<? echo $linhasa[1];?>"></td>
				<td align="right" width="75"><label>Convênio:</label></td>
				<td align="left"><input type="text" name="convenio" id="convenio" size=30 readonly="readonly" value="<? echo utf8_encode($linhasconv[0]);?>" class="text ui-widget-content ui-corner-all"></td>
				<td><input type="hidden" name="convenio1" id="convenio1" value="<? echo $linhasa[2];?>"></td>
				<!--<td align="left">
					<select name="convenio" id="convenio" class="text ui-widget-content ui-corner-all">
								<option value=""><? echo utf8_encode($linhasconv[0]); ?></option>
								<option value="">------------</option>
								<? while ($linhas = mysql_fetch_array($resultado, MYSQL_NUM)){ ?>
								<option value=<? echo $linhas[0];?>><? echo $linhas[1];?></option>
								<?};?>
						</select>
				</td> -->
			</tr>
		</table><br>
		<table>
			<tr>
				<!--<td align="right" width="95"><label>Data:</label></td>
				<td align="left"><input type="text" name="data" id="data" size=10 value="" class="text ui-widget-content ui-corner-all"></td>-->
				<td align="right" width="95"><label>Profissional:</label></td>
				<td align="left">
					<select name="profissional" class="text ui-widget-content ui-corner-all">
								<option value="<? echo $linhasprof[1]; ?>"><? echo utf8_encode($linhasprof[0]); ?></option>
								<option value="">------------</option>
								<? while ($linhasp = mysql_fetch_array($resultadop, MYSQL_NUM)){ ?>
								<option value=<? echo $linhasp[0];?>><? echo $linhasp[1];?></option>
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
								<option value=""></option>
								<? while ($linhascod = mysql_fetch_array($resultadocod, MYSQL_NUM)){ ?>
								<option value=<? echo $linhascod[0];?>><? echo $linhascod[0];?></option>
								<?};?>
							</select>
						</td>
						<td><input type="text" name="proc" id="proc" size=35 value="" class="text ui-widget-content ui-corner-all" readonly="readonly"></td>
						<td><input type="text" name="dente" id="dente" size=3 value="" class="text ui-widget-content ui-corner-all"></td>
						<td><input type="text" name="valor" id="valor" size=11 value="" class="text ui-widget-content ui-corner-all" readonly="readonly"></td>
					</tr>
					<tr>
						<td><select name="codconvenio2" id="codconvenio2" class="text ui-widget-content ui-corner-all">
								<option value=""></option>
								<? while ($linhascod2 = mysql_fetch_array($resultadocod2, MYSQL_NUM)){ ?>
								<option value=<? echo $linhascod2[0];?>><? echo $linhascod2[0];?></option>
								<?};?>
							</select>
						</td>
						<td><input type="text" name="proc2" id="proc2" size=35 value="" class="text ui-widget-content ui-corner-all" readonly="readonly"></td>
						<td><input type="text" name="dente2" id="dente2" size=3 value="" class="text ui-widget-content ui-corner-all"></td>
						<td><input type="text" name="valor2" id="valor2" size=11 value="" class="text ui-widget-content ui-corner-all" readonly="readonly"></td>
					</tr>
					<tr>
						<td><select name="codconvenio3" id="codconvenio3" class="text ui-widget-content ui-corner-all">
								<option value=""></option>
								<? while ($linhascod3 = mysql_fetch_array($resultadocod3, MYSQL_NUM)){ ?>
								<option value=<? echo $linhascod3[0];?>><? echo $linhascod3[0];?></option>
								<?};?>
							</select>
						</td>
						<td><input type="text" name="proc3" id="proc3" size=35 value="" class="text ui-widget-content ui-corner-all" readonly="readonly"></td>
						<td><input type="text" name="dente3" id="dente3" size=3 value="" class="text ui-widget-content ui-corner-all"></td>
						<td><input type="text" name="valor3" id="valor3" size=11 value="" class="text ui-widget-content ui-corner-all" readonly="readonly"></td>
					</tr>
					<tr>
						<td><select name="codconvenio4" id="codconvenio4" class="text ui-widget-content ui-corner-all">
								<option value=""></option>
								<? while ($linhascod4 = mysql_fetch_array($resultadocod4, MYSQL_NUM)){ ?>
								<option value=<? echo $linhascod4[0];?>><? echo $linhascod4[0];?></option>
								<?};?>
							</select>
						</td>
						<td><input type="text" name="proc4" id="proc4" size=35 value="" class="text ui-widget-content ui-corner-all" readonly="readonly"></td>
						<td><input type="text" name="dente4" id="dente4" size=3 value="" class="text ui-widget-content ui-corner-all"></td>
						<td><input type="text" name="valor4" id="valor4" size=11 value="" class="text ui-widget-content ui-corner-all" readonly="readonly"></td>
					</tr>
					<tr>
						<td><select name="codconvenio5" id="codconvenio5" class="text ui-widget-content ui-corner-all">
								<option value=""></option>
								<? while ($linhascod5 = mysql_fetch_array($resultadocod5, MYSQL_NUM)){ ?>
								<option value=<? echo $linhascod5[0];?>><? echo $linhascod5[0];?></option>
								<?};?>
							</select>
						</td>
						<td><input type="text" name="proc5" id="proc5" size=35 value="" class="text ui-widget-content ui-corner-all" readonly="readonly"></td>
						<td><input type="text" name="dente5" id="dente5" size=3 value="" class="text ui-widget-content ui-corner-all"></td>
						<td><input type="text" name="valor5" id="valor5" size=11 value="" class="text ui-widget-content ui-corner-all" readonly="readonly"></td>
					</tr>
				</tbody>
			</table>
	</div></td></tr></table><br>
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
