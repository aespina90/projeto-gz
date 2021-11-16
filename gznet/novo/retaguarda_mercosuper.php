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
                      <img src="imagens/img_seta.jpg"> Retaguarda
                      </p></div><br/>
                    </tr>
                    <tr>
                      <td height="105">
                        <div class="texto_geral"><br/>
                          <p>
                            A GZ Sistemas desenvolveu solu&ccedil;&otilde;es em m&oacute;dulos que, integrados conforme as necessidades e
                            ao tamanho da empresa, atendem aos objetivos do empres&aacute;rio. Conhe&ccedil;a as nossas solu&ccedil;&otilde;es
                            e veja o que a GZ Sistemas pode fazer pelo seu neg&oacute;cio.
                          </p><br/>

			  <p>
			    <strong><img src="imagens/img_seta.jpg"> MiniMerco</strong>
			  </p><br/>

                          <p>
                            &Aacute;gil, Seguro e de Simples opera&ccedil;&atilde;o.
                          </p><br/>

                          <p>
                            O sistema MiniMerco atende &agrave;s necessidades das empresas de pequeno porte, como com&eacute;rcios e lojas de conveni&ecirc;ncias,
                            que n&atilde;o precisam manter um gerenciamento total do seu estabelecimento.
                          </p><br/>

                          <a href="javascript:;" onClick="onOff('1')" id="titulo_1"><strong><u>Necessidades atendidas</u></strong></a><br/><br/>
                          <div class="texto_esconde" id="1" style="display:none; background-color:#F1F4F7;">
                            <p>
                              <strong>PRODUTO:</strong> Cadastro de Produto, Setor (Balan&ccedil;a), Receita (Balan&ccedil;a), Informa&ccedil;&atilde;o Nutricional (Balan&ccedil;a) e Departamento.
                            </p><br/>
                            <p>
                              <strong>ESTOQUE:</strong> Entrada/Sa&iacute;da/Transfer&ecirc;ncia de Produtos, Emiss&atilde;o de Relat&oacute;rio de Posi&ccedil;&atilde;o de Estoque e Movimenta&ccedil;&atilde;o de Estoque.
                            </p><br/>
                            <p>
                              <strong>CLIENTE:</strong> Cadastro de Cliente Loja, Lista Negra de Clientes, Atualiza&ccedil;&atilde;o Di&aacute;ria de Saldo Devedor de Cliente, Manuten&ccedil;&atilde;o de Venda, Cancelamento de Venda, Emiss&atilde;o de Relat&oacute;rio de Extrato de Conta, Fechamento e Recebimento de Contas.
                            </p><br/>
                            <p>
                              <strong>CAIXA:</strong> Flash de Venda (controle do que est&aacute; sendo vendido no PDV em tempo real), Fechamento de Caixa, Emiss&atilde;o de Relat&oacute;rios de Cheques, Ocorr&ecirc;ncias, Venda por Produto, Recebimento de Conta, Pagamento de Conta, Digita&ccedil;&atilde;o de Mapa Resumo ECF, assim como emiss&atilde;o de Mapa Resumo e Relat&oacute;rio. Cadastro de Operador e Supervisor de Caixa.
                            </p><br/>
                            <p>
                              <strong>VENDAS:</strong> Atualiza&ccedil;&atilde;o Di&aacute;ria de Venda, Emiss&atilde;o de Relat&oacute;rio de Vendas.
                            </p><br/>
                            <p>
                              <strong>COMUNICA&Ccedil;&Atilde;O:</strong> Gera arquivos de comunica&ccedil;&atilde;o para a Balan&ccedil;a de Pesagem.
                            </p><br/>
                          </div>

                          <p>
                            <strong><img src="imagens/img_seta.jpg"> Merco</strong>
                          </p> <br/>

                          <p>
                            Gerenciamento mais completo do seu estabelecimento. Uma retaguarda mais compacta.
                          </p><br/>
                          <p>
                            O Sistema Merco possui todas as op&ccedil;&otilde;es do Mini Merco, al&eacute;m de oferecer um gerenciamento mais completo do seu estabelecimento, oferecendo op&ccedil;&otilde;es de controles e processos n&atilde;o existentes no Mini Merco, como por exemplo, controle de empresa e cliente conv&ecirc;nio.
                          </p><br/>

			  <p>
			    O Merco é uma retaguarda ágil e segura que possibilita através do Sistema de Caixa GZ Merco Super a interligação de vários PDV's (ponto de venda) sem número restrito de interligações.
			  </p><br/>

                          <p>
                            A retaguarda Merco pode ser interligada com o M&oacute;dulo Financeiro (Contas a Pagar, Contas a Receber, Bancos) e M&oacute;dulo Faturamento, disponibiliza tamb&eacute;m o Flash de Vendas que permite a identifica&ccedil;&atilde;o imediata da posi&ccedil;&atilde;o das vendas f&iacute;sicas e financeiras, por caixa ou no total, a qualquer momento, demonstrando os produtos vendidos, o consumo m&eacute;dio por cliente, etc.
                          </p><br/>

                          <a href="javascript:;" onClick="onOff('2')" id="titulo_2"><strong><u>Necessidades atendidas</u></strong></a><br/><br/>
                          <div class="texto_esconde" id="2" style="display:none; background-color:#F1F4F7;">
                            <p>
                              <strong>PRODUTO:</strong> Cadastro de Produto, F&oacute;rmula, Grupo, Arma&ccedil;&atilde;o, Comprador, Marca, Departamento e Vasilhame.
                            </p><br/>
                            <p>
                              <strong>PRE&Ccedil;OS:</strong> Altera&ccedil;&atilde;o de Pre&ccedil;o Unit&aacute;rio e Global, Reajuste de Pre&ccedil;o de Produtos.
                            </p><br/>
                            <p>
                              <strong>ESTOQUE:</strong> Emiss&atilde;o de Etiquetas (C&oacute;digo de Barras e Matricial), Controle de Estoque (Entrada/Sa&iacute;da/Transfer&ecirc;ncia), Emiss&atilde;o de Relat&oacute;rios de Posi&ccedil;&atilde;o de Estoque, Reposi&ccedil;&atilde;o de Estoque, Movimenta&ccedil;&atilde;o, Tabela de Pre&ccedil;o, Controle de Invent&aacute;rio.
                            </p><br/>
                            </p>
                              <strong>CLIENTE:</strong> Cadastro de Cliente Loja, Regi&atilde;o, Ramo de Atividade, Empresa Conv&ecirc;nio, Cliente Conv&ecirc;nio, Lista Negra, Emiss&atilde;o de Relat&oacute;rios de Extrato de Conta, Carta de Cobran&ccedil;a, Fechamento, Compras, Sint&eacute;tico, Recebimento, Documentos Quitados, Limite de Cr&eacute;dito do Cliente Loja e Cliente Conv&ecirc;nio e Saldo Devedor dos Clientes.
                            </p><br/>
                            <p>
                              <strong>MALA DIRETA:</strong> Emiss&atilde;o de Mala Direta e Etiquetas para Cliente Loja, Empresa Conv&ecirc;nio, Cliente Conv&ecirc;nio.
                            </p><br/>
                            <p>
                              <strong>FORNECEDOR:</strong> Cadastro de Fornecedor, Envio de Mala Direta, Emiss&atilde;o de Etiqueta, Digita&ccedil;&atilde;o/ Exclus&atilde;o de Notas Fiscais, Emiss&atilde;o de Relat&oacute;rios de Tabela de Pre&ccedil;o, Tabela Comparativa, Espelho de Nota Fiscal, ICMS e Nota Fiscal.
                            </p><br/>
                            <p>
                              <strong>CAIXA:</strong> Flash de Venda (controle do que est&aacute; sendo vendido no PDV em tempo real), Fechamento por Caixa e por Operador, Consulta de Cupom, Cancelamento de Cupom, Digita&ccedil;&atilde;o/Emiss&atilde;o/Relat&oacute;rios de Mapa Resumo ECF, Emiss&atilde;o de Ticket e Relat&oacute;rio de Devolu&ccedil;&atilde;o, Cadastro de Operador/Supervisor de Caixa, Vendedor, Moeda e Dias N&atilde;o &Uacute;teis para o Sistema.
                            </p><br/>
                            <p>
                              <strong>VENDAS:</strong> Atualiza&ccedil;&otilde;es Di&aacute;rias de Vendas, Curva ABC, Emiss&atilde;o de Relat&oacute;rios de Venda, Venda por Hora, Sint&eacute;tico Di&aacute;rio e Consumo M&eacute;dio, Controle de Comiss&atilde;o por Vendedor e Produto.
                            </p><br/>
                            <p>
                              <strong>COMUNICA&Ccedil;&Atilde;O:</strong> Gera arquivos de comunica&ccedil;&atilde;o para a Balan&ccedil;a de Pesagem, Terminal de Consulta / Coletor, Registradora (Carga de Produtos, Carga de Clientes e Importa&ccedil;&atilde;o de Movimento).
                            </p><br/>
                          </div>

                          <p>
                            <strong><img src="imagens/img_seta.jpg"> MercoSuper</strong>
                          </p><br/>

                          <p>
                            O sistema MercoSuper retaguarda é o sistema ideal para controlar e gerenciar de forma ágil e segura os mais diversos tipos de estabelecimento porque é completo. Possui todas as funções dos sistemas MiniMerco e Merco além de contar com mais informações de gerenciamento que um estabelecimento necessita.
                          </p><br/>
                          <p>
                            Não possui restrição ao número de interligações com o sistema de frente de loja [pdv] GZ MercoSuper e pode ser interligado também com os Módulos Financeiro, Faturamento, Mult Loja e Comunicador.
                          </p><br/>
                          <p>
                            O sistema oferece diversos relatórios gerenciais como curva abc da loja e da rede, margem de vendas por produto ou por período, rentabilidade dos produtos, vendas de produtos por hora, dia ou período desejado, venda relacionada, e outros relatórios importantes para a gestão da empresa.
                          </p><br/>

                          <a href="javascript:;" onClick="onOff('3')" id="titulo_3"><strong><u>Necessidades atendidas</u></strong></a><br/><br/>
                          <div class="texto_esconde" id="3" style="display:none; background-color:#F1F4F7;">
                            <p>
                              <strong>PRODUTO:</strong> Cadastro de Produto, F&oacute;rmula, Grupo, Arma&ccedil;&atilde;o, Comprador, Marca, Departamento, Vasilhame.
                            </p><br/>
                            <p>
                              <strong>PRE&Ccedil;OS:</strong> Tabela de C&aacute;lculo de Pre&ccedil;os, Equival&ecirc;ncia, Altera&ccedil;&atilde;o de Pre&ccedil;o Unit&aacute;rio e Global, Reajuste, Concilia&ccedil;&atilde;o de Pre&ccedil;o, Emiss&atilde;o de Etiquetas (C&oacute;digo de Barras e Matricial), Cadastro de Concorrente, Rela&ccedil;&atilde;o para Pesquisa de Concorrente.
                            </p><br/>
                            <p>
                              <strong>ESTOQUE:</strong> Entrada/Sa&iacute;da/Transfer&ecirc;ncia de Produtos, Emiss&atilde;o de Relat&oacute;rios de Posi&ccedil;&atilde;o de Estoque, Posi&ccedil;&atilde;o de Estoque por Loja, Reposi&ccedil;&atilde;o de Estoque, Movimenta&ccedil;&atilde;o, Tabela de Pre&ccedil;os, Controle Completo de Invent&aacute;rio e Produtos em Consigna&ccedil;&atilde;o.
                            </p><br/>
                            <p>
                              <strong>FIDELIZA&Ccedil;&Atilde;O DE CLIENTES / CLIENTE:</strong>Cadastro de Cliente Loja, Cliente e Empresa Conv&ecirc;nio, Lista Negra de Clientes, Emiss&atilde;o de Mala Direta para Clientes e Empresa Conv&ecirc;nio, Controle de Conv&ecirc;nio com Atualiza&ccedil;&atilde;o Di&aacute;ria de Saldo Devedor, Manuten&ccedil;&atilde;o de Venda, Transfer&ecirc;ncia de Venda, Cancelamento de Venda, Controle de Recebimento de Clientes e Emiss&atilde;o de Relat&oacute;rio de Extrato de Conta, Carta de Cobran&ccedil;a, Fechamento, Compras, Documentos Quitados, Emiss&atilde;o de Cart&atilde;o para Cliente Loja e Conv&ecirc;nio, Atualiza&ccedil;&atilde;o de Limite Cheque-Pr&eacute; dos Clientes, Emiss&atilde;o de Relat&oacute;rios de Limite de Cr&eacute;dito, Inativos e Saldo Devedor Cliente Loja e Conv&ecirc;nio.
                            </p><br/>
                            <p>
                              <strong>CAIXA:</strong>Flash de Venda (controle do que est&aacute; sendo vendido no PDV em tempo real), Consulta Cupom, Fechamento por Caixa e Operador, Manuten&ccedil;&atilde;o e Cancelamento de Cupom, Digita&ccedil;&atilde;o/Emiss&atilde;o/Relat&oacute;rio de Mapa Resumo ECF, Cadastro de Operador, Supervisor, Vendedor, Dias N&atilde;o &Uacute;teis, &Iacute;ndice (Moeda), Emiss&atilde;o de Relat&oacute;rios de Resumo de Caixa, Cheques, Entregas, Ocorr&ecirc;ncias, Finalizador, Venda Por Produto, Cancelamentos, Sangria, Recebimento e Pagamento de Conta.
                            </p><br/>
                            <p>
                              <strong>VENDAS:</strong>Atualiza&ccedil;&atilde;o Di&aacute;ria de Venda, Curva ABC de Venda, Venda Mensal, Cliente, Vendedor, Comiss&atilde;o de Vendedor e Produtos, Emiss&atilde;o de Relat&oacute;rios de Venda, Venda Di&aacute;ria, Venda Mensal, Venda (Cliente), ICMS (Produto),Venda por Hora, Sint&eacute;tico Di&aacute;rio
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