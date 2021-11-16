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
<script type="text/javascript" src="js/jquery.min.js"></script>
       <script src="js/geral.js" type="text/javascript"></script>	
<script language="JavaScript">
function mostra(campo) {
  document.getElementById(campo).style.display='' ;
}
function oculta(campo) {
  document.getElementById(campo).style.display='none' ;
}
function MM_openBrWindow(theURL,winName,features) { //v2.0
  window.open(theURL,winName,features);
}

function fnImagemPopUp( titulo, largura , altura , imagem , alt ) {
  var janela ;
  janela = window.open("","popFoto","width="+largura+",height="+altura+",scrollbars=no,toolbar=no,location=no,status=no,menubar=no,resizable=no,left=300,top=300'");
  janela.document.write('<html><head><LINK REL="SHORTCUT ICON" href="imagens/logo.gif"><title>' + titulo + '</title></head>');
  janela.document.write('<body leftmargin="0" topmargin="0" marginwidth="0" marginheight="0">');
  janela.document.write('<a href="javascript:window.close();"><img src="'+ imagem + '" alt="' + alt + '" border="0" /></a> ');
  janela.document.write('</body></html>');
}
</script>

<style type="text/css"></style>
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
                      <img src="imagens/img_seta.jpg"> Tradição e Tecnologia
                      </p></div><br/>
                    </tr>
                    <tr>
                      <td height="105"><div class="texto_geral"> 
                        <p class="texto_geral">Uma das pioneiras no mercado de automa&ccedil;&atilde;o comercial, a GZ Sistemas est&aacute; sempre<br> 
                          inovando conforme as oportunidades do mercado, tend&ecirc;ncias e estrat&eacute;gias de vendas,<br> 
                          dentro e fora do Brasil.<br>
                          <br>
                        </p>
                        <p class="texto_geral">Nosso trabalho &eacute; focado em pesquisas e desenvolvimento de novas solu&ccedil;&otilde;es em software<br> 
                          e hardware para melhor atender o segmento varejista, com sistemas para os ambientes<br> 
                          Windows e Linux, otimizados para melhor performance e seguran&ccedil;a na utiliza&ccedil;&atilde;o de<br> 
                          tecnologia Java. Trabalhamos com o que h&aacute; de mais atual em tecnologia, somado &agrave;<br>
                          experi&ecirc;ncia de mercado adquirida em todos estes anos de atua&ccedil;&atilde;o no Brasil.<br>
                          <br>
                        Preparada para atender tamb&eacute;m o mercado internacional, a GZ Sistemas desenvolve <br>
                        solu&ccedil;&otilde;es com suporte aos idiomas ingl&ecirc;s e espanhol e ferramentas para convers&atilde;o de moedas. <br>
                        <br>
                        </p>
                        <p class="texto_geral">Nossa cultura de trabalho se baseia na multiplica&ccedil;&atilde;o de conhecimentos, onde toda a <br>
                        experi&ecirc;ncia de mercado e qualifica&ccedil;&atilde;o profissional adquirida no dia-a-dia da empresa s&atilde;o<br> 
                        transmitidas aos colaboradores, em constante processo de reciclagem de conhecimentos,<br> 
                        com treinamentos internos baseados nos Certificados de Qualidade GZ Sistemas. </p>
                        <br>
                        

                      


                        
                      </td>
                    </tr>
                    <tr>
                      <td align="center">
                        <a href="#" onClick="fnImagemPopUp( 'GZ Sistemas - Nova Sede' , 640 , 480 , 'imagens/pdv.jpg' , 'Nova sede da GZ Sistemas' );">
                           <img src="imagens/pdv.jpg" alt="PDV completo com alta performance e seguran&ccedil;a." width="200" height="144" border="0"/>                        </a>
                        <div class="texto_geral">
                          <p align="center"  style="font: bold 12px Tahoma;">
                             PDV completo com alta performance e segurança.
                          </p>
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
