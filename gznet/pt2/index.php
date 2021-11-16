<?php
session_start();
require ('inc_conexao_interno.php');
require ('inc_funcoes.php');
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
<table width="100%" border="0" cellspacing="0" cellpadding="0" class="bg_fundo_tabela">
  <tr>
    <td height="670" align="center" valign="top">
      <table width="775" border="0" cellpadding="0" cellspacing="0" bgcolor="#FFFFFF">
        <tr>
          <td height="632" align="center" valign="top">
            <?php include("inc_topo.php"); ?>
            <table width="775" border="0" cellspacing="0" cellpadding="0">
              <tr>
                <td width="527" height="592" align="right" valign="top"> <br>
                  <table width="509" border="0" cellpadding="0" cellspacing="0">
                    <tr>
                      <td width="219" rowspan="4" valign="top">     <script type="text/javascript">banner();</script></td>
                      <td width="10" rowspan="4">&nbsp;</td>
                      <td width="250" height="42">
                        <div class="texto_geral">
                        <p align="left" style="font: bold 15px Tahoma;">
                        GZ Sistemas
                        </p></div><br/>
                      </td>
                      <td width="30">&nbsp;</td>
                    </tr>
                    <tr>
                      <td height="76" valign="top"><span class="texto_servicos"><img src="imagens/img_softwares.jpg"></span>
                        <div class="texto_servicos">Solu&ccedil;&otilde;es  completas, em m&oacute;dulos flex&iacute;veis para controle gerencial preciso com agilidade e  qualidade no atendimento ao cliente.</div>
                     </td>
                      <td>                        <a href="softwares.php"><img src="imagens/btn_marcado.jpg" border="0" style="margin-top:20px;"></a> </td>
                    </tr>
                    <tr>
                      <td height="55" valign="top"><span class="texto_servicos"><img src="imagens/img_solucoes.jpg"></span>
                        <div class="texto_servicos">Inova&ccedil;&atilde;o  com maior qualidade e variedade de servi&ccedil;os para o seu PDV.</div>
                      </td>
                      <td>
                        <a href="solucoes_tef.php"><img src="imagens/btn_marcado.jpg" border="0" style="margin-top:20px;"></a>
                      </td>
                    </tr>
                    <tr>
                      <td height="45" valign="top"><span class="texto_servicos"><img src="imagens/img_servicos.jpg"></span>
                        <div class="texto_servicos">Total  comprometimento com o seu resultado e crescimento.</div>
                      </td>
                      <td>
                        <a href="servicos.php"><img src="imagens/btn_marcado.jpg" border="0" style="margin-top:20px;"></a>                      </td>
                    </tr>
                  </table><br/>
                  <table width="508" border="0" cellpadding="0" cellspacing="0">
                    <tr>
                      <td width="50%" valign="top" style="padding-left:40px; padding-bottom: 4px"><a href="mercosuper.php"><img src="imagens/img_logo_mercosuper.jpg" style="margin-top: 12px" border="0"></a></td>
                      <td rowspan="2"><img src="imagens/img_linha_vertical.jpg" width="2" height="120"></td>
                      <td valign="top" style="padding-left:55px;"><a href="mercoflex.php"><img src="imagens/img_logo_mercoflex.jpg" border="0"></a></td>
                    </tr>
                    <tr>
                      <td>
                        <br/>
                        <div class="texto_servicos"><a href="mercosuper.php">F&aacute;cil  de operar, agiliza o atendimento no PDV e possibilita ampla coleta de  informa&ccedil;&otilde;es para uma administra&ccedil;&atilde;o segura e rent&aacute;vel.</a>                        </div>
                      </td>
                      <td width="254" valign="top">
                        <br/>
                        <div class="texto_servicos" style="padding-left:20px;"><a href="mercoflex.php">Solu&ccedil;&atilde;o  de Frente de Loja e Retaguarda desenvolvida em linguagem Java para  operar em Linux e Windows.</a>                        </div>
                    </tr>
                      <tr>
                        <td height="26" colspan="3"><img src="imagens/img_linha_horizontal.jpg"></td>
                      </tr>
                      </table>
                      <table width="503" border="0" cellspacing="0" cellpadding="3">
                        <tr>
                          <div class="texto_geral">
                          <p align="left" style="padding-left:25px;font: bold 15px Tahoma;">
                          <img src="imagens/img_seta.jpg"> Noticias
                          </p>
                          </div>
                        </tr>
                        <tr>
                          <?php
                          $rs_sql = 'SELECT * FROM tblettera WHERE idsecao = "1" AND status = "A" AND pagabertura = "S" ORDER BY datapublicacao DESC LIMIT 6';
                          $rs_query = mysql_query($rs_sql)or die($rs_sql);
                          $rs_linhas = mysql_num_rows($rs_query);
                          for($cont=0;$cont < $rs_linhas;$cont++){
                              $rs_dados = mysql_fetch_array($rs_query);
                              $rs_sql_imagem = 'SELECT * FROM tbletteraimagens WHERE id="'.$rs_dados['idimagem'].'"';
                              $rs_query_imagem = mysql_query($rs_sql_imagem);
                              $rs_linhas_imagem = mysql_num_rows($rs_query_imagem);
                              $rs_imagem = mysql_fetch_array($rs_query_imagem);
                          ?>
                          <td height="80" style="padding-bottom: 20px">
                            <div class="texto_titulo">
                            <?php if($rs_linhas_imagem > 0){ ?>
                                  <a href="noticias_interno.php?id=<?=$rs_dados['id'];?>&amp;id_secao=<?=$rs_dados['idsecao'];?>"><img align="left" src="dbimagens/thumbnail/<?=$rs_imagem['arquivo'];?>" height="50" border="0" style="margin-right: 5px" alt="<?=$rs_dados['assunto'];?>" title="<?=$rs_dados['assunto'];?>"/></a>
                            <?php } ?>
                            <p style="margin: 0px; padding: 0px; margin-left: 85px">
                            <a href="noticias_interno.php?id=<?=$rs_dados['id'];?>&amp;id_secao=<?=$rs_dados['idsecao'];?>">
                            <img src="imagens/img_seta.jpg" border="0"><?=$rs_dados['assunto'];?>
                            <?=$rs_dados['lead'];?>
                            </a>
                            </p>
                            </div>
                          </td>
                          <?php if($cont % 2 == 1){ print '</tr><tr>'; }        }  ?>
                        </tr>
                        <tr>
                          <td height="80" style="padding-bottom: 20px"><span style="padding-right: 20px"><a href="http://twitter.com/gzsistemas" target="_blank"><br>
                          <img src="imagens/1296046772_twitter.png" width="32" height="32" border="0"></a> <a href="http://www.facebook.com/pages/GZ-Sistemas/134905546556255" target="_blank"><img src="imagens/1296046780_facebook.png" width="32" height="32" border="0"></a> <a href="http://br.linkedin.com/pub/gz-sistemas-importa%C3%A7%C3%A3o-e-comercio-ltda/25/705/385" target="_blank"><img src="imagens/1296046787_linkedin.png" width="32" height="32" border="0"></a></span></td>
                        </tr>
                      </table>
                    </td>
                  <td width="10" valign="top"><img src="imagens/img_linha_vertical.jpg" width="2" height="676"></td>
                  <td width="240" align="center" valign="top">
                    <?php include("inc_lateral.php"); ?>
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
