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

if (isset($_GET["nome"])){
  $nome = utf8_decode($_GET["nome"]);
}else {if (isset($_POST["nome"])){
  $nome = utf8_decode($_POST["nome"]);
}};
if (isset($_GET["crmcro"])){
  $crmcro = $_GET["crmcro"];
}else {if (isset($_POST["crmcro"])){
  $crmcro = $_POST["crmcro"];
}};
if (isset($_GET["tipo"])){
  $tipo = $_GET["tipo"];
}else {if (isset($_POST["tipo"])){
  $tipo = $_POST["tipo"];
}};
if (isset($_GET["id"])){
  $id = $_GET["id"];
}else {if (isset($_POST["id"])){
  $id = $_POST["id"];
}};

// Vefifica o método a ser aplicado e define o sql para a execução do mesmo
if ($metodo == "alterar"){
  $sql = "UPDATE profissionais SET nome='$nome', crmcro='$crmcro', tipo='$tipo' WHERE id = '$id';";
  //$log->info($login, $perfil, $ip, 'Nome: ', 'Usuário logado: ', $nome, $_SESSION[login], 'Alterado Login: ', 'Perfil: ', 'IP: '); 
} elseif ($metodo =="incluir") {
    $sql = "INSERT INTO profissionais (nome,crmcro,tipo) VALUES ('$nome','$crmcro','$tipo');";
    //$log->info($login, $perfil, $ip, 'Nome: ', 'Usuário logado: ', $nome, $_SESSION[login], 'Criado Login: ', 'Perfil: ', 'IP: '); 
  }elseif ($metodo =="excluir"){
    $sql = "DELETE FROM profissionais WHERE id = '$id';";
    //$log->info($login, $perfil, $ip, 'Nome: ', 'Usuário logado: ', $nome, $_SESSION[login], 'Apagado Login: ', 'Perfil: ', 'IP: ');
  };
// Executa o comando SQL
mysql_query($sql);
// Finaliza a conexão com o banco de dados
mysql_close($conexao);
// Redireciona para a página de usuários
header("location:inicio.php");
 ?>

