<?php
/**
* ./seguranca/grupos/index.php
* @author Maikel Finck projetos@logicadigital.com.br
* @copyright (c) 2006 Lógica Digital
* Descrição: Listagem do cadastro de vendedores.
*/

//*** Início da sessão
	session_start() ;

//*** Propriedades página
	// Nível
	$default['nivel'] = '../../' ;
	// Número do módulo
	$default['modulo'] = 2 ;

//*** Inclusões:
	// Configurações da aplicação
	require ( $default['nivel'] . 'global.php' ) ;
	// Conexão com o banco de dados
	require ( $include['conexao'] ) ;
	// Funçoes
	require ( $include['funcao'] ) ;
	// Template: Leitura de _Get e/ou _Post
	require ( $template['getpost'] ) ;

//*** Função de segurança
	fun_seguranca ( $_SESSION[$session['iduser']] , $_SESSION[$session['idgrupo']] , $default['modulo'] , 'C' , $default['nivel'] ) ;

//*** Variáveis locais
	// Filtro utilizado
	$default['filtro']		= 'descricao ' ;
	// Nome do campo ordenado para visualização
	$default['ordem']		= 'descricao ' ;
	// Nome do campo de busca dentro da tabela/db
	$default['busca']		= 'descricao ' ;
	// Nome da tabela
	$default['tabela']		= 'tbletteraimagens' ;
	// Título do documento
	$default['titulo']		= 'Imagens' ;
	// Quantidade singular de registros cadastrados por extenso
	$default['registro']	= 'imagem est&aacute; cadastrada no sistema.' ;
	// Quantidade plural de registros cadastrados por extenso
	$default['campos']		= 'imagens est&atilde;o cadastradas no sistema.' ;
	// Condição de igualdade para conexão com banco de dados
	$rs_teste   = '' ; //' WHERE id="'. $var_id .'"' ;
	// Outros particulares
	$default['_campo2']		= 'descricao' ;
	$default['_titcampo2']	= 'Descri&ccedil;&atilde;o' ;

//*** Inclusões:
	// Template: Validação de variáveis
	require ( $template['valvars'] ) ;
	// Template: Conexão com o banco de dados
	require ( $template['rec_set'] ) ;
	// Template: Cabeçalho do HTML
	require ( $template['headers'] ) ;
?>

<script language="JavaScript" type="text/javascript">
	function jValidaBusca(form)
	{
		if (form.busca.value == "")
		{
			alert("Por favor, preencha o campo BUSCA corretamente.");
			form.busca.focus();
			return false;
		}
	}
	function jValidaExclusao(jURL)
	{
		jMsg = "Atencao!\nDeseja realmente remover o registro";
		input_box=confirm(jMsg);
		if (input_box==true)
		{
			// Output when OK is clicked
			location.href = jURL;
		}
	}
</script>
<?php
//*** Inclusões:
	// Menu da aplicação
	require ( $include['popmenu'] ) ;
