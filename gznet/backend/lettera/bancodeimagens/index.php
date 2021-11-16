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
		jMsg = "Deseja Realmente excluir o Arquivo?";
		input_box=confirm(jMsg);
		if (input_box==true)
		{
			// Output when OK is clicked
			location.href = jURL;
		}
	}
	function jJanelaPermissao(jID)
	{
		window.open("formPermissao.php?acao=A&id="+jID, "janelaPermissoes", "width=820,height=420,top=20,left=20,status=no,toolbar=no,menubar=no,location=no,resizable=no,scrollbars=yes");
	}
</script>
<?php
//*** Inclusões:
	// Menu da aplicação
	require ( $include['menu'] ) ;
?>
<form action="index.php" name="formItens" id="formItens">
<table width="760" border="0" align="center" cellpadding="3" cellspacing="1" bgcolor="#CCCCCC">
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
      <td colspan="2" align="center" bgcolor="#EBEBEB"><a href="index.php"><img src="<?php print $folders['icones'] ; ?>ico_lista.gif" alt="Listar todos os registros" title="Listar todos os registros" hspace="5" border="0" align="right" /></a>
        <input style="border: 0px;" type="image" src="<?php print $folders['icones'] ; ?>ico_buscar.gif" alt="Buscar" title="Buscar" align="right" />
        Buscar:</font> <input name="busca" type="text" id="busca" value="<?php print $var_busca ; ?>" size="24" maxlength="24" />
      </td>
    	<td colspan="3" align="center">
			<a href="formcadastro.php?acao=I">Nova Imagem</a>
		</td>
	</tr>
    <tr bgcolor="#F7F7F7">
		<td width="100" align="center"><strong>C&oacute;digo</strong></td>
		<td align="center"><strong>Arquivo</strong></td>
		<td align="center"><a href="?ordem=descricao&amp;pagina=<?php echo $nPagina?>&amp;itens=<?php echo $nItens?>&amp;busca=<?php echo $nBusca?>"><img src="<?php print $folders['icones'] ; ?>ico_ordem_decres.gif" border="0" align="right" alt="Ordem Decrescente" /></a><a href="?ordem=descricao%20DESC&amp;pagina=<?php echo $nPagina?>&amp;itens=<?php echo $nItens?>&amp;busca=<?php echo $nBusca?>"><img src="<?php print $folders['icones'] ; ?>ico_ordem_cres.gif" border="0" align="right" alt="Ordem Crescente" /></a><strong>Descri&ccedil;&atilde;o</strong></td>
		<td colspan="3" align="center"><strong>A&ccedil;&atilde;o</strong></td>
    </tr>
<?php
//*** Listing registers
	if ( $rs_linhas > 0 )
	{
		for ( $cont_i = 0 ; $cont_i < $rs_linhas ; $cont_i ++ )
		{

//*** Covers the table registers with the array
			$rs_dados = mysql_fetch_array ( $rs_query ) ;?>
    <tr bgcolor="#FFFFFF" onMouseOver="this.bgColor='#ededed';" onMouseOut="this.bgColor='#ffffff';">
		<td align="center"><?php print $rs_dados['id'] ; ?></td>
		<td width="185" align="center"><img src="<?php print $folders['dbimagens'] . $rs_dados['arquivo'] ; ?>" alt="<?php print $rs_dados['descricao'] ; ?>" title="<?php print $rs_dados['descricao'] ; ?>" border="0" width="60" height="45" /></td>
		<td align="center"><?php print $rs_dados['descricao'] ; ?></td>
		<td width="20" align="center"><a href="formcadastro.php?pagina=<?php print $var_pagina ; ?>&amp;id=<?php print $rs_dados['id'] ; ?>&amp;acao=A&amp;ordem=<?php print str_replace ( " ", "%20", $var_ordem ) ; ?>&amp;busca=<?php print $var_busca ; ?>&amp;itens=<?php print $var_itens ; ?>"><img src="<?php print $folders['icones'] ; ?>ico_alterar.gif" title="Alterar" alt="Alterar" border="0" /></a></td>
	    <td width="20" align="center"><a href="javascript:jValidaExclusao('processacadastro.php?id=<?php print $rs_dados['id'] ; ?>&amp;pagina=<?php print $var_pagina ; ?>&amp;acao=E&amp;ordem=<?php print str_replace ( " ", "%20", $var_ordem ) ; ?>&amp;busca=<?php print $var_busca ; ?>&amp;itens=<?php print $var_itens ; ?>');"><img src="<?php print $folders['icones'] ; ?>ico_excluir.gif" title="Excluir" alt="Excluir" border="0" /></a></td>
		<td width="20" align="center"><a href="formcadastro.php?pagina=<?php print $var_pagina ; ?>&amp;id=<?php print $rs_dados['id'] ; ?>&amp;acao=C&amp;ordem=<?php print str_replace ( " ", "%20", $var_ordem ) ; ?>&amp;busca=<?php print $var_busca ; ?>&amp;itens=<?php print $var_itens ; ?>"><img src="<?php print $folders['icones'] ; ?>ico_consultar.gif" title="Consultar" alt="Consultar" border="0" /></a></td>
    </tr>
<?php
		}
	}
?>
	<tr align="left" bgcolor="#F7F7F7">
		<td colspan="8">
			<font size="2" face="Trebuchet MS"><strong><?php print $var_registro ; ?></strong>&nbsp;<?php $var_registro != 1 ? print $default['campos'] : print $default['registro'] ; ?></font>
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
	require ( $include['footer'] ) ;
?>