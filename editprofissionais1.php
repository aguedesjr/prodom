<?
session_start(); 
require_once ("validalogin.php");

//Requer conexão previa com o banco
require_once ("configs/conn.php");

if (isset($_GET["profissional"])){
  	$profissional = utf8_decode($_GET["profissional"]);
}else {if (isset($_POST["profissional"])){
	$profissional = utf8_decode($_POST["profissional"]);
}};

$sql = "SELECT nome, crmcro, id, tipo FROM profissionais WHERE id = '$profissional'";
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
	</script>
</head>
<body>
<? include ("menu.php"); ?>
<br>
<form method="POST" action="salvaprofissional.php" name="salvaprofissional">
<div id="tabs">
	<ul>
		<li><a href="#tabs-1">Editar Profissionais</a></li>
	</ul>
	<div id="tabs-1">
		<table>
			<tr>
				<td align="right" width="95"><label>Nome:</label></td>
				<td align="left"><input type="text" name="nome" size=30 value="<?echo utf8_encode($result[0])?>" class="text ui-widget-content ui-corner-all"></td>
				<td align="right" width="51"><label>Tipo:</label></td>
				<td align="left"> 
						<select name="tipo" class="text ui-widget-content ui-corner-all">
								<option value="<?echo $result[3]?>"><?echo $result[3]?></option>
								<option value="">----</option>
								<option value="CRM">CRM</option>
								<option value="CRO">CRO</option>
						</select>
				</td>
				<td align="right" width="70"><label>Inscrição:</label></td>
				<td align="left"><input type="text" name="crmcro" id="crmcro" size=14 value="<?echo $result[1]?>" class="text ui-widget-content ui-corner-all"></td>
				<td><input type="hidden" name="metodo" value="alterar"></td>
				<td><input type="hidden" name="id" value="<?echo $result[2]?>"></td>
				<td><input type="submit" value="Salvar" class="salvar" icon="ui-icon-disk"/><br/></td>
			</tr>
		</table><br>
	</div>
</div>
</form>
</body>
</html>
