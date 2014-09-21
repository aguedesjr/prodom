<?
session_start(); 
require_once ("validalogin.php");

//Requer conexão previa com o banco
require_once ("configs/conn.php");

if ($_SESSION["perfil"] <> "ADMIN"){
  echo "<html><body><center>Você não está autorizado a abrir esta página<br>";
  echo "<a href='javascript:history.back(1)'>Voltar</a></center></body></html>";
  exit;
};

$sql = "SELECT login, id FROM users";
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
<form method="POST" action="editusuarios1.php" name="editusuarios1">
<div id="tabs">
	<ul>
		<li><a href="#tabs-1">Busca de Usuários</a></li>
	</ul>
	<div id="tabs-1">
		<table>
			<tr>
				<td align="right" width="95"><label>Usuário:</label></td>
				<td align="left">
					<select name="id" class="text ui-widget-content ui-corner-all">
								<option value="">SELECIONE</option>
								<? while ($linhas = mysql_fetch_array($resultado, MYSQL_NUM)){ ?>
								<option value=<? echo $linhas[1];?>><? echo $linhas[0];?></option>
								<?};?>
						</select>
				</td>
				<td><input type="hidden" name="metodo" value=""></td>
				<td><input type="submit" value="Editar" class="salvar" icon="ui-icon-pencil"/><br/></td>
			</tr>
		</table><br>
	</div>
</div>
</form>
</body>
</html>
