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

if (isset($_GET["buscanome"])){
  $nome = utf8_decode($_GET["buscanome"]);
}else {if (isset($_POST["buscanome"])){
  $nome = utf8_decode($_POST["buscanome"]);
}};
if (isset($_GET["horario"])){
  $horario = utf8_decode($_GET["horario"]);
}else {if (isset($_POST["horario"])){
  $horario = utf8_decode($_POST["horario"]);
}};
if (isset($_GET["profissional"])){
  $profissional = $_GET["profissional"];
}else {if (isset($_POST["profissional"])){
  $profissional = $_POST["profissional"];
}};
if (isset($_GET["data1"])){
  	$data1 = utf8_decode($_GET["data1"]);
}else {if (isset($_POST["data1"])){
	$data1 = utf8_decode($_POST["data1"]);
}};
if (isset($_GET["data"])){
  	$data = utf8_decode($_GET["data"]);
}else {if (isset($_POST["data"])){
	$data = utf8_decode($_POST["data"]);
}};
if (isset($_GET["id"])){
  	$id = utf8_decode($_GET["id"]);
}else {if (isset($_POST["id"])){
	$id = utf8_decode($_POST["id"]);
}};

//Data no formato do banco de dados
$datan = implode("-", array_reverse(explode("/", $data)));

//Data no formato do banco de dados
$datan1 = implode("-", array_reverse(explode("/", $data1)));

// Vefifica o método a ser aplicado e define o sql para a execução do mesmo
if ($metodo == "alterar"){
  $sql = "UPDATE agenda SET codprof='$profissional', nomepaciente='$nome', data='$datan', horario='$horario' WHERE id = '$id';";
  //$log->info($login, $perfil, $ip, 'Nome: ', 'Usuário logado: ', $nome, $_SESSION[login], 'Alterado Login: ', 'Perfil: ', 'IP: '); 
} elseif ($metodo =="incluir") {
    $sql = "INSERT INTO agenda (codprof,nomepaciente,data,horario) VALUES ('$profissional','$nome','$datan1','$horario');";
    //$log->info($login, $perfi,'$cep','$bairro','$tel','$cel','$cidade','$estado'l, $ip, 'Nome: ', 'Usuário logado: ', $nome, $_SESSION[login], 'Criado Login: ', 'Perfil: ', 'IP: '); 
  }elseif ($metodo =="excluir"){
    $sql = "DELETE FROM agenda WHERE id = '$id';";
    //$log->info($login, $perfil, $ip, 'Nome: ', 'Usuário logado: ', $nome, $_SESSION[login], 'Apagado Login: ', 'Perfil: ', 'IP: ');
  };
// Executa o comando SQL
mysql_query($sql);
// Finaliza a conexão com o banco de dados
mysql_close($conexao);
// Redireciona para a página de usuários
header("location:inicio.php");
 ?>

