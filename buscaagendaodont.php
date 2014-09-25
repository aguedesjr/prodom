<?
session_start(); 
require_once ("validalogin.php");

//Requer conexão previa com o banco
require_once ("configs/conn.php");

if (isset($_GET["data"])){
  		$data = utf8_decode($_GET["data"]);
	}else {if (isset($_POST["data"])){
  		$data = utf8_decode($_POST["data"]);
}};

if (isset($_GET["profissional"])){
  		$profissional = utf8_decode($_GET["profissional"]);
	}else {if (isset($_POST["profissional"])){
  		$profissional = utf8_decode($_POST["profissional"]);
}};

//Data no formato do banco de dados
$datan = implode("-", array_reverse(explode("/", $data)));

//Busca o nome dos profissionais
$sqlp = "SELECT nome FROM profissionais WHERE id = '$profissional'";
$resultadop = mysql_query($sqlp);
$resultp = mysql_fetch_array($resultadop);

//Busca os horarios dos profissionais
$sqlh = "SELECT nomepaciente, horario, id FROM agenda WHERE codprof = '$profissional' AND data = '$datan' ORDER BY horario";
$resultadoh = mysql_query($sqlh);


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
			         //alert("Dados salvos!!!!");
			         $(this).prev().click();
			    });
			});
			$('a[name="novo"]').each(function () {
			   $(this).button({icons: {primary: "ui-icon-document"}});
			   $(this).click();
			});
			$('a[name="voltar"]').each(function () {
               $(this).button({icons: {primary: "ui-icon-arrowthick-1-w"}});
               $(this).click();
            });
			$('a[name="editar"]').each(function () {
			   $(this).button({icons: {primary: "ui-icon-pencil"}});
			   $(this).click();
			});
			$('a[name="excluir"]').each(function () {
			   $(this).button({icons: {primary: "ui-icon-closethick"}});
			   $(this).click();
			});
		});
	</script>
</head>
<body>
<? include ("menu.php"); ?>
<br>


<form method="POST" action="salvaaut.php" name="salvaaut">
<div id="tabs">
	<ul>
		<li><a href="#tabs-1">Agenda dos Profissionais</a></li>
	</ul>
	<div id="tabs-1">
		<table>
			<tr>
				<td align="right" width="95"><label>Profissional:</label></td>
				<td align="left"><input type="text" name="nomeprofissional" id="nomeprofissional" readonly="readonly" size=30 value="<? echo utf8_encode($resultp[0]);?>" class="text ui-widget-content ui-corner-all"></td>
				<!--<td><input type="button" value="Pesq" name="pesquisar" id="create-user" icon="ui-icon-search"/><br/></td>-->
				<td align="right" width="60"><label>Data:</label></td>
				<td align="left"><input type="text" name="data1" id="data1" readonly="readonly" size=10 value="<? echo $data;?>" class="text ui-widget-content ui-corner-all"></td>
				<td><a name="novo" href="novoagendaodont.php?data=<? echo $data;?>&profissional=<? echo $profissional;?>">Novo</a> <br/></td>
				<td><a name="voltar" href="agendaodont.php">Voltar</a> <br/></td>
		</table><br>
		<table><tr><td align="right">
		<div id="users-contain" class="ui-widget">
			<table id="users" class="ui-widget ui-widget-content">
				<thead>
					<tr class="ui-widget-header ">
						<th>Horário</th>
						<th>Nome</th>
						<th colspan="2">Ação</th>
					</tr>
				</thead>
				<tbody>
					<? while ($linhash = mysql_fetch_array($resultadoh, MYSQL_NUM)){ ?>
					<tr>
						<td><input type="text" name="horario" size=3 value="<? echo $linhash[1];?>" class="text ui-widget-content ui-corner-all" readonly="readonly"></td>
						<td><input type="text" name="nomepaciente" size=35 value="<? echo utf8_encode($linhash[0]);?>" class="text ui-widget-content ui-corner-all" readonly="readonly"></td>
						<td><a name="editar" href="editagendaodont.php?id=<? echo $linhash[2];?>">Editar</a></td>
						<td><a name="excluir" href="salvaagenda.php?metodo=excluir&id=<? echo $linhash[2];?>">Excluir</a></td>
					</tr>
					<?};?>
				</tbody>
			</table>
	</div></td></tr></table><br>
		<table align="center">
			<tr>
				<!--<td><input type="hidden" name="metodo" value="incluir"></td>
				<td><input type="submit" value="Salvar" class="salvar" icon="ui-icon-disk"/><br/></td>-->
			</tr>
		</table>
	</div>
</div>
</form>
</body>
</html>
