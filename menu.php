<?
	session_start();
	require_once ("validalogin.php");
?>
<!-- MENU COMUM -->
<div id='cssmenu'>
<ul>
   <? if ($_SESSION['perfil'] == "ADMIN" or $_SESSION["perfil"] == "USER"){?>
   <li class='active'><a href='inicio.php'><span>Inicio</span></a></li>
   <li class='has-sub'><a href='#'><span>Pacientes</span></a>
      <ul>
         <li class='has-sub'><a href='cadpacientes.php'><span>Cadastrar</span></a></li>
         <li class='has-sub'><a href='editpacientes.php'><span>Editar</span></a></li>
         <li class='has-sub'><a href='excluirpacientes.php'><span>Excluir</span></a></li>
      </ul>
   </li>
   <li class='has-sub'><a href='#'><span>Profissionais</span></a>
      <ul>
         <li class='has-sub'><a href='cadprofissionais.php'><span>Cadastrar</span></a></li>
         <li class='has-sub'><a href='editprofissionais.php'><span>Editar</span></a></li>
         <li class='has-sub'><a href='excluirprofissionais.php'><span>Excluir</span></a></li>
      </ul>
   </li>
   <li class='has-sub'><a href='#'><span>Procedimentos</span></a>
      <ul>
         <li class='has-sub'><a href='cadprocedimentos.php'><span>Cadastrar</span></a></li>
         <li class='has-sub'><a href='editprocedimentos.php'><span>Editar</span></a></li>
         <li class='has-sub'><a href='excluirprocedimentos.php'><span>Excluir</span></a></li>
		 <li class='has-sub'><a href='listaprocedimentos.php'><span>Listar</span></a></li>
      </ul>
   </li>
   <li class='has-sub'><a href='#'><span>Convênio</span></a>
      <ul>
         <li class='has-sub'><a href='cadconvenios.php'><span>Cadastrar</span></a></li>
         <li class='has-sub'><a href='editconvenios.php'><span>Editar</span></a></li>
         <li class='has-sub'><a href='excluirconvenios.php'><span>Excluir</span></a></li>
      </ul>
   </li>
   <!--<li class='has-sub'><a href='#'><span>Cadastrar</span></a>
      <ul>
         <li class='has-sub'><a href='cadpacientes.php'><span>Pacientes</span></a></li>
         <li class='has-sub'><a href='cadprofissionais.php'><span>Profissionais</span></a></li>
         <li class='has-sub'><a href='cadprocedimentos.php'><span>Procedimentos</span></a></li>
         <li class='has-sub'><a href='cadconvenios.php'><span>Convênio</span></a></li>
      </ul>
   </li>
   <li class='has-sub'><a href='#'><span>Editar</span></a>
      <ul>
         <li class='has-sub'><a href='editpacientes.php'><span>Pacientes</span></a></li>
         <li class='has-sub'><a href='editprofissionais.php'><span>Profissionais</span></a></li>
         <li class='has-sub'><a href='editprocedimentos.php'><span>Procedimentos</span></a></li>
         <li class='has-sub'><a href='editconvenios.php'><span>Convênio</span></a></li>
      </ul>
   </li>
   <li class='has-sub'><a href='#'><span>Excluir</span></a>
      <ul>
         <li class='has-sub'><a href='excluirpacientes.php'><span>Pacientes</span></a></li>
         <li class='has-sub'><a href='excluirprofissionais.php'><span>Profissionais</span></a></li>
         <li class='has-sub'><a href='excluirprocedimentos.php'><span>Procedimentos</span></a></li>
         <li class='has-sub'><a href='excluirconvenios.php'><span>Convênio</span></a></li>
      </ul>
   </li>-->
   <li class='has-sub'><a href='#'><span>Fichas</span></a>
      <ul>
         <li class='has-sub'><a href='#'><span>Autorização</span></a>
         	<ul>
               <!--<li><a href='fichaautm.php'><span>Médico</span></a></li>-->
               <li class='last'><a href='fichaaut.php'><span>Odontológico</span></a></li>
            </ul>
         </li>
         <li class='has-sub'><a href='#'><span>Procedimentos</span></a>
         	<ul>
               <!--<li><a href='fichaprocm.php'><span>Médico</span></a></li>-->
               <li class='last'><a href='fichaproc.php'><span>Odontológico</span></a></li>
            </ul>
         </li>
         <li class='has-sub'><a href='#'><span>Prontuário</span></a>
         	<ul>
               <li class='last'><a href='fichapront.php'><span>Odontológico</span></a></li>
            </ul>
         </li>
         <li class='has-sub'><a href='fichamedica.php'><span>Médica</span></a></li>
      </ul>
   </li>
   <li class='has-sub'><a href='#'><span>Agenda</span></a>
      <ul>
         <li class='has-sub'><a href='agendaodont.php'><span>Acessar</span></a></li>
      </ul>
   </li>
   <!--<li class='has-sub'><a href='#'><span>Orçamento</span></a>
      <ul>
         <li class='has-sub'><a href='orcamentom.php'><span>Médico</span></a></li>
         <li class='last'><a href='orcamento.php'><span>Odontológico</span></a></li>
      </ul>
   </li> -->
   <!-- MENU ADMIN -->
   <? if ($_SESSION['perfil'] == "ADMIN"){?>
   <li class='has-sub'><a href='#'><span>Relatório</span></a>
      <ul>
         <li class='has-sub'><a href='#'><span>Por Mês</span></a>
         	  <ul>
		         <li class='has-sub'><a href='relatconv.php'><span>Convênio</span></a></li>
		         <li class='has-sub'><a href='relatprof.php'><span>Profissional</span></a></li>
		      </ul>
         </li>
      </ul>
   </li>
   <li class='has-sub'><a href='#'><span>Usuários</span></a>
      <ul>
         <li class='has-sub'><a href='cadusuarios.php'><span>Cadastrar</span></a></li>
         <li class='has-sub'><a href='editusuarios.php'><span>Editar</span></a></li>
         <li class='last'><a href='delusuarios.php'><span>Excluir</span></a></li>
      </ul>
   </li>
   <?};?>
   <!---------------->
   <li class='last'><a href='logout.php'><span>Sair</span></a></li>
</ul>
</div>
<?};?>

<!---------------->