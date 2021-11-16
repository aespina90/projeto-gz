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
function MM_openBrWindow(theURL,winName,features) { //v2.0
    window.open(theURL,winName,features);
}

function fnImagemPopUp( titulo, largura , altura , imagem , alt ){
    var janela ;
    janela = window.open("","popFoto","width="+largura+",height="+altura+",scrollbars=no,toolbar=no,location=no,status=no,menubar=no,resizable=no,left=300,top=300'");
    janela.document.write('<html><head><LINK REL="SHORTCUT ICON" href="imagens/logo.gif"><title>' + titulo + '</title></head>');
    janela.document.write('<body leftmargin="0" topmargin="0" marginwidth="0" marginheight="0">');
    janela.document.write('<a href="javascript:window.close();"><img src="'+ imagem + '" alt="' + alt + '" border="0" /></a> ');
    janela.document.write('</body></html>');

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
                      <img src="imagens/img_seta.jpg"> Frente de Loja [FLEXPDV]
                      </p></div><br/>
		    </tr>
                    <tr>
                      <td height="105" colspan="3" class="texto_geral"><br/>
                        <a href="#" onClick="fnImagemPopUp( 'GZ Sistemas - Telas' , 480 , 360 , 'imagens/tela_sistema1.jpg' , 'Telas do Sistema' );">
                        <img src="imagens/tela_sistema11.jpg" border="0" alt="Telas do Sistema"/></a></span>&nbsp;&nbsp;
                        <a href="#" onClick="fnImagemPopUp( 'GZ Sistemas - Telas' , 480 , 360 , 'imagens/tela_sistema2.jpg' , 'Telas do Sistema' );">
                        <img src="imagens/tela_sistema22.jpg" border="0" alt="Telas do Sistema"/></a></span>
                        <br/><br/>
                        <p>Pioneira no segmento de automação comercial, a GZ Sistemas lança o FlexPDV, software de frente de loja multi-plataforma (Windows / Linux). </p><br/>
                        <p>Para quem já conhece o PDV na versão DOS, o software FlexPDV mantém as mesmas funcionalidades, o mesmo modo de operação e o conceito de interface gráfica simples e ágil. </p><br/>
                        <p>Desenvolvido na plataforma Java, o software oferece maior qualidade gráfica, uso otimizado de memória, acesso a banco de dados, comunicação de rede via TCP/IP, entre outros recursos que não são possíveis ou são limitados utilizando a plataforma DOS.</p><br/>
                        <p>Podemos destacar também como nova funcionalidade no FlexPDV a atualização on-line do banco de dados do servidor (Retaguarda/Concentrador) assim que a venda é finalizada. Eliminamos com isso a limitação de algumas operações apenas após o fechamento do caixa. </p><br/>
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