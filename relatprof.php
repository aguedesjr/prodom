<?
session_start(); 
require_once ("validalogin.php");

//Requer conexão previa com o banco
require_once ("configs/conn.php");

$sql = "SELECT nome, id FROM profissionais";
$resultado = mysql_query($sql);
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
<form method="POST" action="gerarelatprof.php" name="gerarelatprof">
<div id="tabs">
	<ul>
		<li><a href="#tabs-1">Relatório por Profissional</a></li>
	</ul>
	<div id="tabs-1">
		<table>
			<tr>
				<td align="right" width="95"><label>Profissional:</label></td>
				<td align="left">
					<select name="profissional" class="text ui-widget-content ui-corner-all">
								<option value="">SELECIONE</option>
								<? while ($linhas = mysql_fetch_array($resultado, MYSQL_NUM)){ ?>
								<option value=<? echo $linhas[1];?>><? echo utf8_encode($linhas[0]);?></option>
								<?};?>
						</select>
				</td>
				<td align="right" width="50"><label>Mês:</label></td>
				<td align="left">
					<select name="mes" class="text ui-widget-content ui-corner-all">
								<option value="">SELECIONE</option>
								<option value="01">Janeiro</option>
								<option value="02">Fevereiro</option>
								<option value="03">Março</option>
								<option value="04">Abril</option>
								<option value="05">Maio</option>
								<option value="06">Junho</option>
								<option value="07">Julho</option>
								<option value="08">Agosto</option>
								<option value="09">Setembro</option>
								<option value="10">Outubro</option>
								<option value="11">Novembro</option>
								<option value="12">Dezembro</option>
						</select>
				</td>
				<td align="right" width="50"><label>Ano:</label></td>
				<td align="left"><input type="text" name="ano" id="ano" size=5 value="" class="text ui-widget-content ui-corner-all"></td>
				<td><input type="hidden" name="metodo" value=""></td>
				<td><input type="submit" value="Gerar" class="salvar" icon="ui-icon-print"/><br/></td>
			</tr>
		</table><br>
	</div>
</div>
</form>
</body>
</html>
