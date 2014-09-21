<?
session_start(); 
require_once ("validalogin.php");

//Requer conexão previa com o banco
require_once ("configs/conn.php");
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
			         alert("Dados salvos!!!!");
			         $(this).prev().click();
			    });
			});
		});
	</script>
</head>
<body>
<? include ("menu.php"); ?>
<br>
<form method="POST" action="salvaprofissional.php" name="salvaprofissional">
<div id="tabs">
	<ul>
		<li><a href="#tabs-1">Cadastro de Profissionais</a></li>
	</ul>
	<div id="tabs-1">
		<table>
			<tr>
				<td align="right" width="95"><label>Nome:</label></td>
				<td align="left"><input type="text" name="nome" size=30 value="" class="text ui-widget-content ui-corner-all"></td>
				<td align="right" width="70"><label>Tipo:</label></td>
				<td align="left"> 
						<select name="tipo" class="text ui-widget-content ui-corner-all">
								<option value=""></option>
								<option value="CRM">CRM</option>
								<option value="CRO">CRO</option>
						</select>
				</td>
				<td align="right" width="70"><label>Inscrição:</label></td>
				<td align="left"><input type="text" name="crmcro" size=12 value="" class="text ui-widget-content ui-corner-all"></td>
				<td><input type="hidden" name="metodo" value="incluir"></td>
				<td><input type="submit" value="Salvar" class="salvar" icon="ui-icon-disk"/><br/></td>
			</tr>
		</table><br>
	</div>
</div>
</form>
</body>
</html>
