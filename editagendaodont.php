<?
session_start(); 
require_once ("validalogin.php");

//Requer conexão previa com o banco
require_once ("configs/conn.php");

if (isset($_GET["id"])){
  	$id = utf8_decode($_GET["id"]);
}else {if (isset($_POST["id"])){
	$id = utf8_decode($_POST["id"]);
}};

//Busca as informa��es da agenda
$sqla = "SELECT codprof, nomepaciente, data, horario FROM agenda WHERE id = '$id'";
$resultadoa = mysql_query($sqla);
$resulta = mysql_fetch_array($resultadoa);

//Busca o nome dos profissionais
$sqlp = "SELECT nome FROM profissionais WHERE id = '$resulta[0]'";
$resultadop = mysql_query($sqlp);
$resultp = mysql_fetch_array($resultadop);

//Busca o nome dos profissionais para a combo
$sqlprof = "SELECT id, nome FROM profissionais";
$resultadoprof = mysql_query($sqlprof);

//Data no formato do banco de dados
$datan = implode("/", array_reverse(explode("-", $resulta[2])));

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
			$("#data").datepicker({
			    dateFormat: 'dd/mm/yy',
			    dayNames: ['Domingo','Segunda','Terça','Quarta','Quinta','Sexta','Sábado'],
			    dayNamesMin: ['D','S','T','Q','Q','S','S','D'],
			    dayNamesShort: ['Dom','Seg','Ter','Qua','Qui','Sex','Sáb','Dom'],
			    monthNames: ['Janeiro','Fevereiro','Março','Abril','Maio','Junho','Julho','Agosto','Setembro','Outubro','Novembro','Dezembro'],
			    monthNamesShort: ['Jan','Fev','Mar','Abr','Mai','Jun','Jul','Ago','Set','Out','Nov','Dez'],
			    nextText: 'Próximo',
			    prevText: 'Anterior',
			    showOn: "button",
				buttonImage: "imagens/calendar.gif",
				buttonImageOnly: true
			});
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
			$('input[name="pesquisar"]').each(function () {
			   $(this).hide().after('<button>').next().button({
			        icons: { primary: $(this).attr('icon') },
			        label: $(this).val()
			    }).click(function (event) {
			         event.preventDefault();
			         $(this).prev().click();
			    });
			});
		});
	</script>
<script type="text/javascript">
  		$(document).ready(function(){
    		
    		$.ajax({
               url: 'buscaDados.php',
               type: 'POST',
               dataType: 'json',
               success: function(data){
                     $('#buscanome').autocomplete(
                     {
                           source: data,
                           minLength: 2
                     });
               }
          });
 	 	});
</script>
</head>
<body>
<? include ("menu.php"); ?>
<br>


<form method="POST" action="salvaagenda.php" name="salvaagenda">
<div id="tabs">
	<ul>
		<li><a href="#tabs-1">Editar Marcação</a></li>
	</ul>
	<div id="tabs-1">
		<table>
			<tr>
				<td align="right" width="95"><label>Nome:</label></td>
				<td align="left"><input type="text" name="buscanome" id="buscanome" size=30 value="<? echo utf8_encode($resulta[1]);?>" class="text ui-widget-content ui-corner-all"></td>
				<!--<td><input type="button" value="Pesq" name="pesquisar" id="create-user" icon="ui-icon-search"/><br/></td>-->
				<td align="right" width="75"><label>Horário:</label></td>
				<td align="left">
					<select name="horario" id="horario" class="text ui-widget-content ui-corner-all">
								<option value="<? echo $resulta[3];?>"><? echo $resulta[3];?></option>
								<option value="">---------</option>
								<?
								for ($i = 07; $i < 22; $i++) {
								    $num = $i > 23 ? $i - 24 : $i;
								    $num = $num < 10 ? "0$num" : $num;
								    $ampm = $num > 11 && $num < 24 ? 'PM' : 'AM';
								    echo "<option value=\"$num:00\"> $num:00 $ampm</option>\n";
								    if ($num != 5)
								        echo "<option value=\"$num:30\"> $num:30 $ampm</option>\n";
								}
								?>
						</select>
				</td>
			</tr>
		</table><br>
		<table>
			<tr>
				<td align="right" width="95"><label>Data:</label></td>
				<td align="left"><input type="text" name="data" id="data" size=10 value="<? echo $datan;?>" class="text ui-widget-content ui-corner-all"></td>
				<td align="right" width="75"><label>Profissional:</label></td>
				<td align="left">
					<select name="profissional" class="text ui-widget-content ui-corner-all">
								<option value="<? echo $resulta[0];?>"><? echo utf8_encode($resultp[0]);?></option>
								<option value="">---------</option>
								<? while ($linhasprof = mysql_fetch_array($resultadoprof, MYSQL_NUM)){ ?>
									<option value=<? echo $linhasprof[0];?>><? echo utf8_encode($linhasprof[1]);?></option>
								<?};?>
						</select>
				</td>
			</tr>
		</table><br>	
		<table align="center">
			<tr>
				<td><input type="hidden" name="id" value="<? echo $id;?>"></td>
				<td><input type="hidden" name="metodo" value="alterar"></td>
				<td><input type="submit" value="Salvar" class="salvar" icon="ui-icon-disk"/><br/></td>
			</tr>
		</table>
	</div>
</div>
</form>
</body>
</html>
