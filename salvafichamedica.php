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
	
	//$usuario = $_SESSION[login];
	$mes1 = date("m");
	//Realiza a consulta das receitas
	//$sql = "SELECT nome, valor, data FROM receitas WHERE user = '$usuario' AND data LIKE '%-$mes1-%';";
	//$resultado = mysql_query($sql);
	//Realiza a consulta das despesas
	//$sqld = "SELECT nome, valor, data FROM despesas WHERE user = '$usuario' AND data LIKE '%-$mes1-%';";
	//$resultadod = mysql_query($sqld);
	
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
	
	$sql = "SELECT data, matricula, cpf, endereco, bairro, cep, telefone, celular FROM pacientes WHERE nome = '$buscanome';";
	$resultado = mysql_query($sql);
	$result = mysql_fetch_array($resultado);
	
	$sqlp = "SELECT nome, crmcro FROM profissionais WHERE id = '$profissional';";
	$resultadop = mysql_query($sqlp);
	$resultp = mysql_fetch_array($resultadop);
	
	$datan = implode("/", array_reverse(explode("-", $result[0])));
	
	// Separa em dia, m�s e ano
    list($dia, $mes, $ano) = explode('/', $datan);
    
    // Descobre que dia � hoje e retorna a unix timestamp
    $hoje = mktime(0, 0, 0, date('m'), date('d'), date('Y'));
    // Descobre a unix timestamp da data de nascimento do fulano
    $nascimento = mktime( 0, 0, 0, $mes, $dia, $ano);
    
    // Depois apenas fazemos o c�lculo j� citado :)
    $idade = floor((((($hoje - $nascimento) / 60) / 60) / 24) / 365.25);
	
	//Instanciação da classe herdada
	$pdf=new PDF("P","mm","A4"); //P->Retrato, L->Paisagem; mm-> milímetros; A4-> padrão da folha
	//$pdf = new MEM_IMAGE;
	$pdf->AliasNbPages(); //Recebe o total de páginas
	$pdf->AddPage(); //Coloca uma página em branco
	$pdf->SetFont('Arial','B',16);
	$pdf->Cell(65);
	$pdf->Cell(70,10,utf8_decode('Ficha Médica'),0,0,'C');
	$pdf->SetFont('Arial','U',12);
	$pdf->Ln(10);
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
	$pdf->Cell(5);
	$pdf->Cell(50,10,utf8_decode('Idade: ').$idade,0,0);
	$pdf->Ln(7);
	$pdf->Cell(15);
	$pdf->Cell(50,10,utf8_decode('Profissional: ').$resultp[0],0,0);
	$pdf->Cell(65);
	$pdf->Cell(50,10,utf8_decode('CRM: ').$resultp[1],0,0);
	$pdf->Ln(7);
	$pdf->Cell(50,10,'                                                                                                                                                                  ',0,0);
	$pdf->Ln(10);
	$pdf->SetFont('Arial','BIU',14);
	$pdf->Cell(85);
	$pdf->Cell(0,10,utf8_decode('Descrição'),0,1);
	$pdf->SetFont('Arial','U',12);
	$pdf->Ln(1);
	$pdf->Cell(50,10,'                                                                                                                                                                  ',0,0);
	$pdf->Ln(10);
	$pdf->Cell(50,10,'                                                                                                                                                                  ',0,0);
	$pdf->Ln(10);
	$pdf->Cell(50,10,'                                                                                                                                                                  ',0,0);
	$pdf->Ln(10);
	$pdf->Cell(50,10,'                                                                                                                                                                  ',0,0);
	$pdf->Ln(10);
	$pdf->Cell(50,10,'                                                                                                                                                                  ',0,0);
	$pdf->Ln(10);
	$pdf->Cell(50,10,'                                                                                                                                                                  ',0,0);
	$pdf->Ln(10);
	$pdf->Cell(50,10,'                                                                                                                                                                  ',0,0);
	$pdf->Ln(10);
	$pdf->Cell(50,10,'                                                                                                                                                                  ',0,0);
	$pdf->Ln(10);
	$pdf->Cell(50,10,'                                                                                                                                                                  ',0,0);
	$pdf->Ln(10);
	$pdf->Cell(50,10,'                                                                                                                                                                  ',0,0);
	$pdf->Ln(10);
	$pdf->Cell(50,10,'                                                                                                                                                                  ',0,0);
	$pdf->Ln(10);
	$pdf->Cell(50,10,'                                                                                                                                                                  ',0,0);
	$pdf->Ln(10);
	$pdf->Cell(50,10,'                                                                                                                                                                  ',0,0);
	$pdf->Ln(10);
	$pdf->Cell(50,10,'                                                                                                                                                                  ',0,0);
	$pdf->Ln(10);
	$pdf->SetFont('Arial','',8);
	$pdf->Cell(0,10,utf8_decode('Data: '.$data),0,0,'R');
	$pdf->Output(); //Gera o pdf e permite o download

?>
