<?
session_start(); 
require_once ("validalogin.php");

//Requer conexÃ£o previa com o banco
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
		jQuery(function($){
   			$("#tel").mask("(99) 9999-9999");
   			$("#cel").mask("(99) 99999-9999");
   			$("#cep").mask("99999-999");
   			$("#cpf").mask("999.999.999-99");
   			$("#data").mask("99/99/9999");
		});
	</script>
</head>
<body>
<? include ("menu.php"); ?>
<br>
<form method="POST" action="salvapaciente.php" name="salvapaciente">
<div id="tabs">
	<ul>
		<li><a href="#tabs-1">Cadastro de Pacientes</a></li>
	</ul>
	<div id="tabs-1">
		<table>
			<tr>
				<td align="right" width="95"><label>Nome:</label></td>
				<td align="left"><input type="text" name="nome" size=30 value="" class="text ui-widget-content ui-corner-all"></td>
				<td align="right" width="70"><label>CPF:</label></td>
				<td align="left"><input type="text" name="cpf" id="cpf" size=12 value="" class="text ui-widget-content ui-corner-all"></td>
				<td align="right" width="70"><label>Dt Nasc:</label></td>
				<td align="left"><input type="text" name="data" id="data" size=10 value="" class="text ui-widget-content ui-corner-all"></td>
			</tr>
		</table><br>
		<table>
			<tr>
				<td align="right" width="95"><label>Matricula:</label></td>
				<td align="left"><input type="text" name="matricula" size=28 value="" class="text ui-widget-content ui-corner-all"></td>
				<td align="right" width="92"><label>Tel:</label></td>
				<td align="left"><input type="text" name="tel" id="tel" size=12 value="" class="text ui-widget-content ui-corner-all"></td>
				<td align="right" width="48"><label>Cel:</label></td>
				<td align="left"><input type="text" name="cel" id="cel" size=13 value="" class="text ui-widget-content ui-corner-all"></td>
			</tr>
		</table><br>
		<table>
			<tr>
				<td align="right" width="95"><label>Endereço:</label></td>
				<td align="left"><input type="text" name="endereco" size=51 value="" class="text ui-widget-content ui-corner-all"></td>
				<td align="right" width="66"><label>CEP:</label></td>
				<td align="left"><input type="text" name="cep" id="cep" size=10 value="" class="text ui-widget-content ui-corner-all"></td>
			</tr>
		</table><br>
		<table>
			<tr>
				<td align="right" width="95"><label>Bairro:</label></td>
				<td align="left"><input type="text" name="bairro" size=15 value="" class="text ui-widget-content ui-corner-all"></td>
				<td align="right" width="70"><label>Cidade:</label></td>
				<td align="left"><input type="text" name="cidade" size=20 value="" class="text ui-widget-content ui-corner-all"></td>
				<td align="right" width="48"><label>UF:</label></td> 
				<td align="left"> 
						<select name="estado" class="text ui-widget-content ui-corner-all">
								<option value="">SELECIONE</option>
								<option value="ACRE">ACRE</option>
								<option value="ALAGOAS">ALAGOAS</option>
								<option value="AMAPÁ">AMAPÁ</option>
								<option value="AMAZONAS">AMAZONAS</option>
								<option value="BAHIA">BAHIA</option>
								<option value="CEARÁ">CEARÁ</option>
								<option value="DISTRITO FEDERAL">DISTRITO FEDERAL</option>
								<option value="ESPIRITO SANTO">ESPIRITO SANTO</option>
								<option value="GOIÁS">GOIÁS</option>
								<option value="MARANHÃO">MARANHÃO</option>
								<option value="MATO GROSSO DO SUL">MATO GROSSO DO SUL</option>
								<option value="MATO GROSSO">MATO GROSSO</option>
								<option value="MINAS GERAIS">MINAS GERAIS</option>
								<option value="PARÁ">PARÁ</option>
								<option value="PARAÍBA">PARAÍBA</option>
								<option value="PARANÁ">PARANÁ</option>
								<option value="PERNAMBUCO">PERNAMBUCO</option>
								<option value="PIAUÍ">PIAUÍ</option>
								<option value="RIO DE JANEIRO">RIO DE JANEIRO</option>
								<option value="RIO GRANDE DO NORTE">RIO GRANDE DO NORTE</option>
								<option value="RIO GRANDE DO SUL">RIO GRANDE DO SUL</option>
								<option value="RONDÔNIA">RONDÔNIA</option>
								<option value="RORAIMA">RORAIMA</option>
								<option value="SANTA CATARINA">SANTA CATARINA</option>
								<option value="SÃO PAULO">SÃO PAULO</option>
								<option value="SERGIPE">SERGIPE</option>
								<option value="TOCANTINS">TOCANTINS</option>
						</select>
				</td>
			</tr>
		</table><br>
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
