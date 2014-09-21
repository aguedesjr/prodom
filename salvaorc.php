<?
session_start();
//Requer autenticação
require_once ("validalogin.php");
//Requer conexão previa com o banco
require_once ("configs/conn.php");
//Classe usada para gerar o arquivo pdf
require_once ("fpdf16/fpdf.php");
//Caminho do arquivo de fontes para o FPDF
define('FPDF_FONTPATH','fpdf16/font/');

	class PDF extends FPDF
	{
		//Cabeçalho
		function Header()
		{
		    //Logo
		    //$this->Image('images/telefone.jpg',10,8,33);
		    //Coloca a fonte do título com Arial, negrito, 16
		    //$this->SetFont('Arial','B',16);
		    //Move para a direita
		    $this->Cell(65);
		    //Titulo
		    $this->Image('imagens/logo_prodom1.jpg',60,8,100); //Lateral, Vertical, Tamanho
		    //$this->Cell(65);
		    //$this->Cell(70,10,'Guia de Autorização',0,0,'C');
		    //Move para a direita
		    $this->Cell(70);
		    //Logo
		   //$this->Image('logo1.jpg',170,8,33);
		    //Quebra de linha
		    $this->Ln(30);
		}

		//Rodapé
		function Footer()
		{
		    //Posiciona a 1.5 cm do fim da pagina
		    $this->SetY(-15);
		    //Coloca a fonte do rodape com Arial, italico, 8
		    $this->SetFont('Arial','I',8);
		    //Numero da pagina
		    //$this->Cell(0,10,'Pagina '.$this->PageNo().'/{nb}',0,0,'C');
		    //if (isset($_GET["data"])){
  				//$data = utf8_decode($_GET["data"]);
			//}else {if (isset($_POST["data"])){
  				//$data = utf8_decode($_POST["data"]);
			//}};
		    //$this->Cell(0,10,utf8_decode('OBS: Valores sujeito a autorização do convênio acima citado.                                      Data: '.$data),0,0,'R');
		}
	}
	
	$usuario = $_SESSION[login];
	$mes1 = date("m");
	//Realiza a consulta das receitas
	$sql = "SELECT nome, valor, data FROM receitas WHERE user = '$usuario' AND data LIKE '%-$mes1-%';";
	$resultado = mysql_query($sql);
	//Realiza a consulta das despesas
	$sqld = "SELECT nome, valor, data FROM despesas WHERE user = '$usuario' AND data LIKE '%-$mes1-%';";
	$resultadod = mysql_query($sqld);
	
	if (isset($_GET["buscanome"])){
  		$buscanome = utf8_decode($_GET["buscanome"]);
	}else {if (isset($_POST["buscanome"])){
  		$buscanome = utf8_decode($_POST["buscanome"]);
	}};
	
	if (isset($_GET["data"])){
  		$data = utf8_decode($_GET["data"]);
	}else {if (isset($_POST["data"])){
  		$data = utf8_decode($_POST["data"]);
	}};
	
	if (isset($_GET["convenio"])){
  		$convenio = utf8_decode($_GET["convenio"]);
	}else {if (isset($_POST["convenio"])){
  		$convenio = utf8_decode($_POST["convenio"]);
	}};
	
	if (isset($_GET["profissional"])){
  		$profissional = utf8_decode($_GET["profissional"]);
	}else {if (isset($_POST["profissional"])){
  		$profissional = utf8_decode($_POST["profissional"]);
	}};
	
	if (isset($_GET["codconvenio"])){
  		$codconvenio = utf8_decode($_GET["codconvenio"]);
	}else {if (isset($_POST["codconvenio"])){
  		$codconvenio = utf8_decode($_POST["codconvenio"]);
	}};
	
	if (isset($_GET["proc"])){
  		$proc = utf8_decode($_GET["proc"]);
	}else {if (isset($_POST["proc"])){
  		$proc = utf8_decode($_POST["proc"]);
	}};
	
	if (isset($_GET["dente"])){
  		$dente = utf8_decode($_GET["dente"]);
	}else {if (isset($_POST["dente"])){
  		$dente = utf8_decode($_POST["dente"]);
	}};
	
	if (isset($_GET["valor"])){
  		$valor = utf8_decode($_GET["valor"]);
	}else {if (isset($_POST["valor"])){
  		$valor = utf8_decode($_POST["valor"]);
	}};
	
	if (isset($_GET["codconvenio2"])){
  		$codconvenio2 = utf8_decode($_GET["codconvenio2"]);
	}else {if (isset($_POST["codconvenio2"])){
  		$codconvenio2 = utf8_decode($_POST["codconvenio2"]);
	}};
	
	if (isset($_GET["proc2"])){
  		$proc2 = utf8_decode($_GET["proc2"]);
	}else {if (isset($_POST["proc2"])){
  		$proc2 = utf8_decode($_POST["proc2"]);
	}};
	
	if (isset($_GET["dente2"])){
  		$dente2 = utf8_decode($_GET["dente2"]);
	}else {if (isset($_POST["dente2"])){
  		$dente2 = utf8_decode($_POST["dente2"]);
	}};
	
	if (isset($_GET["valor2"])){
  		$valor2 = utf8_decode($_GET["valor2"]);
	}else {if (isset($_POST["valor2"])){
  		$valor2 = utf8_decode($_POST["valor2"]);
	}};
	
	if (isset($_GET["codconvenio3"])){
  		$codconvenio3 = utf8_decode($_GET["codconvenio3"]);
	}else {if (isset($_POST["codconvenio3"])){
  		$codconvenio3 = utf8_decode($_POST["codconvenio3"]);
	}};
	
	if (isset($_GET["proc3"])){
  		$proc3 = utf8_decode($_GET["proc3"]);
	}else {if (isset($_POST["proc3"])){
  		$proc3 = utf8_decode($_POST["proc3"]);
	}};
	
	if (isset($_GET["dente3"])){
  		$dente3 = utf8_decode($_GET["dente3"]);
	}else {if (isset($_POST["dente3"])){
  		$dente3 = utf8_decode($_POST["dente3"]);
	}};
	
	if (isset($_GET["valor3"])){
  		$valor3 = utf8_decode($_GET["valor3"]);
	}else {if (isset($_POST["valor3"])){
  		$valor3 = utf8_decode($_POST["valor3"]);
	}};
	
	if (isset($_GET["codconvenio4"])){
  		$codconvenio4 = utf8_decode($_GET["codconvenio4"]);
	}else {if (isset($_POST["codconvenio4"])){
  		$codconvenio4 = utf8_decode($_POST["codconvenio4"]);
	}};
	
	if (isset($_GET["proc4"])){
  		$proc4 = utf8_decode($_GET["proc4"]);
	}else {if (isset($_POST["proc4"])){
  		$proc4 = utf8_decode($_POST["proc4"]);
	}};
	
	if (isset($_GET["dente4"])){
  		$dente4 = utf8_decode($_GET["dente4"]);
	}else {if (isset($_POST["dente4"])){
  		$dente4 = utf8_decode($_POST["dente4"]);
	}};
	
	if (isset($_GET["valor4"])){
  		$valor4 = utf8_decode($_GET["valor4"]);
	}else {if (isset($_POST["valor4"])){
  		$valor4 = utf8_decode($_POST["valor4"]);
	}};
	
	if (isset($_GET["codconvenio5"])){
  		$codconvenio5 = utf8_decode($_GET["codconvenio5"]);
	}else {if (isset($_POST["codconvenio5"])){
  		$codconvenio5 = utf8_decode($_POST["codconvenio5"]);
	}};
	
	if (isset($_GET["proc5"])){
  		$proc5 = utf8_decode($_GET["proc5"]);
	}else {if (isset($_POST["proc5"])){
  		$proc5 = utf8_decode($_POST["proc5"]);
	}};
	
	if (isset($_GET["dente5"])){
  		$dente5 = utf8_decode($_GET["dente5"]);
	}else {if (isset($_POST["dente5"])){
  		$dente5 = utf8_decode($_POST["dente5"]);
	}};
	
	if (isset($_GET["valor5"])){
  		$valor5 = utf8_decode($_GET["valor5"]);
	}else {if (isset($_POST["valor5"])){
  		$valor5 = utf8_decode($_POST["valor5"]);
	}};
	
	$sql = "SELECT data, matricula, cpf, endereco, bairro, cep, telefone, celular FROM pacientes WHERE nome = '$buscanome';";
	$resultado = mysql_query($sql);
	$result = mysql_fetch_array($resultado);
	
	$sqlp = "SELECT nome, crmcro FROM profissionais WHERE id = '$profissional';";
	$resultadop = mysql_query($sqlp);
	$resultp = mysql_fetch_array($resultadop);
	
	$datan = implode("/", array_reverse(explode("-", $result[0])));
	//Instanciação da classe herdada
	$pdf=new PDF("P","mm","A4"); //P->Retrato, L->Paisagem; mm-> milímetros; A4-> padrão da folha
	//$pdf = new MEM_IMAGE;
	$pdf->AliasNbPages(); //Recebe o total de páginas
	$pdf->AddPage(); //Coloca uma página em branco
	$pdf->SetFont('Arial','B',16);
	$pdf->Cell(65);
	$pdf->Cell(70,10,utf8_decode('Orçamento Odontológico'),0,0,'C');
	$pdf->SetFont('Arial','U',12);
	$pdf->Ln(15);
	$pdf->Cell(50,10,'                                                                                                                                                                  ',0,0);
	$pdf->Ln(7);
	$pdf->SetFont('Arial','U',12);
	$pdf->Cell(15);
	$pdf->Cell(50,10,'Nome: '.$buscanome,0,0);
	$pdf->Cell(65);
	$pdf->Cell(50,10,'Data de Nasc.: '.$datan,0,0);
	$pdf->Ln(7);
	$pdf->Cell(15);
	$pdf->Cell(50,10,utf8_decode('Convênio: ').$convenio,0,0);
	$pdf->Cell(15);
	$pdf->Cell(50,10,utf8_decode('Matricula: ').$result[1],0,0);
	$pdf->Cell(10);
	$pdf->Cell(50,10,utf8_decode('CPF: ').$result[2],0,0);
	$pdf->Ln(7);
	$pdf->Cell(15);
	$pdf->Cell(70,10,utf8_decode('Endereço: ').$result[3],0,0);
	$pdf->Ln(7);
	$pdf->Cell(15);
	$pdf->Cell(30,10,utf8_decode('CEP: ').$result[5],0,0);
	$pdf->Cell(10);
	$pdf->Cell(50,10,utf8_decode('Bairro: ').$result[4],0,0);
	$pdf->Ln(7);
	$pdf->Cell(15);
	$pdf->Cell(30,10,utf8_decode('Telefone: ').$result[6],0,0);
	$pdf->Cell(30);
	$pdf->Cell(50,10,utf8_decode('Celular: ').$result[7],0,0);
	$pdf->Ln(7);
	$pdf->Cell(15);
	$pdf->Cell(50,10,utf8_decode('Profissional: ').$resultp[0],0,0);
	$pdf->Cell(65);
	$pdf->Cell(50,10,utf8_decode('CRM/CRO: ').$resultp[1],0,0);
	$pdf->Ln(7);
	$pdf->Cell(50,10,'                                                                                                                                                                  ',0,0);
	$pdf->Ln(15);
	$pdf->SetFont('Arial','BIU',14);
	$pdf->Cell(85);
	$pdf->Cell(0,10,utf8_decode('Serviços'),0,1);
	$pdf->SetFont('Arial','U',12);
	$pdf->Cell(15);
	$pdf->Cell(10,10,utf8_decode('Código'),0,0);
	$pdf->Cell(13);
	$pdf->Cell(50,10,'Procedimento',0,0);
	$pdf->Cell(55);
	$pdf->Cell(16,10,'Dente',0,0);
	$pdf->Cell(7);
	$pdf->Cell(16,10,'Valor',0,0);
	$pdf->Ln(10);
	$pdf->SetFont('Arial','',12);
	$pdf->Cell(18);
	$pdf->Cell(10,10,$codconvenio,0,0);
	$pdf->Cell(10);
	$pdf->Cell(30,10,$proc,0,0);
	$pdf->Cell(80);
	$pdf->Cell(10,10,$dente,0,0);
	$pdf->Cell(6);
	if (empty($codconvenio)) {
		$pdf->Cell(10,10,$valor,0,0);
	} else {
		$pdf->Cell(10,10,'R$'.$valor,0,0);
	}
	$pdf->Ln(10);
	$pdf->Cell(18);
	$pdf->Cell(10,10,$codconvenio2,0,0);
	$pdf->Cell(10);
	$pdf->Cell(30,10,$proc2,0,0);
	$pdf->Cell(80);
	$pdf->Cell(10,10,$dente2,0,0);
	$pdf->Cell(6);
	if (empty($codconvenio2)) {
		$pdf->Cell(10,10,$valor2,0,0);
	} else {
		$pdf->Cell(10,10,'R$'.$valor2,0,0);
	}
	$pdf->Ln(10);
	$pdf->Cell(18);
	$pdf->Cell(10,10,$codconvenio3,0,0);
	$pdf->Cell(10);
	$pdf->Cell(30,10,$proc3,0,0);
	$pdf->Cell(80);
	$pdf->Cell(10,10,$dente3,0,0);
	$pdf->Cell(6);
	if (empty($codconvenio3)) {
		$pdf->Cell(10,10,$valor3,0,0);
	} else {
		$pdf->Cell(10,10,'R$'.$valor3,0,0);
	}
	$pdf->Ln(10);
	$pdf->Cell(18);
	$pdf->Cell(10,10,$codconvenio4,0,0);
	$pdf->Cell(10);
	$pdf->Cell(30,10,$proc4,0,0);
	$pdf->Cell(80);
	$pdf->Cell(10,10,$dente4,0,0);
	$pdf->Cell(6);
	if (empty($codconvenio4)) {
		$pdf->Cell(10,10,$valor4,0,0);
	} else {
		$pdf->Cell(10,10,'R$'.$valor4,0,0);
	}
	$pdf->Ln(10);
	$pdf->Cell(18);
	$pdf->Cell(10,10,$codconvenio5,0,0);
	$pdf->Cell(10);
	$pdf->Cell(30,10,$proc5,0,0);
	$pdf->Cell(80);
	$pdf->Cell(10,10,$dente5,0,0);
	$pdf->Cell(6);
	if (empty($codconvenio5)) {
		$pdf->Cell(10,10,$valor5,0,0);
	} else {
		$pdf->Cell(10,10,'R$'.$valor5,0,0);
	}
	$acu = ((float) $valor * (float) $dente) + ((float) $valor2 * (float) $dente2) + ((float) $valor3 * (float) $dente3) + ((float) $valor4 * (float) $dente4) + ((float) $valor5 * (float) $dente5);	    
	$pdf->Ln(30);
	$pdf->SetFont('Arial','B',12);
	$pdf->Cell(18);
	$pdf->Cell(125);
	$pdf->Cell(10,10,'Total: R$ '.$acu,0,0);
	$pdf->Ln(20);
	$pdf->SetFont('Arial','',8);
	$pdf->Cell(0,10,utf8_decode('OBS: Valores sujeito a autorização do convênio acima citado.                                      Data: '.$data),0,0,'R');
	$pdf->Output(); //Gera o pdf e permite o download

?>
