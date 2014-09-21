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

if (isset($_GET["id"])){
  	$id = utf8_decode($_GET["id"]);
}else {if (isset($_POST["id"])){
	$id = utf8_decode($_POST["id"]);
}};

$sql = "SELECT login, senha, perfil, id FROM users WHERE id = '$id'";
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
<form method="POST" action="salvauser.php" name="salvauser">
<div id="tabs">
	<ul>
		<li><a href="#tabs-1">Editar Usuários</a></li>
	</ul>
	<div id="tabs-1">
		<table>
			<tr>
				<td align="right" width="95"><label>Login:</label></td>
				<td align="left"><input type="text" name="login" size=12 value="<?echo utf8_encode($result[0])?>" class="text ui-widget-content ui-corner-all"></td>
				<td align="right" width="70"><label>Senha:</label></td>
				<td align="left"><input type="password" name="senha" size=12 value="<?echo utf8_encode($result[1])?>" class="text ui-widget-content ui-corner-all"></td>
			</tr>
		</table><br>
		<table>
			<tr>
				<td align="right" width="95"><label>Perfil:</label></td> 
				<td align="left"> 
						<select name="permissao" class="text ui-widget-content ui-corner-all">
								<option value="<?echo $result[2]?>"><?echo $result[2]?></option>
								<option value="">-------------</option>
								<option value="ADMIN">ADMIN</option>
								<option value="USER">USER</option>
						</select>
				</td>
			</tr>
		</table><br>
		<table align="center">
			<tr>
				<td><input type="hidden" name="id" value="<?echo $result[3]?>"></td>
				<td><input type="hidden" name="metodo" value="alterar"></td>
				<td><input type="submit" value="Salvar" class="salvar" icon="ui-icon-disk"/><br/></td>
			</tr>
		</table>
	</div>
</div>
</form>
</body>
</html>

