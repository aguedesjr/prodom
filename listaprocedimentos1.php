<?
session_start(); 
require_once ("validalogin.php");

//Requer conexão previa com o banco
require_once ("configs/conn.php");

if (isset($_GET["convenio"])){
  	$convenio = utf8_decode($_GET["convenio"]);
}else {if (isset($_POST["convenio"])){
	$convenio = utf8_decode($_POST["convenio"]);
}};

//Busca o nome dos convenios
$sql = "SELECT codigo, nome, valor FROM procedimentos WHERE convenio = '$convenio'";
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
			$("#tabs").tabs();
			$('input[type="submit"]').each(function() {
				$(this).hide().after('<button>').next().button({
					icons : {
						primary : $(this).attr('icon')
					},
					label : $(this).val()
				}).click(function(event) {
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


<form>
<div id="tabs">
	<ul>
		<li><a href="#tabs-1">Lista de Procedimentos</a></li>
	</ul>
	<div id="tabs-1">
		<table><tr><td align="right">
		<div id="users-contain" class="ui-widget">
			<table id="users" class="ui-widget ui-widget-content">
				<thead>
					<tr class="ui-widget-header ">
						<th>Código</th>
						<th>Procedimento</th>
						<th>Valor R$</th>
					</tr>
				</thead>
				<tbody>
					<? while ($linhas = mysql_fetch_array($resultado, MYSQL_NUM)){ ?>
					<tr>
						<td><input type="text" name="codigo" size=5 value="<? echo utf8_encode($linhas[0]);?>" class="text ui-widget-content ui-corner-all" readonly="readonly"></td>
						<td><input type="text" name="procedimento" size=50 value="<? echo utf8_encode($linhas[1]);?>" class="text ui-widget-content ui-corner-all" readonly="readonly"></td>
						<td><input type="text" name="valor" size=11 value="<? echo utf8_encode($linhas[2]);?>" class="text ui-widget-content ui-corner-all" readonly="readonly"></td>
					</tr>
					<?};?>
				</tbody>
			</table>
	</div></td></tr></table><br>
		<!--<table align="center">
			<tr>
				<td><input type="hidden" name="metodo" value="incluir"></td>
				<td><input type="submit" value="Salvar" class="salvar" icon="ui-icon-disk"/><br/></td>
			</tr>
		</table>-->
	</div>
</div>
</form>
</body>
</html>
