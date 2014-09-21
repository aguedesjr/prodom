<?
session_start(); 
require_once ("validalogin.php");

//Requer conexão previa com o banco
require_once ("configs/conn.php");

//Busca o nome dos profissionais
$sqlp = "SELECT id, nome FROM profissionais";
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
			         //alert("Dados salvos!!!!");
			         $(this).prev().click();
			    });
			});
		});
	</script>
</head>
<body>
<? include ("menu.php"); ?>
<br>


<form method="POST" action="buscaagendaodont.php" name="buscaagendaodont">
<div id="tabs">
	<ul>
		<li><a href="#tabs-1">Agenda dos Profissionais</a></li>
	</ul>
	<div id="tabs-1">
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
				<td><input type="hidden" name="metodo" value="incluir"></td>
				<td><input type="submit" value="Procurar" class="salvar" icon="ui-icon-search"/><br/></td>
			</tr>
		</table><br>
	</div>
</div>
</form>
</body>
</html>
