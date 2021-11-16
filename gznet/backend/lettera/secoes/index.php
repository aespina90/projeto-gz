<?php
/**
* ./lettera/sessoes/index.php
* @author João Vítor Molinari projetos@logicadigital.com.br
* @copyright (c) 2006 Lógica Digital
* Descrição: Listagem de seções do lettra.
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
	$default['filtro']		= 'id' ;
	// Nome do campo ordenado para visualização
	$default['ordem']		= 'secao' ;
	// Nome do campo de busca dentro da tabela/db
	$default['busca']		= 'secao' ;
	// Nome da tabela
	$default['tabela']		= 'tbletterasecoes' ;
	// Título do documento
	$default['titulo']		= 'Seções do Lettera' ;
	// Quantidade singular de registros cadastrados por extenso
	$default['campos']	= 'se&ccedil;&otilde;es est&atilde;o cadastradas no sistema.' ;
	// Quantidade plural de registros cadastrados por extenso
	$default['registro']		= 'se&ccedil;&atilde;o esta cadastrada no sistema.' ;

//*** Inclusões:
	// Template: Validação de variáveis
	require ( $template['valvars'] ) ;
	// Condição de igualdade para conexão com banco de dados
	$rs_teste   = '' ; //' WHERE id="'. $var_id .'"' ;
	// Template: Conexão com o banco de dados
	require ( $template['rec_set'] ) ;

//*** Inclusões:
	// Template: Cabeçalho do HTML
	require ( $template['headers'] ) ;


?>
<script language="JavaScript" type="text/javascript">
// Validação da Busca
function jValidaBusca(form)
	{
		if (form.busca.value == "")
		{
			alert("Por favor, preencha o campo BUSCA corretamente.");
			form.busca.focus();
			return false;
		}
	}
// Exclusão de Registros
function jValidaExclusao(jURL)
	{
		jMsg = "Deseja realmente excluir o registro ?";
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
      <td align="center" bgcolor="#EBEBEB"><a href="index.php"><img src="<?php print $folders['icones'] ; ?>ico_lista.gif" alt="Listar todos os registros" title="Listar todos os registros" hspace="5" border="0" align="right" /></a>
        <input style="border: 0px;" type="image" src="<?php print $folders['icones'] ; ?>ico_buscar.gif" alt="Buscar" title="Buscar" align="right" />
        Buscar:</font> <input name="busca" type="text" id="busca" value="<?php print $var_busca ; ?>" size="24" maxlength="24" />
      </td>
    	<td colspan="5" align="center">
			<a href="formcadastro.php?acao=I">Nova se&ccedil;&atilde;o</a>
		</td>
	</tr>
    <tr bgcolor="#F7F7F7">
		<td width="120" align="center"><a href="?pagina=<?php print $var_pagina ; ?>&amp;ordem=id%20desc&amp;busca=<?php print $var_busca ; ?>&amp;itens=<?php print $var_itens ; ?>"><img src="<?php print $folders['icones'] ; ?>ico_ordem_decres.gif" alt="Ordenar de Z a A" border="0" align="right" /></a><a href="?pagina=<?php print $var_pagina ; ?>&amp;ordem=id&amp;busca=<?php print $var_busca ; ?>&amp;itens=<?php print $var_itens ; ?>"><img src="<?php print $folders['icones'] ; ?>ico_ordem_cres.gif" alt="Ordenar de A a Z" align="right" border="0" /></a><strong>C&oacute;digo</strong></td>
		<td align="center" bgcolor="#F7F7F7"><a href="?pagina=<?php print $var_pagina ; ?>&amp;ordem=secao%20desc&amp;busca=<?php print $var_busca ; ?>&amp;itens=<?php print $var_itens ; ?>"><img src="<?php print $folders['icones'] ; ?>ico_ordem_decres.gif" alt="Ordenar de Z a A" border="0" align="right" /></a><a href="?pagina=<?php print $var_pagina ; ?>&amp;ordem=secao&amp;busca=<?php print $var_busca ; ?>&amp;itens=<?php print $var_itens ; ?>"><img src="<?php print $folders['icones'] ; ?>ico_ordem_cres.gif" alt="Ordenar de A a Z" align="right" border="0" /></a><strong>Se&ccedil;&atilde;o</strong></td>
		<td colspan="5" align="center"><strong>A&ccedil;&atilde;o</strong></td>
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
		<td align="center"><?php print $rs_dados['secao'] ; ?></td>
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
	require ( $include['footer'] ) ;
?>