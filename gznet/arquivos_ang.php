<?php
/* Inicio de todo código php */
session_start();
/* Includes */
require ('inc_conexao_interno.php');
require ('inc_funcoes.php');

$id = $_SESSION['iduser'];

if ( $id == '' ) header('location: index.php');

header("Cache-Control: no-cache, must-revalidate");
header("Expires: Mon, 06 Jan 1990 00:00:01 GMT"); 

$sql = 'SELECT * FROM tbcategoria WHERE status="A" ORDER BY descricao';
$query = mysql_query($sql,$conexao['conexao'])or die(mysql_error());
$linhas = mysql_num_rows($query);

?>
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN">
<html>
<head>
<LINK REL="SHORTCUT ICON" href="imagens/logo.gif"><title>GZ Sistemas</title>
<script type="text/javascript" src="funcoes.js"></script>
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
            <!--inicio da tabela do Topo-->
            <?php include("inc_topo.php"); ?>
            <!--inicio da tabela meio-->
            <table width="775" border="0" cellspacing="0" cellpadding="0">
	      <tr>
		<td width="775" height="586" align="center" valign="top"> <br>
                  <table width="90%" border="0" cellspacing="0" cellpadding="0">
		    <tr>
                      <div class="texto_geral"><p align="left" style="padding-left:25px;font: bold 15px Tahoma;">
                      <img src="imagens/img_seta.jpg"> GZ Net
                      </p></div><br/>
		    </tr>
		    <tr>
      	              <td height="105">

                        <div class="texto_geral">
                          <p style="margin-top:10px; font-size:15px; font-family:verdana;">Faça o seu cadastro enviando um email para <a href="mailto:novaversao@gznet.com.br" style="margin-top:10px; font-family:verdana; text-decoration:underline; color: red">novaversao@gznet.com.br</a> e receba automaticamente um email sempre que houver uma nova versão ou release.</p><br/>
                          <p style="margin-top:10px; font-size:15px; font-family:verdana;">Para efetuar o download de arquivos com extensão <strong>.ARJ</strong> utilizar o <a href="http://windows.microsoft.com/pt-BR/internet-explorer/products/ie/home" target="_blank" style="margin-top:10px; font-family:verdana; text-decoration:underline; color: blue">Internet Explorer</a> ou <a href="http://www.google.com/chrome?hl=pt-BR" target="_blank" style="margin-top:10px; font-family:verdana; text-decoration:underline; color: blue">Google Chrome</a>.</p><br/>
                          <br/>
                          <p style="font-size:15px;"><strong>ARQUIVOS E ATUALIZAÇÕES</strong></p>
                        </div>

			<?php
			for($cont=1; $cont<=$linhas; $cont++) {

                           $dados = mysql_fetch_assoc($query); ?>

   			   <div class="texto_geral" style="padding-left:20px;"><br/>
			     <p><strong>* <?php echo $dados['descricao']?></strong><p>

			   <?php

                           $sql_secao    = 'SELECT * FROM tbsecao WHERE categoria = "'.$dados['categoria'].'" AND status="A" ORDER BY secao';
                           $query_secao  = mysql_query($sql_secao,$conexao['conexao']);
                           $linhas_secao = mysql_num_rows($query_secao);

                           for($cont_secao=1; $cont_secao<=$linhas_secao; $cont_secao++) {

                              $dados_secao = mysql_fetch_assoc($query_secao);

                              if($dados_secao['atualizando']!='S') {
                                ?>
                                <a href="arquivos_interna.php?secao=<?php echo $dados_secao['id']?>&obs=<?php echo $dados_secao['obs']?>&nome_secao=<?php echo $dados_secao['secao'];?>">
                                <u><?php echo $dados_secao['secao'];?></u></a><br/>
                                <?php
                              } else {
                                ?>
                                <br><p style="font: regular 22px Tahoma;">
                                <?php echo $dados_secao['secao'];?>
                                <strong>(EM PROCESSO DE ATUALIZAÇÃO)</strong>
                                </p><br>
                                <?php
                              }

                           } ?>
                           </div>   <?php
			}
			?>

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