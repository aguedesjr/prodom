<?
session_start();
require_once ("validalogin.php");

//Requer conexão previa com o banco
require_once ("configs/conn.php");

$sql = "SELECT nome, id, convenio FROM procedimentos";
$resultado = mysql_query($sql);

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
			$('#convenio').change(function(){
				if( $(this).val() ) {					
					$.getJSON('getproc.php?search=',{convenio: $(this).val(), ajax: 'true'}, function(j){
						var options = '<option value=""></option>';	
						for (var i = 0; i < j.length; i++) {
							options += '<option value="' + j[i].id + '">' + j[i].nome + '</option>';	
						}
						$('#procedimento').html(options).show();
					});
				}
			});
		});
	</script>
</head>
<body>
<?
	include ("menu.php");
 ?>
<br>
<form method="POST" action="editprocedimentos1.php" name="editprocedimentos1">
<div id="tabs">
	<ul>
		<li><a href="#tabs-1">Busca de Procedimentos</a></li>
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
				<td align="right" width="95"><label>Procedimento:</label></td>
				<td align="left">
					<select name="procedimento" id="procedimento" class="text ui-widget-content ui-corner-all">
								<!--<option value="">SELECIONE</option>
								<? while ($linhas = mysql_fetch_array($resultado, MYSQL_NUM)){
									$sql2 = "SELECT nome FROM convenios WHERE id = '$linhas[2]'";
									$resultado2 = mysql_query($sql2);
									$result2 = mysql_fetch_array($resultado2); 
								?>
								
								<option value=<? echo $linhas[1]; ?>><? echo utf8_encode($linhas[0]) . ' - ' . utf8_encode($result2[0]); ?></option>
								<?}; ?>-->
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
