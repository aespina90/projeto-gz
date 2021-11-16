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

function onOff(id) {
    esconder = (document.getElementById(id).style.display == 'block');
    divs = document.getElementsByTagName('DIV');
    for(d=0; d<divs.length; d++){
        _div = divs[d];
        if (_div.className == 'texto_esconde'){
            id_link = 'titulo_'+(_div.id);
            _link = document.getElementById(id_link);

            if (_div.id != id){
               _div.style.display = 'none';
                if (_link) _link.style.color = '#3E4289';
    	    } else {
               _div.style.display = esconder ? 'none' : 'block';
               if (_link) _link.style.color = esconder ? '#3E4289' : '#3E4289';
    	    }
    	}
    }
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
                <td width="775" align="center" valign="top"> <br>
                  <table width="90%" border="0" cellspacing="0" cellpadding="0">
                    <tr>
                      <div class="texto_geral"><p align="left" style="padding-left:25px;font: bold 15px Tahoma;">
                      <img src="imagens/img_seta.jpg"> Concentrador
                      </p></div><br/>
                    </tr>
                    <tr>
                      <td height="105">
                        <div class="texto_geral"><br/>

			  <a href="#" onClick="fnImagemPopUp( 'GZ Sistemas - Telas' , 480 , 300 , 'imagens/mercosuper_vendas_gr.jpg' , 'Tela do sistema' );">
                    	  <img src="imagens/mercosuper_vendas_pq.jpg" border="0" alt="Tela do sistama"/></a><br/><br/>

                          <p>
                            &Eacute; um sistema que proporciona a <strong>interliga&ccedil;&atilde;o</strong> do Frente de Loja da GZ Sistemas com o sistema retaguarda de outras empresas de automa&ccedil;&atilde;o comercial. Esse sistema trabalha on-line com os PDV&acute;s (ponto de venda) e pode ser interligado via arquivos TXT e DBF.
                          </p><br/>
                          <p>
                            O sistema disponibiliza o <strong>Flash de Vendas</strong> que permite a identifica&ccedil;&atilde;o imediata da posi&ccedil;&atilde;o das vendas f&iacute;sicas e financeiras, por caixa ou no total, a qualquer momento, demonstrando os produtos vendidos, o consumo m&eacute;dio por cliente, etc.
                          </p><br/>
                          <p>
                            O sistema &eacute; utilizado junto ao <strong>Caixa GZ MercoSuper</strong> e pode ser interligado com alguns dos m&oacute;dulos auxiliares.
                          </p><br/>

                          <p>
                            <img src="imagens/img_seta.jpg"><a href="interliga_txt.pdf">
                            Clique aqui para baixar o <u><strong>Manual de Interligação</strong></u></a>
                           </p><br>
                          <p>

                          <a href="javascript:;" onClick="onOff('4')" id="titulo_4"><strong><u>Necessidades atendidas</u></strong></a><br/><br/>
                          <div class="texto_esconde" id="4" style="display:none; background-color:#F1F4F7;">
                            <p>
                              <strong>CAIXA: </strong>Flash de Venda (controle do que est&aacute; sendo vendido no PDV em tempo real), Consulta Cupom, Fechamento por Caixa e Operador Relat&oacute;rios de Resumo de Caixa, Cheques, Ocorr&ecirc;ncias, Finalizador, Venda por Produto, Sangria, Recebimento de Conta e Pagamento de Conta.
                            </p><br/>
                            <p>
                              <strong>MANUTEN&Ccedil;&Atilde;O:</strong> Troco Final, Cupom (Finalizador), Cancelamento de Cupom, Cadastro de &Iacute;ndice (Moeda) e Descarga de Movimento.
                            </p><br/>
                            <p>
                              <strong>MAPA RESUMO ECF:</strong> Digita&ccedil;&atilde;o, Emiss&atilde;o e Relat&oacute;rios.
                            </p><br/>
                            <p>
                              <strong>TROCA:</strong>Emiss&atilde;o de Ticket e Relat&oacute;rios.
                            </p><br/>
                          </div>
                        </div>
                      </td>
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