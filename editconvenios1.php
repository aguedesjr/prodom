<?
session_start(); 
require_once ("validalogin.php");

//Requer conexÃ£o previa com o banco
require_once ("configs/conn.php");

if (isset($_GET["convenio"])){
  	$convenio = utf8_decode($_GET["convenio"]);
}else {if (isset($_POST["convenio"])){
	$convenio = utf8_decode($_POST["convenio"]);
}};

$sql = "SELECT nome, contato, telcom, cnpj, endereco, cep, bairro, telefone, celular, cidade, estado, id FROM convenios WHERE id = '$convenio'";
$resultado = mysql_query($sql);
$result = mysql_fetch_array($resultado);
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
   			$("#telcom").mask("(99) 9999-9999");
   			$("#cel").mask("(99) 99999-9999");
   			$("#cep").mask("99999-999");
   			$("#cnpj").mask("99.999.999/9999-99");
   			$("#data").mask("99/99/9999");
		});
	</script>
</head>
<body>
<? include ("menu.php"); ?>
<br>
<form method="POST" action="salvaconvenio.php" name="salvaconvenio">
<div id="tabs">
	<ul>
		<li><a href="#tabs-1">Editar Convênios</a></li>
	</ul>
	<div id="tabs-1">
		<table>
			<tr>
				<td align="right" width="95"><label>Nome:</label></td>
				<td align="left"><input type="text" name="nome" size=30 value="<?echo utf8_encode($result[0])?>" class="text ui-widget-content ui-corner-all"></td>
				<td align="right" width="51"><label>CNPJ:</label></td>
				<td align="left"><input type="text" name="cnpj" id="cnpj" size=14 value="<?echo $result[3]?>" class="text ui-widget-content ui-corner-all"></td>
				<td align="right" width="70"><label>Com:</label></td>
				<td align="left"><input type="text" name="telcom" id="telcom" size=12 value="<?echo $result[2]?>" class="text ui-widget-content ui-corner-all"></td>
			</tr>
		</table><br>
		<table>
			<tr>
				<td align="right" width="95"><label>Contato:</label></td>
				<td align="left"><input type="text" name="contato" size=28 value="<?echo utf8_encode($result[1])?>" class="text ui-widget-content ui-corner-all"></td>
				<td align="right" width="95"><label>Tel:</label></td>
				<td align="left"><input type="text" name="tel" id="tel" size=12 value="<?echo $result[7]?>" class="text ui-widget-content ui-corner-all"></td>
				<td align="right" width="48"><label>Cel:</label></td>
				<td align="left"><input type="text" name="cel" id="cel" size=13 value="<?echo $result[8]?>" class="text ui-widget-content ui-corner-all"></td>
			</tr>
		</table><br>
		<table>
			<tr>
				<td align="right" width="95"><label>Endereço:</label></td>
				<td align="left"><input type="text" name="endereco" size=51 value="<?echo $result[4]?>" class="text ui-widget-content ui-corner-all"></td>
				<td align="right" width="66"><label>CEP:</label></td>
				<td align="left"><input type="text" name="cep" id="cep" size=10 value="<?echo $result[5]?>" class="text ui-widget-content ui-corner-all"></td>
			</tr>
		</table><br>
		<table>
			<tr>
				<td align="right" width="95"><label>Bairro:</label></td>
				<td align="left"><input type="text" name="bairro" size=15 value="<?echo $result[6]?>" class="text ui-widget-content ui-corner-all"></td>
				<td align="right" width="70"><label>Cidade:</label></td>
				<td align="left"><input type="text" name="cidade" size=20 value="<?echo $result[9]?>" class="text ui-widget-content ui-corner-all"></td>
				<td align="right" width="48"><label>UF:</label></td> 
				<td align="left"> 
						<select name="estado" class="text ui-widget-content ui-corner-all">
								<option value="<?echo $result[10]?>"><?echo $result[10]?></option>
								<option value="">--------------</option>
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
				<td><input type="hidden" name="metodo" value="alterar"></td>
				<td><input type="hidden" name="id" value="<?echo $result[11]?>"></td>
				<td><input type="submit" value="Salvar" class="salvar" icon="ui-icon-disk"/><br/></td>
			</tr>
		</table>
	</div>
</div>
</form>
</body>
</html>
