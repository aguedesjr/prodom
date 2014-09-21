<?
session_start(); 
require_once ("validalogin.php");

//Requer conexÃ£o previa com o banco
require_once ("configs/conn.php");

if (isset($_GET["procedimento"])){
  	$procedimento = utf8_decode($_GET["procedimento"]);
}else {if (isset($_POST["procedimento"])){
	$procedimento = utf8_decode($_POST["procedimento"]);
}};

$sql = "SELECT nome, codigo, valor, grupo, convenio, id FROM procedimentos WHERE id = '$procedimento'";
$resultado = mysql_query($sql);
$result = mysql_fetch_array($resultado);

$sql1 = "SELECT id, nome FROM convenios";
$resultado1 = mysql_query($sql1);

$sql2 = "SELECT id, nome FROM convenios WHERE id = '$result[4]'";
$resultado2 = mysql_query($sql2);
$result2 = mysql_fetch_array($resultado2);
?>

<!DOCTYPE html>
<html>
<head>
	<link rel='stylesheet' type='text/css' href='css/menu.css' />
	<script src='js/jquery-1.9.1.js'></script>
	<script src='js/jquery-ui-1.10.3.custom.js'></script>
	<script type="text/javascript" src="js/jquery.maskedinput.js"/></script>
	<script type="text/javascript" src="js/maskMoney.js"/></script>
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
   			$("#cel").mask("(99) 9999-9999");
   			$("#cep").mask("99999-999");
   			$("#cpf").mask("999.999.999-99");
   			$("#data").mask("99/99/9999");
		});
	</script>
	<script type="text/javascript">
		$(document).ready(function(){	 
	    	// Configuração para campos de Real.
	    	$("#valor").maskMoney({showSymbol:false, symbol:"R$", decimal:",", thousands:"."});
	});
	</script>
</head>
<body>
<? include ("menu.php"); ?>
<br>
<form method="POST" action="salvaprocedimento.php" name="salvaprocedimento">
<div id="tabs">
	<ul>
		<li><a href="#tabs-1">Editar Procedimentos</a></li>
	</ul>
	<div id="tabs-1">
		<table>
			<tr>
				<td align="right" width="95"><label>Nome:</label></td>
				<td align="left"><input type="text" name="nome" size=30 value="<?echo utf8_encode($result[0])?>" class="text ui-widget-content ui-corner-all"></td>
				<td align="right" width="70"><label>Código:</label></td>
				<td align="left"><input type="text" name="codigo" size=12 value="<?echo utf8_encode($result[1])?>" class="text ui-widget-content ui-corner-all"></td>
				<td align="right" width="70"><label>Valor:</label></td>
				<td align="left"><input type="text" name="valor" id="valor" size=10 value="<?echo $result[2]?>" class="text ui-widget-content ui-corner-all"></td>
			</tr>
		</table><br>
		<table>
			<tr>
				<td align="right" width="95"><label>Convênio:</label></td>
				<td align="left">
					<select name="convenio" class="text ui-widget-content ui-corner-all">
								<option value="<? echo utf8_encode($result2[0]);?>"><? echo utf8_encode($result2[1]);?></option>
								<option value="">---------------------</option>
								<? while ($linhas = mysql_fetch_array($resultado1, MYSQL_NUM)){ ?>
								<option value=<? echo utf8_encode($linhas[0]);?>><? echo utf8_encode($linhas[1]);?></option>
								<?};?>
						</select>
				</td>
				<td align="right" width="48"><label>Grupo:</label></td> 
				<td align="left"> 
						<select name="grupo" class="text ui-widget-content ui-corner-all">
								<option value="<? echo utf8_encode($result[3]);?>"><? echo utf8_encode($result[3]);?></option>
								<option value="">---------------------</option>
								<option value="DIAGNÓSTICOS">DIAGNÓSTICOS</option>
								<option value="PROFILAXIA">PROFILAXIA</option>
								<option value="DENTÍSTICA">DENTÍSTICA</option>
								<option value="ENDODONTIA">ENDODONTIA</option>
								<option value="PERIODONTIA">PERIODONTIA</option>
								<option value="CIRURGIA">CIRURGIA</option>
								<option value="PRÓTESE">PRÓTESE</option>
								<option value="ORTODONTIA">ORTODONTIA</option>
								<option value="IMPLANTOLOGIA">IMPLANTOLOGIA</option>
						</select>
				</td>
			</tr>
		</table><br>
		<table align="center">
			<tr>
				<td><input type="hidden" name="id" value="<?echo $result[5]?>"></td>
				<td><input type="hidden" name="metodo" value="alterar"></td>
				<td><input type="submit" value="Salvar" class="salvar" icon="ui-icon-disk"/><br/></td>
			</tr>
		</table>
	</div>
</div>
</form>
</body>
</html>
