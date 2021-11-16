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

</head>
<body>

<!--inicio da tabela geral-->
<table width="100%" border="0" cellspacing="0" cellpadding="0" class="bg_fundo_tabela">
  <tr>
    <td align="center" valign="top">
      <table width="775" border="0" cellpadding="0" cellspacing="0" bgcolor="#FFFFFF">
        <tr>
          <td align="center" valign="top">
            <?php include("inc_topo.php"); ?>
            <table width="775" border="0" cellspacing="0" cellpadding="0">
              <tr>
                <td width="775" align="center" valign="top">
                  <table width="90%" border="0" cellspacing="0" cellpadding="0" class="interna">
                    <form name="seja_revendedor" id="seja_revendedor" action="seja_revendedor_obrigado.php" method="post" onSubmit="return validaform_seja_revendedor(this)";>
                      <tr>
                        <td colspan="2" class="texto_fomularios" valign="top"><br/>
                          <p><strong>Formul&aacute;rio de Avalia&ccedil;&atilde;o Novo Revendedor</strong></p><br/>
                          Para ser uma revenda da GZ Sistemas, preencha o formul&aacute;rio de avalia&ccedil;&atilde;o abaixo:<br/><br/></td>
                      </tr>
                      <tr>
                        <td colspan="2"><div align="left" class="texto_fomularios"><strong>Dados Cadastrais</strong></div><br/></td>
                      </tr>
                      <tr>
                        <td width="160"><div align="right" class="texto_fomularios">Nome da Empresa:</div></td>
                        <td width="284"><input name="nomedaempresa" type="text" id="nomedaempresa" size="35" maxlength="40"><font color="#3E4289"> *</font></td>
                      </tr>
                      <tr>
                        <td><div align="right" class="texto_fomularios">Pessoa para Contato:</div></td>
                        <td><input name="contato" type="text" id="contato" size="35" maxlength="40"><font color="#3E4289"> *</font></td>
                      </tr>
                      <tr>
                        <td><div align="right" class="texto_fomularios">Cidade:</div></td>
                        <td><input name="cidade" type="text" id="cidade" size="35" maxlength="40"><font color="#3E4289"> *</font></td>
                      </tr>
                      <tr>
                        <td><div align="right" class="texto_fomularios">Estado:</div></td>
                        <td><select name="estado">
                            <option value="">Selecione </option>
                            <option value="AC">AC - Acre </option>
                            <option value="AL">AL - Alagoas </option>
                            <option value="AM">AM - Amazonas </option>
                            <option value="AP">AP - Amap&aacute; </option>
                            <option value="BA">BA - Bahia </option>
                            <option value="CE">CE - Ceara </option>
                            <option value="DF">DF - Distrito Federal </option>
                            <option value="ES">ES - Esp&iacute;rito Santo </option>
                            <option value="GO">GO - Goiás </option>
                            <option value="MG">MG - Minas Gerais </option>
                            <option value="MA">MA - Maranh&atilde;o </option>
                            <option value="MS">MS - Mato Grosso do Sul </option>
                            <option value="MT">MT - Mato Grosso </option>
                            <option value="PA">PA - Par&aacute; </option>
                            <option value="PB">PB - Para&iacute;ba </option>
                            <option value="PE">PE - Pernambuco </option>
                            <option value="PI">PI - Piaui </option>
                            <option value="PR">PR - Paran&aacute; </option>
                            <option value="RJ">RJ - Rio de Janeiro </option>
                            <option value="RO">RO - Rond&ocirc;nia </option>
                            <option value="RR">RR - Roraima </option>
                            <option value="RN">RN - Rio Grande do Norte </option>
                            <option value="RS">RS - Rio Grande do Sul </option>
                            <option value="SC">SC - Santa Catarina </option>
                            <option value="SE">SE - Sergipe </option>
                            <option value="SP">SP - S&atilde;o Paulo </option>
                            <option value="TO">TO - Tocantins </option>
                          </select><font color="#3E4289"> *</font></td>
                      </tr>
                      <tr>
                        <td><div align="right" class="texto_fomularios">(DDD)Telefone/Fax:</div></td>
                        <td><input name="telefone" type="text" id="telefone" onKeyPress="return FormatMask(document.seja_revendedor, 'telefone', '(00) 0000-0000', event);" size="35" maxlength="14"><font color="#3E4289"> *</font></td>
                      </tr>
                      <tr>
                        <td><div align="right" class="texto_fomularios">E-mail:</div></td>
                        <td><input name="email" type="text" id="email" size="35" maxlength="40"><font color="#3E4289"> *</font></td>
                      </tr>

					  <tr>
                        <td colspan="2"><div align="left" class="texto_fomularios"><br/><strong>Estrutura da Empresa</strong></div><br/></td>
                      </tr>

					   <tr>
                        <td colspan="2"><div align="left" class="texto_fomularios">&nbsp;Identifique seu quadro de funcion&aacute;rios (ex: 2 t&eacute;cnicos de &nbsp;hardware, 2 t&eacute;cnicos de software,...):</div></td>
                      </tr>
					  <tr>
					  	<td colspan="2" align="left"><textarea name="mensagem1" cols="48" rows="3" id="mensagem1"></textarea><font color="#3E4289"> *</font><br/><br/></td>
					  </tr>


					  <tr>
                        <td colspan="2"><div align="left" class="texto_fomularios">&nbsp;Identifique seus clientes (com n&uacute;mero) e ramo de atividade:</div></td>
                      </tr>
					  <tr>
					  	<td colspan="2" align="left"><textarea name="mensagem2" cols="48" rows="3" id="mensagem2"></textarea><font color="#3E4289"> *</font><br/><br/></td>
					  </tr>


					  <tr>
                        <td colspan="2"><div align="left" class="texto_fomularios">&nbsp;Meio de conex&atilde;o com a Internet:</div></td>
                      </tr>
					  <tr>
					  	<td colspan="2" align="left"><textarea name="mensagem3" cols="48" rows="2" id="mensagem3"></textarea><font color="#3E4289"> *</font><br/><br/></td>
					  </tr>


					  <tr>
                        <td colspan="2"><div align="left" class="texto_fomularios">&nbsp;Qual a disponibilidade para treinamento na GZ Sistemas?</div></td>
                      </tr>
					  <tr>
					  	<td colspan="2" align="left"><textarea name="mensagem4" cols="48" rows="3" id="mensagem4"></textarea><font color="#3E4289"> *</font><br/><br/></td>
					  </tr>



					    <tr>
                        <td colspan="2"><div align="left" class="texto_fomularios"><br/>
                        <strong>Conhecimentos Automa&ccedil;&atilde;o</strong></div>
                          <br/></td>
                      </tr>



					  <tr>
                        <td colspan="2"><div align="left" class="texto_fomularios">&nbsp;O que &eacute; automa&ccedil;&atilde;o comercial?</div></td>
                      </tr>
					  <tr>
					  	<td colspan="2" align="left"><textarea name="mensagem5" cols="48" rows="3" id="mensagem5"></textarea><font color="#3E4289"> *</font><br/><br/></td>
					  </tr>



					  <tr>
                        <td colspan="2"><div align="left" class="texto_fomularios">&nbsp;Voc&ecirc; j&aacute; trabalhou com quais softwares de automa&ccedil;&atilde;o comercial?</div></td>
                      </tr>
					  <tr>
					  	<td colspan="2" align="left"><textarea name="mensagem6" cols="48" rows="3" id="mensagem6"></textarea><font color="#3E4289"> *</font><br/><br/></td>
					  </tr>


					  <tr>
                        <td colspan="2"><div align="left" class="texto_fomularios">&nbsp;O que comp&otilde;e um PDV? Cite algumas marcas de perif&eacute;ricos<br/>&nbsp;com as quais voc&ecirc; j&aacute; trabalhou.</div></td>
                      </tr>
					  <tr>
					  	<td colspan="2" align="left"><textarea name="mensagem7" cols="48" rows="3" id="mensagem7"></textarea><font color="#3E4289"> *</font><br/><br/></td>
					  </tr>



					  <tr>
                        <td colspan="2"><div align="left" class="texto_fomularios">&nbsp;Quais s&atilde;o os perif&eacute;ricos que podem ser colocados em uma &nbsp;retaguarda? Cite as marcas com as quais voc&ecirc; j&aacute; trabalhou.</div></td>
                      </tr>
					  <tr>
					  	<td colspan="2" align="left"><textarea name="mensagem8" cols="48" rows="3" id="mensagem8"></textarea><font color="#3E4289"> *</font><br/><br/></td>
					  </tr>



					  <tr>
                        <td colspan="2"><div align="left" class="texto_fomularios">&nbsp;O que &eacute; ECF? Qual a sua import&acirc;ncia?</div></td>
                      </tr>
					  <tr>
					  	<td colspan="2" align="left"><textarea name="mensagem9" cols="48" rows="3" id="mensagem9"></textarea><font color="#3E4289"> *</font><br/><br/></td>
					  </tr>



					  <tr>
                        <td colspan="2"><div align="left" class="texto_fomularios"><br/>
                        <strong>Conhecimentos em Inform&aacute;tica</strong></div>
                          <br/></td>
                      </tr>


					  <tr>
                        <td colspan="2"><div align="left" class="texto_fomularios">&nbsp;Voc&ecirc; conhece ou j&aacute; trabalhou com quais redes?






