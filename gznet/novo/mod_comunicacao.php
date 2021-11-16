<?php session_start();?>
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
function mostra(campo){
    document.getElementById(campo).style.display='' ;
}
function oculta(campo){
    document.getElementById(campo).style.display='none' ;
}
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
                      <img src="imagens/img_seta.jpg"> Módulo de Comunicação
                      </p></div><br/>
                    </tr>
                    <tr>
                      <td height="105">
                        <div class="texto_geral">
                          <br/>
                          <p> Os m&oacute;dulos Comunicador e MultiLoja foram desenvolvidos pela GZ Sistemas para que seja poss&iacute;vel a comunica&ccedil;&atilde;o entre duas ou mais lojas, no caso de filiais. Interlig&aacute;-las, ou seja, permitir que todo o processo fique on-line. Por ex.: Quando &eacute; feita uma altera&ccedil;&atilde;o de pre&ccedil;o em uma das lojas, automaticamente a informa&ccedil;&atilde;o &eacute; transmitida para todas as outras, al&eacute;m do saldo tamb&eacute;m ser atualizado. Atualiza&ccedil;&atilde;o On-Line e imediata. </p><br/>
                          <p> Conhe&ccedil;a cada m&oacute;dulo em especifico: </p><br/>
                          <p><strong></strong></p>
                          <p><img src="imagens/img_seta.jpg"><strong> Comunicador </strong></p><br/>
                          <p> O <strong>Comunicador</strong> &eacute; um programa utilizado para interligar as lojas de modo &quot;on-line&quot;, ou seja, a cada modifica&ccedil;&atilde;o no cadastro, em qualquer loja, &eacute; gerado um log que altera em at&eacute; 5 segundos todas as lojas pelo protocolo IP. </p><br/>
                          <p> O Comunicador deverá ser instalado no servidor de cada loja da mesma rede, apenas a matriz necessita de um IP fixo e no sistema MercoSuper da matriz, através de parâmetros, selecionamos quais informações serão enviadas para as lojas.</p><br/>
                          <p> Mesmo sendo &quot;on-line&quot;, o uso do comunicador n&atilde;o dispensa a gera&ccedil;&atilde;o e envio de cadastro no in&iacute;cio do dia e gera&ccedil;&atilde;o e recep&ccedil;&atilde;o de movimento no final do dia. Para a utiliza&ccedil;&atilde;o deste m&oacute;dulo, &eacute; obrigat&oacute;rio que esteja instalado o m&oacute;dulo MultiLoja, sendo os dois m&oacute;dulos complementares. <strong></strong></p><br/>
                          <p><img src="imagens/img_seta.jpg"><strong>MultiLoja </strong></p><br>
                          <p>O m&oacute;dulo <strong>MultiLoja</strong> &eacute; necess&aacute;rio para efetuar a interliga&ccedil;&atilde;o das lojas. Faz a transfer&ecirc;ncia de arquivos que devem ser enviados &agrave;s filiais no in&iacute;cio do dia e a gera&ccedil;&atilde;o de movimento que ser&aacute; enviado das filiais &agrave; matriz no final do dia.<br></p>
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
</body>
</html>