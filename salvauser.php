<?
session_start();
//Requer autenticação
require_once ("validalogin.php");
//Requer conexão previa com o banco
require_once ("configs/conn.php");
//Classe usada para gerar log
//include ("geralog.class.php");
// Verifica o perfil do usuário logado
//if ($_SESSION["perfil"] <> "ADMIN"){
 // echo "Você não está autorizado a abrir esta página";
  //header("location:index.php");
  //exit;
//};

//$log = new MyLogPHP('./log/system.log'); //Inicia o objeto para geracao dos logs

//$ip = getenv('REMOTE_ADDR'); //Pega o IP do micro que está usando o sistema

// Verifica se as vaiáveis de POST ou GET existem;
if (isset($_GET["metodo"])){
  $metodo=$_GET["metodo"];
} else { if (isset($_POST["metodo"])){
  $metodo = $_POST["metodo"];
}};

if (isset($_GET["login"])){
  $login = utf8_decode($_GET["login"]);
}else {if (isset($_POST["login"])){
  $login = utf8_decode($_POST["login"]);
}};
if (isset($_GET["senha"])){
  $senha = utf8_decode($_GET["senha"]);
}else {if (isset($_POST["senha"])){
  $senha = utf8_decode($_POST["senha"]);
}};
if (isset($_GET["permissao"])){
  $permissao = $_GET["permissao"];
}else {if (isset($_POST["permissao"])){
  $permissao = $_POST["permissao"];
}};
if (isset($_GET["id"])){
  	$id = utf8_decode($_GET["id"]);
}else {if (isset($_POST["id"])){
	$id = utf8_decode($_POST["id"]);
}};

// Vefifica o método a ser aplicado e define o sql para a execução do mesmo
if ($metodo == "alterar"){
  $sql = "UPDATE users SET login='$login', senha=ENCRYPT('$senha'), perfil='$permissao' WHERE id = '$id';";
  //$log->info($login, $perfil, $ip, 'Nome: ', 'Usuário logado: ', $nome, $_SESSION[login], 'Alterado Login: ', 'Perfil: ', 'IP: '); 
} elseif ($metodo =="incluir") {
    $sql = "INSERT INTO users (login,senha,perfil) VALUES ('$login',ENCRYPT('$senha'),'$permissao');";
    //$log->info($login, $perfi,'$cep','$bairro','$tel','$cel','$cidade','$estado'l, $ip, 'Nome: ', 'Usuário logado: ', $nome, $_SESSION[login], 'Criado Login: ', 'Perfil: ', 'IP: '); 
  }elseif ($metodo =="excluir"){
    $sql = "DELETE FROM users WHERE id = '$id';";
    //$log->info($login, $perfil, $ip, 'Nome: ', 'Usuário logado: ', $nome, $_SESSION[login], 'Apagado Login: ', 'Perfil: ', 'IP: ');
  };
// Executa o comando SQL
mysql_query($sql);
// Finaliza a conexão com o banco de dados
mysql_close($conexao);
// Redireciona para a página de usuários
header("location:cadusuarios.php");
 ?>

