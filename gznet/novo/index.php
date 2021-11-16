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
                      <td width="219" rowspan="4" valign="top"><img src="imagens/img_principal.jpg"></td>
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
                      <td height="50"><img src="imagens/img_servicos.jpg">
                        <br/>
                        <div class="texto_servicos"><a href="servicos.php">Nossos servi&ccedil;os s&atilde;o especificos e voltados para o resultado. Conhe&ccedil;a cada um deles.</a></div>
                      </td>
                      <td>
                        <a href="servicos.php"><img src="imagens/btn_marcado.jpg" border="0" style="margin-top:20px;"></a>
                      </td>
                    </tr>
                    <tr>
                      <td height="40"><img src="imagens/img_solucoes.jpg">
                        <div class="texto_servicos">
                        <a href="solucoes_tef.php">Discado, Dedicado e IP. Saiba mais.</a></div>
                      </td>
                      <td>
                        <a href="solucoes_tef.php"><img src="imagens/btn_marcado.jpg" border="0" style="margin-top:20px;"></a>
                      </td>
                    </tr>
                    <tr>
                      <td height="45" valign="top"><img src="imagens/img_softwares.jpg">
                        <br/>
                        <div class="texto_servicos">
                        <a href="softwares.php">Nossas solu&ccedil;&otilde;es s&atilde;o compostas por m&oacute;dulos que se adequam ao tamanho e   necessidades da sua empresa. Saiba mais.</a></div>
                      </td>
                      <td>
                        <a href="softwares.php"><img src="imagens/btn_marcado.jpg" border="0" style="margin-top:20px;"></a>
                      </td>
                    </tr>
                  </table><br/>
                  <table width="508" border="0" cellpadding="0" cellspacing="0">
                    <tr>
                      <td width="254" valign="top" style="padding-left:40px;"><a href="mercosuper.php"><img src="imagens/img_logo_mercosuper.jpg" border="0"></a></td>
                      <td rowspan="2"><img src="imagens/img_linha_vertical.jpg" width="2" height="120"></td>
                      <td width="254" valign="top" style="padding-left:55px;"><a href="mercoflex.php"><img src="imagens/img_logo_mercoflex.jpg" border="0"></a></td>
                    </tr>
                    <tr>
                      <td>
                        <br/>
                        <div class="texto_servicos"><a href="mercosuper.php">
                          F&aacute;cil de operar e possibilita ampla coleta<br/>
                          de informa&ccedil;&otilde;es para uma administra&ccedil;&atilde;o<br/>
                          segura e rent&aacute;vel</a>
                        </div>
                      </td>
                      <td width="254">
                        <br/>
                        <div class="texto_servicos" style="padding-left:20px;"><a href="mercoflex.php">
                          Linux e Windows. Este software oferece<br/>
                          Flexibilidade a todos os estabelecimentos.</a>
                        </div>
                    </tr>
                      <tr>
                        <td height="26" colspan="3"><img src="imagens/img_linha_horizontal.jpg"></td>
                      </tr>
                  </table>
                      <table width="494" border="0" cellspacing="0" cellpadding="3">
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