</div></td>
                      </tr>
					  <tr>
					  	<td colspan="2" align="left"><textarea name="mensagem10" cols="48" rows="3" id="mensagem10"></textarea><font color="#3E4289"> *</font><br/><br/></td>
					  </tr>


					  <tr>
                        <td colspan="2"><div align="left" class="texto_fomularios">&nbsp;Qual seu grau de conhecimento com Windows 2000 e MsClient?</div></td>
                      </tr>
					  <tr>
					  	<td colspan="2" align="left"><textarea name="mensagem11" cols="48" rows="3" id="mensagem11"></textarea><font color="#3E4289"> *</font><br/><br/></td>
					  </tr>


					  <tr>
                        <td colspan="2"><div align="left" class="texto_fomularios">&nbsp;J&aacute; trabalhou ou conhece qual(is) base de dados(s)?</div></td>
                      </tr>
					  <tr>
					  	<td colspan="2" align="left"><textarea name="mensagem12" cols="48" rows="3" id="mensagem12"></textarea><font color="#3E4289"> *</font><br/><br/></td>
					  </tr>


					  <tr>
                        <td colspan="2"><div align="left" class="texto_fomularios">&nbsp;Qual seu grau de conhecimentos no ambiente DOS? Cite os &nbsp;arquivos de configura&ccedil;&atilde;o.</div></td>
                      </tr>
					  <tr>
					  	<td colspan="2" align="left"><textarea name="mensagem13" cols="48" rows="3" id="mensagem13"></textarea><font color="#3E4289"> *</font><br/><br/></td>
					  </tr>


					  <tr>
                        <td colspan="2"><div align="left" class="texto_fomularios"><br/><strong>Comentários</strong></div><br/></td>
                      </tr>


					  <tr>
                        <td colspan="2"><div align="left" class="texto_fomularios">&nbsp;Utilize este espa&ccedil;o para acrescentar informa&ccedil;&otilde;es sobre sua &nbsp;empresa.</div></td>
                      </tr>
					  <tr>
					  	<td colspan="2" align="left"><textarea name="mensagem14" cols="48" rows="4" id="mensagem14"></textarea><font color="#3E4289"> *</font><br/><br/></td>
					  </tr>

                      <tr>
                        <td colspan="2" align="center"><input type="submit" name="submit" value="Enviar"></td>
                      </tr>
                    </form>
					</table>
				</td>

				   </tr>
			       </table>

			<!--inicio do rodape-->
			 <?php include("inc_rodape.php"); ?>

            <!--fim da tabela principal-->
          </td>
		  </tr>
		</table>

      <!--fim da tabela geral-->
    </td>
  </tr>
</table>
</body>
</html>
