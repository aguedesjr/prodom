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
if (isset($_GET["codigo"])){
  $codigo = utf8_decode($_GET["codigo"]);
}else {if (isset($_POST["codigo"])){
  $codigo = utf8_decode($_POST["codigo"]);
}};
if (isset($_GET["valor"])){
  $valor = $_GET["valor"];
}else {if (isset($_POST["valor"])){
  $valor = $_POST["valor"];
}};
if (isset($_GET["convenio"])){
  $convenio = utf8_decode($_GET["convenio"]);
}else {if (isset($_POST["convenio"])){
  $convenio = utf8_decode($_POST["convenio"]);
}};
if (isset($_GET["grupo"])){
  $grupo = utf8_decode($_GET["grupo"]);
}else {if (isset($_POST["grupo"])){
  $grupo = utf8_decode($_POST["grupo"]);
}};
if (isset($_GET["id"])){
  	$id = utf8_decode($_GET["id"]);
}else {if (isset($_POST["id"])){
	$id = utf8_decode($_POST["id"]);
}};

// Vefifica o método a ser aplicado e define o sql para a execução do mesmo
if ($metodo == "alterar"){
  $sql = "UPDATE procedimentos SET nome='$nome', codigo='$codigo', valor='$valor', convenio='$convenio', grupo='$grupo' WHERE id = '$id';";
  //$log->info($login, $perfil, $ip, 'Nome: ', 'Usuário logado: ', $nome, $_SESSION[login], 'Alterado Login: ', 'Perfil: ', 'IP: '); 
} elseif ($metodo =="incluir") {
    $sql = "INSERT INTO procedimentos (nome,codigo,valor,convenio,grupo) VALUES ('$nome','$codigo','$valor','$convenio','$grupo');";
    //$log->info($login, $perfi,'$cep','$bairro','$tel','$cel','$cidade','$estado'l, $ip, 'Nome: ', 'Usuário logado: ', $nome, $_SESSION[login], 'Criado Login: ', 'Perfil: ', 'IP: '); 
  }elseif ($metodo =="excluir"){
    $sql = "DELETE FROM procedimentos WHERE id = '$id';";
    //$log->info($login, $perfil, $ip, 'Nome: ', 'Usuário logado: ', $nome, $_SESSION[login], 'Apagado Login: ', 'Perfil: ', 'IP: ');
  };
// Executa o comando SQL
mysql_query($sql);
// Finaliza a conexão com o banco de dados
mysql_close($conexao);
// Redireciona para a página de usuários
header("location:inicio.php");
 ?>

