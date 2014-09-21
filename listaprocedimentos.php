<?
session_start();
require_once ("validalogin.php");

//Requer conexão previa com o banco
require_once ("configs/conn.php");

$sqlc = "SELECT nome, id FROM convenios";
$resultadoc = mysql_query($sqlc);
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
<?
	include ("menu.php");
 ?>
<br>
<form method="POST" action="listaprocedimentos1.php" name="listaprocedimentos1">
<div id="tabs">
	<ul>
		<li><a href="#tabs-1">Lista de Procedimentos</a></li>
	</ul>
	<div id="tabs-1">
		<table>
			<tr>
				<td align="right" width="95"><label>Convênio:</label></td>
				<td align="left">
					<select name="convenio" id="convenio" class="text ui-widget-content ui-corner-all">
								<option value="">SELECIONE</option>
								<? while ($linhasc = mysql_fetch_array($resultadoc, MYSQL_NUM)){ ?>
								<option value=<? echo $linhasc[1]; ?>><? echo utf8_encode($linhasc[0]); ?></option>
								<?}; ?>
						</select>
				</td>
				<td><input type="hidden" name="metodo" value=""></td>
				<td><input type="submit" value="Listar" class="salvar" icon="ui-icon-search"/><br/></td>
			</tr>
		</table><br>
	</div>
</div>
</form>
</body>
</html>
