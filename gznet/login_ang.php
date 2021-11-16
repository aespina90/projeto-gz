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

  <link rel="stylesheet" href="css.css" type="text/css"/>
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
  <meta name="copyright" content="Copyright 2006 - Lógica Digital"/>
  <meta name="author" content="Lógica Digital"/>
  <meta http-equiv="reply-to" content="root@gznet.com.br"/>
  <meta http-equiv="Content-Language" content="pt-BR"/>
  <meta name="target_country" content="br"/>
  <meta name="country" content="Brazil"/>

  </head>
  <body>

  <!--inicio da tabela geral-->
  <table width="100%" border="0" cellspacing="0" cellpadding="0" class="bg_fundo_tabela">
    <tr>
      <td align="center" valign="top">
        <table width="775" border="0" cellpadding="0" cellspacing="0" bgcolor="#FFFFFF">
          <tr>
            <td align="center" valign="top">
              <?php include("inc_topo.php"); ?>
              <table width="775" border="0" cellspacing="0" cellpadding="0">
                <tr>
                  <td width="775" height="586" align="center" valign="top"> <br>
                    <table width="90%" border="0" cellspacing="0" cellpadding="0" class="interna">
                      <tr>
                        <div class="texto_geral"><p align="left" style="padding-left:25px;font: bold 15px Tahoma;">
                        <img src="imagens/img_seta.jpg"> Area Restrita
                        </p></div><br/>
                      </tr>
                      <tr>
                        <td>
                          <br><div class="texto_geral">
                          <p align="center" style="font: bold 25px Tahoma;">
                            <strong>
                              Login não cadastrado ou senha incorreta
                            </strong><br><br><br><br>
                          </p>
                          <p align="center" style="font: normal 20px Tahoma;">
                            Em caso de problema ou para solicitar um login/senha utilize a opção<br><br>
                            <u><strong> <a href="fale_conosco.php">Contato / Fale Conosco
                            </a></strong></u>

                       	  </p>
                        </td>
                      </tr>
                    </table>
                  </td>
                </tr>
              </table>
              <?php include("inc_rodape.php"); ?>
            </td>
          </tr>
        </table>
      </td>
    </tr>
  </table>
  </body>
  </html>

  <?php

}

?>