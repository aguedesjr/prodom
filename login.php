<?
# Arquivo de verificacao de login e senha

//Requer conexao previa com o banco
require_once ("configs/conn.php");

// Obtem os dados do formulario de login
session_start();
$login = $_POST["user"]; //Recebe o login
$senha = $_POST["pass"]; //Recebe a senha

// trata os dados recebidos;
$login = str_replace(" ", "",$login);
$login = str_replace("/","",$login);
$login = str_replace(";","",$login);
$senha = str_replace(" ", "",$senha);
$senha = str_replace("/","",$senha);
$senha = str_replace(";","",$senha);

// Busca no banco de dados o usuario informado
//$resultado = mysql_query("SELECT login, senha, perfil, nome FROM users WHERE login = '$login' AND senha = ENCRYPT('" .$senha. "', senha);");
$resultado = mysql_query("SELECT login, senha, perfil FROM users WHERE login = '$login' AND senha = ENCRYPT('" .$senha. "', senha);");
$linhas = mysql_num_rows($resultado);

if ($linhas > 0){ //Verifica se encontrou algum usuário

  $_SESSION['autenticado']="sim";
  $_SESSION['login']=mysql_result($resultado,0,"login");
  $_SESSION['perfil']= mysql_result($resultado,0,"perfil");
  //$_SESSION['nome']= mysql_result($resultado,0,"nome");
  header ("location:inicio.php");
}
else{ //Caso não tenha encontrado, mostra um erro
?>
  <html>
  <head>
	<script type="text/javascript" src="js/jquery-1.9.1.js"></script>
	<link rel="stylesheet" href="css/cupertino/jquery-ui-1.10.3.custom.css">
	<link rel="stylesheet" href="css/cupertino/jquery-ui-1.10.3.custom.min.css">
	<script type="text/javascript" src="js/jquery-ui-1.10.3.custom.js"></script>
	<script type="text/javascript" src="js/jquery-ui-1.10.3.custom.min.js"></script>
	<script>
	$(function() { //Funcao para criar o botão de voltar para a pagina inicial
		$( "input:a", ".botao" ).button(); //Cria a funcao com a tag "a href" como botao
		$( ".botao a:first" ).button({ //Adiciona a tag "a" um icone
			icons: { primary: "ui-icon-circle-arrow-w" } //Especificacao do icone
			});
		$( "a", ".botao" ).click(function() { return true; });	//Habilita ao botao a acao a ser executada com o "true"
		});
	</script>
  </head>
    <title>Erro de autenticacação</title>
    <body align="center">

		<div class="ui-widget">
			<div class="ui-state-error ui-corner-all" style="margin-top: 100px; margin-left: 450px; margin-right: 400; padding: 0 .7em;"> 
			<center><p><strong>Erro:</strong> Usuário ou senha não conferem</p></center>
			</div>
		</div><br><br>
		<center> <div class="botao">
			<a href="index.php">Voltar</a>
		</div> </center>        

<!-- <font face="Verdana, Arial, Helvetica, sans-serif" color="#0066FF" size="+3">Usuário ou senha não conferem.</font><br>
        <a href="javascript:history.back(1)">Voltar</a> -->

    </body>
  </html>
  <? };
  mysql_free_result($resultado);
//  mysql_close($conexao);

?>

