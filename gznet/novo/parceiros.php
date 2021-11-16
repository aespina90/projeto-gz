<?php
session_start();
require('inc_conexao_interno.php');
require('inc_funcoes.php');
$sql_parceiros = 'SELECT * FROM tbparceiros WHERE status = "A" ORDER BY id';
$query_parceiros = mysql_query($sql_parceiros,$conexao['conexao'])or die(mysql_error());
$linhas_parceiros = mysql_num_rows($query_parceiros);
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
<script language="JavaScript">
function mostra(campo){ document.getElementById(campo).style.display=''; }
function oculta(campo){ document.getElementById(campo).style.display='none'; }
</script>
</head>
<body>
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
                  <table width="90%" border="0" cellspacing="0" cellpadding="0">
                    <tr>
                      <div class="texto_geral"><p align="left" style="padding-left:25px;font: bold 15px Tahoma;">
                      <img src="imagens/img_seta.jpg"> Parceiros
                      </p></div><br/>
                    </tr>
                    <tr>
                      <td height="105" valign="top">
                        <div class="texto_geral"><br/>
                          <p>&nbsp;</p>
                          <p>
                            Com o objetivo de integrar valor agregado as nossas soluções, a GZ Sistemas mantém
                             parceria com empresas de tecnologia de ponta, sempre atualizadas com o mercado e
                             oferecendo os melhores serviços e soluções.
                          </p><br/>
                          <p>
                             Ao adquirir uma das soluções GZ Sistemas, sua empresa passa a ter acesso a uma
                              infinidade de vantagens e soluções, com garantia de qualidade e evolução tecnológica.
                          </p><br/><br/>
                        </div>
                        <div align="center">
                          <table width="90%" border="0" align="center" cellpadding="0" cellspacing="5">
                            <tr>
                              <?php
                              if($linhas_parceiros > 0) {
                                $saltar=0;
                                 for($p=0; $p<$linhas_parceiros; $p++){
                                     $dados_parceiros = mysql_fetch_array($query_parceiros);
                                     $sql_imagem        = 'SELECT arquivo FROM tbletteraimagens WHERE id = "'.$dados_parceiros['logo'].'"';
                                     $query_imagem      = mysql_query($sql_imagem,$conexao['conexao'])or die(mysql_error());
                                     $linhas_imagem     = mysql_num_rows($query_imagem);
                                     $dados_imagem      = mysql_fetch_array($query_imagem);  ?>
                                     <td width="30%" height="100" align="center">
                                       <?php
                                       if($dados_imagem['arquivo'] != '') { ?>
                                          <img src="dbimagens/thumbnail/<?=$dados_imagem['arquivo'];?>" border="0" alt="<?=$dados_parceiros['nome'];?>">        <?php
                                       } ?>
                                       
                                     </td>      <?php
                                     if(++$saltar==3) {
                                        $saltar=0;
                                        print '</tr><tr>';
                                     }
                                 }
                              }	?>
                            </tr>
                          </table>
                        </div>
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
<map name="Map">
  <area shape="rect" coords="674,27,764,49" href="http://www.logicadigital.com.br" target="_blank">
</map>
<map name="Map2">
  <area shape="rect" coords="7,19,52,60" href="#">
  <area shape="rect" coords="71,21,141,58" href="#">
  <area shape="rect" coords="153,11,218,66" href="#">
</map>
<map name="Map3">
  <area shape="rect" coords="35,9,225,163" href="index.php">
</map>
</body>
</html>