<?
  session_start();
?>
<html>
<head>
        <script type="text/javascript" src="js/jquery-1.9.1.js"></script>
        <link rel="stylesheet" href="css/cupertino/jquery-ui-1.10.3.custom.css">
        <link rel="stylesheet" href="css/cupertino/jquery-ui-1.10.3.custom.min.css">
        <link rel="shortcut icon" type="image/x-icon" href="imagens/PRODOM.ico"/>
        <script type="text/javascript" src="js/jquery-ui-1.10.3.custom.js"></script>
        <script type="text/javascript" src="js/jquery-ui-1.10.3.custom.min.js"></script>

	<script>
	$(function() { //Funcao para criar o botão de voltar para a pagina inicial
		$( "input:a", ".botao" ).button(); //Cria a funcao com a tag "a href" como botao
		$( ".botao a:first" ).button({ //Adiciona a tag "a" um icone
			icons: { primary: "ui-icon-home" } //Especificacao do icone
			});
		$( "a", ".botao" ).click(function() { return true; });	//Habilita ao botao a acao a ser executada com o "true"
		});
	</script>
</head>
<body align="center">

	<div class="ui-widget">
		<div class="ui-state-highlight ui-corner-all" style="margin-top: 100px; margin-left: 450px; margin-right: 400; padding: 0 .7em;"> 
			<center><p>Você foi desconectado!</p></center>
		</div>
	</div><br><br>
	<? //Codigo de logout
		$_SESSION = array();
		session_destroy(); //Encerra a sessao
		unset($_SESSION[login]); //Limpa o login
		//unset($_SESSION[perfil]); //Limpa o perfil
		//unset($_SESSION[nome]); //Limpa a senha
	?>
	<center> <div class="botao">
		<a href="index.php">Inicio</a>
	</div> </center>
</body>
</html>
