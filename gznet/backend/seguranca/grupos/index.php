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
	$default['modulo'] = 1 ;

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
	$default['filtro']		= 'grupo' ;
	// Nome do campo ordenado para visualização
	$default['ordem']		= 'grupo' ;
	// Nome do campo de busca dentro da tabela/db
	$default['busca']		= 'grupo' ;
	// Nome da tabela
	$default['tabela']		= 'tbsegurancagrupos' ;
	// Título do documento
	$default['titulo']		= 'Grupos de Acesso' ;
	// Quantidade singular de registros cadastrados por extenso
	$default['registro']	= 'grupo est&aacute; cadastrado no sistema.' ;
	// Quantidade plural de registros cadastrados por extenso
	$default['campos']		= 'grupos est&atilde;o cadastrados no sistema.' ;
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
		jMsg = "Atencao!\nTODOS OS USUARIOS DESTE GRUPO SERAO REMOVIDOS.\nConfirma exclusão do registro";
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
      <td align="center" bgcolor="#EBEBEB"><a href="index.php"><img src="<?php print $folders['icones'] ; ?>ico_lista.gif" alt="Listar todos os registros" title="Listar todos os registros" hspace="5" border="0" align="right" /></a>
        <input style="border: 0px;" type="image" src="<?php print $folders['icones'] ; ?>ico_buscar.gif" alt="Buscar" title="Buscar" align="right" />
        Buscar:</font> <input name="busca" type="text" id="busca" value="<?php print $var_busca ; ?>" size="24" maxlength="24" />
      </td>
    	<td colspan="5" align="center">
			<font color="#333333" size="2" face="Trebuchet MS"><a href="formcadastro.php?acao=I">Novo grupo</a></font>
		</td>
	</tr>
    <tr bgcolor="#F7F7F7">
		<td width="120" align="center"><a href="?pagina=<?php print $var_pagina ; ?>&amp;ordem=id%20desc&amp;busca=<?php print $var_busca ; ?>&amp;itens=<?php print $var_itens ; ?>"><img src="<?php print $folders['icones'] ; ?>ico_ordem_decres.gif" alt="Ordenar de Z a A" border="0" align="right" /></a><a href="?pagina=<?php print $num_pagina ; ?>&amp;ordem=id&amp;busca=<?php print $var_busca ; ?>&amp;itens=<?php print $var_item ; ?>"><img src="<?php print $folders['icones'] ; ?>ico_ordem_cres.gif" alt="Ordenar de A a Z" align="right" border="0" /></a><strong>C&oacute;digo</font></strong></td>
		<td align="center" bgcolor="#F7F7F7"><a href="?pagina=<?php print $var_pagina ; ?>&amp;ordem=grupo%20desc&amp;busca=<?php print $var_busca ; ?>&amp;itens=<?php print $var_itens ; ?>"><img src="<?php print $folders['icones'] ; ?>ico_ordem_decres.gif" alt="Ordenar de Z a A" border="0" align="right" /></a><a href="?pagina=<?php print $num_pagina ; ?>&amp;ordem=grupo&amp;busca=<?php print $var_busca ; ?>&amp;itens=<?php print $var_item ; ?>"><img src="<?php print $folders['icones'] ; ?>ico_ordem_cres.gif" alt="Ordenar de A a Z" align="right" border="0" /></a><strong>Grupos</font></strong></td>
		<td colspan="5" align="center"><strong>A&ccedil;&atilde;o</font></strong></td>
    </tr>
<?php
//*** Listing registers
	if ( $rs_linhas > 0 )
	{
		for ( $cont_i = 0 ; $cont_i < $rs_linhas ; $cont_i ++ )
		{

//*** Covers the table registers with the array
			$rs_dados = mysql_fetch_array ( $rs_query ) ;

//*** Verify if was actived
			if ( trim ( strtoupper ( $rs_dados['status'] )) == "A" )
			{
				$var_status = $folders['icones'] ."ico_ativo_on.gif" ;
			}
			else
			{
				$var_status = $folders['icones'] ."ico_ativo_off.gif" ;
			}
?>
    <tr bgcolor="#FFFFFF" onMouseOver="this.bgColor='#ededed';" onMouseOut="this.bgColor='#ffffff';">
		<td align="center"><font color="#333333" size="2" face="Trebuchet MS"><?php print $rs_dados['id'] ; ?></font></td>
		<td align="center"><font color="#333333" size="2" face="Trebuchet MS"><?php print $rs_dados['grupo'] ; ?></font></td>
		<td width="20" align="center"><a href="javascript:jJanelaPermissao(<?php print $rs_dados['id'] ; ?>);"><img src="<?php print $folders['icones'] ; ?>ico_permissoes.gif" alt="Alterar permiss&amp;otilde;es" border="0" /></a></td>
		<td width="20" align="center"><a href="mudastatus.php?id=<?php print $rs_dados['id'] ; ?>&amp;status=<?php print $rs_dados['status'] ; ?>&acao=A"><img src="<?php print $var_status ; ?>" alt="Ativo / Inativo" border="0" /></a></td>
		<td width="20" align="center"><a href="formcadastro.php?pagina=<?php print $var_pagina ; ?>&amp;id=<?php print $rs_dados['id'] ; ?>&amp;acao=A&amp;ordem=<?php print str_replace ( " ", "%20", $var_ordem ) ; ?>&amp;busca=<?php print $var_busca ; ?>&amp;itens=<?php print $var_itens ; ?>"><img src="<?php print $folders['icones'] ; ?>ico_alterar.gif" alt="Alterar" border="0" /></a></td>
	    <td width="20" align="center"><a href="javascript:jValidaExclusao('processacadastro.php?id=<?php print $rs_dados['id'] ; ?>&amp;pagina=<?php print $var_pagina ; ?>&amp;acao=E&amp;ordem=<?php print str_replace ( " ", "%20", $var_ordem ) ; ?>&amp;busca=<?php print $var_busca ; ?>&amp;itens=<?php print $var_itens ; ?>');"><img src="<?php print $folders['icones'] ; ?>ico_excluir.gif" alt="Excluir" border="0" /></a></td>
		<td width="20" align="center"><a href="formcadastro.php?pagina=<?php print $var_pagina ; ?>&amp;id=<?php print $rs_dados['id'] ; ?>&amp;acao=C&amp;ordem=<?php print str_replace ( " ", "%20", $var_ordem ) ; ?>&amp;busca=<?php print $var_busca ; ?>&amp;itens=<?php print $var_itens ; ?>"><img src="<?php print $folders['icones'] ; ?>ico_consultar.gif" alt="Consultar" border="0" /></a></td>
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