<?php
session_start();
include('inc_conexao_interno.php');
include('inc_funcoes.php');

$ip    = $_SERVER['REMOTE_ADDR'];

$login = rtrim(ltrim(str_replace("'","",$_REQUEST['login'])));
$senha = rtrim(ltrim(str_replace("'","",$_REQUEST['senha'])));

$login = ereg_replace("[^a-zA-Z0-9_.@]", "",strtr($login, "áàãâéêíóôõúüçÁÀÃÂÉÊÍÓÔÕÚÜÇ ","aaaaeeiooouucAAAAEEIOOOUUC_"));
$senha = ereg_replace("[^a-zA-Z0-9_.@]", "",strtr($senha, "áàãâéêíóôõúüçÁÀÃÂÉÊÍÓÔÕÚÜÇ ","aaaaeeiooouucAAAAEEIOOOUUC_"));

$sql_login      = 'SELECT * FROM tbarearestrita WHERE status="A" AND login="'.$login.'" AND senha="'.$senha.'"';
$query_login    = mysql_query($sql_login);
$linhas_login   = mysql_num_rows($query_login);

if ($linhas_login > 0) {

   $dados_login = mysql_fetch_array($query_login);
   $_SESSION['iduser']     = $dados_login['id'];
   $_SESSION['login']      = $dados_login['login'];
   $_SESSION['nome']       = $dados_login['nome'];

   $rs_sql   = 'INSERT INTO logloginok (usuario,data,ip) VALUES ('.$dados_login['id'].', NOW(), "'.$ip.'")';
   $rs_query = mysql_query($rs_sql,$conexao['conexao']) or die(mysql_error());

   $rs_sql   = 'UPDATE tbarearestrita ';
   $rs_sql  .= 'SET lastlogin=NOW(), lastip="'.$ip.'" ';
   $rs_sql  .= 'WHERE id='.$dados_login['id'];
   $rs_query = mysql_query($rs_sql,$conexao['conexao']) or die(mysql_error());

   header('location: arquivos.php');

} else{

   $rs_sql   = 'INSERT INTO logloginfail (usuario,senha,data,ip) VALUES ("'.$login.'", "'.$senha.'", NOW(), "'.$ip.'")';
   $rs_query = mysql_query($rs_sql,$conexao['conexao']) or die(mysql_error());

  ?>
  <!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN">
  <html>
  <head>
  <LINK REL="SHORTCUT ICON" href="imagens/logo.gif"><title>GZ Sistemas</title>
  <script type="text/javascript">
     setTimeout("history.back()",8000)
  </script>

		<!-- CSS -->
		<link rel="stylesheet" href="gz/css/style.css" type="text/css" media="screen" />
		<link rel="stylesheet" href="gz/css/social-icons.css" type="text/css" media="screen" />
		<!--[if IE 8]>
			<link rel="stylesheet" type="text/css" media="screen" href="css/ie8-hacks.css" />
		<![endif]-->
		<!-- ENDS CSS -->	
 
		<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
		<meta name="resource-type" content="document"/>
		<meta http-equiv="Expires" content="-1"/>
		<meta http-equiv="pragma" content="no-cache"/>
		<meta http-equiv="expires" content="Mon, 06 Jan 1990 00:00:01 GMT"/>
		<meta name="revisit-after" content="10"/>
		<meta name="classification" content="Site Venda de Sistemas"/>
		<meta name="description" content="Software de automação comercial, frente de loja e retaguarda.TEF. Consultoria para supermercados. Equipamentos em geral. Computadores, no-breaks, impressoras fiscais"/>
		<meta name="keywords" content="Sistema comercial, software, tef, ecf, mfd, frente de loja, retaguarda, consultoria, computador, impressoras fiscais, no-breaks, leitores, periféricos, equipamentos de informatica, microterminal, programas, ti, tecnologia de informação."/>
		<meta name="robots" content="ALL"/>
		<meta name="googlebot" content="INDEX, FOLLOW"/>
		<meta name="distribution" content="Global"/>
		<meta name="rating" content="General"/>
		<meta name="copyright" content="Copyright 2006 - GZ Sistemas"/>
		<meta name="author" content="GZ Sistemas"/>
		<meta http-equiv="reply-to" content="root@gznet.com.br"/>
		<meta http-equiv="Content-Language" content="pt-BR"/>
		<meta name="target_country" content="br"/>
		<meta name="country" content="Brazil"/>

  </head>
  <body>
  <?php include("inc_topo.php"); ?>

  <!--inicio da tabela geral-->
  <table width="100%" border="0" cellspacing="0" cellpadding="0" class="bg_fundo_tabela">
    <tr>
      <td align="center" valign="top">
                           <br><div class="texto_geral">
                          <p align="center" style="font: bold 25px Tahoma;">
                            <strong><small><br>
                              Login não cadastrado ou senha incorreta
                            </small></strong><br><br><br>
                          </p>
      </td>
    </tr>
  </table>
              <?php include("inc_rodape.php"); ?>

  </body>
  </html>

  <?php

}

?>