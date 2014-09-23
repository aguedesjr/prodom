<?
session_start(); 
require_once ("validalogin.php");

//Requer conexão previa com o banco
require_once ("configs/conn.php");
?>

<!DOCTYPE html>
<html>
<head>
	<link rel='stylesheet' type='text/css' href='css/menu.css' />
	<link rel="shortcut icon" type="image/x-icon" href="imagens/PRODOM.ico"/>
	<script src='http://ajax.googleapis.com/ajax/libs/jquery/1.10.2/jquery.min.js'></script>
	<meta charset="UTF-8">
</head>
<body>
<? include ("menu.php"); ?>
<br><br><br><br>
<table align="center">
	<tr>
		<td>
			<!--<input type="image" src="imagens/Prodom_Logo1.jpg"><br>-->
			<!--<input type="image" src="imagens/Wallpaper.jpg"><br>-->
			<img src="imagens/Wallpaper.jpg" width="1200" height="600" />
		</td>
	</tr>
</table>
</body>
</html>