?>
<form action="indiceimagens.php" name="formItens" id="formItens">
<table width="750" border="0" align="center" cellpadding="3" cellspacing="1" bgcolor="#CCCCCC">
	<tr>
		<th colspan="7">Cadastro de <?php print $default['titulo'] ; ?></th>
	</tr>
  <tr bgcolor="#EBEBEB">
      <td align="center">
      	<input type="hidden" name="pagina" id="pagina" value="<?php print $var_pagina ; ?>" />
      	<input type="hidden" name="ordem" id="ordem" value="<?php print str_replace ( " ", "%20", $var_ordem ) ; ?>" />
	  	<input type="text" name="itens" id="itens" value="<?php print $var_itens ; ?>" size="2" maxlength="2" style="font: xx-small Trebuchet MS;" />
      	<input style="border: 0px;" type="image" src="<?php print $folders['icones'] ; ?>ico_seta.gif" alt="Itens" />
	  </td>
      <td colspan="2" align="center" bgcolor="#EBEBEB"><font color="#000066" size="2" face="Trebuchet MS"><a href="index.php"><img src="<?php print $folders['icones'] ; ?>ico_lista.gif" alt="Listar todos os registros" title="Listar todos os registros" hspace="5" border="0" align="right" /></a>
        <input style="border: 0px;" type="image" src="<?php print $folders['icones'] ; ?>ico_buscar.gif" alt="Buscar" title="Buscar" align="right" />
        Buscar:</font> <input name="busca" type="text" id="busca" value="<?php print $var_busca ; ?>" size="24" maxlength="24" />
      </td>
    	<td colspan="4" align="center">
			<font color="#333333" size="2" face="Trebuchet MS"><a href="formcadastro.php?acao=I&amp;pagina=<?php print $var_pagina ; ?>&amp;ordem=<?php print str_replace ( " ", "%20", $var_ordem ) ; ?>&amp;busca=<?php print $var_busca ; ?>&amp;itens=<?php print $var_itens ; ?>">Nova Imagem</a></font>
		</td>
	</tr>
    <tr bgcolor="#F7F7F7">
		<td width="100" align="center"><strong>C&oacute;digo</strong></td>
		<td align="center"><a href="?ordem=arquivo&pagina=<?php echo $nPagina?>&itens=<?php echo $nItens?>&busca=<?php echo $nBusca?>"><img src="<?php print $folders['icones'] ; ?>ico_ordem_decres.gif" border="0" align="right" alt="Ordem Decrescente"></a><a href="?ordem=arquivo%20DESC&pagina=<?php echo $nPagina?>&itens=<?php echo $nItens?>&busca=<?php echo $nBusca?>"><img src="<?php print $folders['icones'] ; ?>ico_ordem_cres.gif" border="0" align="right" alt="Ordem Crescente"></a><strong>Arquivo</strong></td>
		<td align="center"><a href="?ordem=descricao&pagina=<?php echo $nPagina?>&itens=<?php echo $nItens?>&busca=<?php echo $nBusca?>"><img src="<?php print $folders['icones'] ; ?>ico_ordem_decres.gif" border="0" align="right" alt="Ordem Decrescente"></a><a href="?ordem=descricao%20DESC&pagina=<?php echo $nPagina?>&itens=<?php echo $nItens?>&busca=<?php echo $nBusca?>"><img src="<?php print $folders['icones'] ; ?>ico_ordem_cres.gif" border="0" align="right" alt="Ordem Crescente"></a><strong>Descri&ccedil;&atilde;o</strong></td>
		<td>&nbsp;</td>
    </tr>
<?php
//*** Listing registers
	if ( $rs_linhas > 0 )
	{
		for ( $cont_i = 0 ; $cont_i < $rs_linhas ; $cont_i ++ )
		{

//*** Covers the table registers with the array
			$rs_dados = mysql_fetch_array ( $rs_query ) ;
?>
    <tr bgcolor="#FFFFFF" onMouseOver="this.bgColor='#ededed';" onMouseOut="this.bgColor='#ffffff';">
		<td align="center"><?php print $rs_dados['id'] ; ?></td>
		<td width="185" align="center"><img src="<?php print $folders['dbimagens'] . $rs_dados['arquivo'] ; ?>" alt="<?php print $rs_dados['descricao'] ; ?>" title="<?php print $rs_dados['descricao'] ; ?>" border="0" width="60" height="45"></td>
		<td align="center"><?php print $rs_dados['descricao'] ; ?></td>
		<td align="center" width="20"><a href="#"><img src="<?php print $folders['icones'] ; ?>ico_seta.gif" alt="Escolher este arquivo" title="Escolher este arquivo" border="0" onClick="window.opener.document.formCadastro.id_imagem.value=<?php print $rs_dados['id'] ; ?>;window.close();"></a></td>
    </tr>
<?php
		}
	}
?>
	<tr align="left" bgcolor="#F7F7F7">
		<td colspan="8">
			<font size="2" face="Trebuchet MS"><strong><?php print $var_registro ; ?></strong>&nbsp;<?php $var_registro > 1 ? print $default['campos'] : print $default['registro'] ; ?></font>
		</td>
	</tr>
	<tr align="left" bgcolor="#FFFFFF">
		<td colspan="8" align=right>
<?php
	// Paginação
	print fun_paginacao ( $var_pagina , $var_totalpaginas , 'txt_col' , 2 , $var_itens , $var_ordem , $var_busca ) ;
?>
		</td>
	</tr>
</table>
</form>
<?php
//*** Inclusões:
	// Rodapé da aplicação
	require ( $include['popfooter'] ) ;
?>