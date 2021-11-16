<?php session_start();?>
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN">
<html>
<head>
<LINK REL="SHORTCUT ICON" href="imagens/logo.gif"><title>GZ Sistemas</title>
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
</script>
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
            <!--inicio da tabela meio-->
            <table width="775" border="0" cellspacing="0" cellpadding="0">
              <tr>
                <td width="775" height="586" align="center" valign="top"> <br>
                  <table width="90%" border="0" cellspacing="0" cellpadding="0">
                    <tr>
                      <div class="texto_geral"><p align="left" style="padding-left:25px;font: bold 15px Tahoma;">
                      <img src="imagens/img_seta.jpg"> Módulo Financeiro
                      </p></div><br/>
                    </tr>
                    <tr>
                      <td height="105">
                        <div class="texto_geral"><br/>
                          <p>
                            O Controle Financeiro &eacute; formado por diversos m&oacute;dulos que juntos oferecem recursos importantes para um gerenciamento completo. Abaixo apresentamos, de modo exemplificado, cada m&oacute;dulo:
                          </p><br/>
                          <p>
                            <img src="imagens/img_seta.jpg"><strong> Controle Bancário</strong>
                          </p>

                          <a href="#" onClick="fnImagemPopUp( 'GZ Sistemas - Telas' , 480 , 300 , 'imagens/mercosuper_bancos_gr.jpg' , 'Tela do sistama' );">
                             <img src="imagens/mercosuper_bancos_pq.jpg" border="0" alt="Tela do sistama"/>
                          </a>

                          <p>
                            Este m&oacute;dulo permite o controle de toda a movimenta&ccedil;&atilde;o banc&aacute;ria, atrav&eacute;s de lan&ccedil;amentos manuais diretos ou atrav&eacute;s de informa&ccedil;&otilde;es dos m&oacute;dulos contas a pagar e contas a receber.<strong></strong>
                          </p><br/>
                          <p>
                            S&atilde;o relat&oacute;rios de movimenta&ccedil;&atilde;o por conta ou per&iacute;odo desejado, movimenta&ccedil;&atilde;o por hist&oacute;rico, extrato banc&aacute;rio e posi&ccedil;&atilde;o do saldo, controle de cheques como recebidos e devolvidos, consulta e posi&ccedil;&atilde;o do mesmo.
                          </p><br/><br/>
                          <p>
                            <img src="imagens/img_seta.jpg"><strong> Contas a Pagar </strong>
                          </p>

                          <a href="#" onClick="fnImagemPopUp( 'GZ Sistemas - Telas' , 480 , 300 , 'imagens/mercosuper_contas_gr.jpg' , 'Tela do sistama' );">
                             <img src="imagens/mercosuper_contas_pq.jpg" border="0" alt="Tela do sistama"/>
                          </a>

                          <p>
                            O Sistema Contas a Pagar controla todo processo de contas a pagar, desde o cadastramento de um título até a emissão do cheque de pagamento. É interligado ao módulo de controle bancário, gerando assim atualização automática da posição de conta bancaria simultânea ao pagamento do título.
                          </p><br/>
                          <p>
                            Apresenta relat&oacute;rios como Posi&ccedil;&atilde;o de T&iacute;tulos, Rela&ccedil;&atilde;o de T&iacute;tulos, Posi&ccedil;&atilde;o Sint&eacute;tico de Contas a Pagar, Movimentos Efetuados, Rela&ccedil;&atilde;o de Pagamentos, Ficha de Movimenta&ccedil;&atilde;o e Varia&ccedil;&atilde;o de Despesas.
                          </p><br/>
                          <p>
                            Possui algumas facilidades como Cadastros de Fornecedor, Centro de Custo, Tipo de Documento, &Iacute;ndice Di&aacute;rio, Manuten&ccedil;&atilde;o de T&iacute;tulos, Baixa de T&iacute;tulos, Autoriza&ccedil;&atilde;o de Pagamento (Montagem/Emiss&atilde;o).<strong></strong>
                          </p><br/><br/>

                          <p>
                            <img src="imagens/img_seta.jpg"><strong> Contas a Receber </strong>
                          </p>

                          <p>
                            Este m&oacute;dulo &eacute; uma ferramenta eficaz para estabelecer um controle de gerenciamento das contas a receber, desde o cadastramento de um t&iacute;tulo at&eacute; a emiss&atilde;o de boletos, recibos, etc.
                          </p><br/>
                          <p>
                            No Contas a Receber est&atilde;o dispon&iacute;veis diversos relat&oacute;rios impressos de posi&ccedil;&atilde;o de t&iacute;tulos a vencer ou vencidos, em aberto ou liquidados, podendo ser selecionada faixa de datas ou de clientes.
                          </p><br/>
                          <p>
                            O sistema permite a interliga&ccedil;&atilde;o ao banco de sua prefer&ecirc;ncia, facilitando a transmiss&atilde;o de t&iacute;tulos para cobran&ccedil;a.
                          </p><br/>
                          <p>
                            O sistema possui algumas facilidades como Cadastros de Clientes, &Iacute;ndice Di&aacute;rio e Dias N&atilde;o &Uacute;teis, Manuten&ccedil;&atilde;o de T&iacute;tulos, C&aacute;lculo de Acordo, Baixa de T&iacute;tulos, Cobran&ccedil;a: Border&ocirc; de Cobran&ccedil;a / Desconto / Bloqueto.
                          </p><br/><br/>

                          <p>
                            <img src="imagens/img_seta.jpg"><strong> Faturamento </strong>
                          </p>
                          <p>
                            Seu funcionamento se d&aacute; a partir da interliga&ccedil;&atilde;o do frente de loja com o balc&atilde;o, permitindo a gera&ccedil;&atilde;o de notas fiscais e boletos com base em cupons e pedidos. Emite notas de sa&iacute;da, entrada, devolu&ccedil;&atilde;o, produtor, cupom, cupom (entrada) e transfer&ecirc;ncia &ndash; no caso de mais de uma loja. Al&eacute;m de recibo, boleto e duplicata.
                          </p><br/>
                          <p>
                            Tamb&eacute;m oferece relat&oacute;rios das notas emitidas e canceladas no per&iacute;odo desejado, relat&oacute;rios de notas fiscais por clientes, transporte de carga e possibilita o cadastro de condi&ccedil;&atilde;o de pagamento, minimizando assim poss&iacute;veis erros operacionais.
                          </p><br/><br/>

                          <p>
                            <img src="imagens/img_seta.jpg"><strong>  Fluxo de Caixa </strong>
                          </p>
                          <p>
                            Este m&oacute;dulo foi desenvolvido para facilitar o gerenciamento dos recursos financeiros &ndash; entradas e sa&iacute;das - de forma a facilitar a administra&ccedil;&atilde;o dos compromissos e o planejamento de futuras despesas operacionais, de investimentos ou financiamentos da empresa. Alem de permitir relat&oacute;rios por per&iacute;odo desejado, com valores reais ou simulado.
                          </p>
                          <p>
                            <br>
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