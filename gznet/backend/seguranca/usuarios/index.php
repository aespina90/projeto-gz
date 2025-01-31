<?php
/**
* ./seguranca/grupos/index.php
* @author Maikel Finck projetos@logicadigital.com.br
* @copyright (c) 2006 L�gica Digital
* Descri��o: Listagem do cadastro de vendedores.
*/

//*** In�cio da sess�o
	session_start() ;

//*** Propriedades p�gina
	// N�vel
	$default['nivel'] = '../../' ;
	// N�mero do m�dulo
	$default['modulo'] = 1 ;

//*** Inclus�es:
	// Configura��es da aplica��o
	require ( $default['nivel'] . 'global.php' ) ;
	// Conex�o com o banco de dados
	require ( $include['conexao'] ) ;
	// Fun�oes
	require ( $include['funcao'] ) ;
	// Template: Leitura de _Get e/ou _Post
	require ( $template['getpost'] ) ;

//*** Fun��o de seguran�a
	fun_seguranca ( $_SESSION[$session['iduser']] , $_SESSION[$session['idgrupo']] , $default['modulo'] , 'C' , $default['nivel'] ) ;

//*** Vari�veis locais
	// Filtro utilizado
	$default['filtro']		= 'nome' ;
	// Nome do campo ordenado para visualiza��o
	$default['ordem']		= 'nome' ;
	// Nome do campo de busca dentro da tabela/db
	$default['busca']		= 'tbsegurancausuarios.nome' ;
	// T�tulo do documento
	$default['titulo']		= 'Usu&aacute;rios' ;
	// Quantidade singular de registros cadastrados por extenso
	$default['registro']	= 'usu&aacute;rio est&aacute; cadastrado no sistema.' ;
	// Quantidade plural de registros cadastrados por extenso
	$default['campos']		= 'usu&aacute;rios est&atilde;o cadastrados no sistema.' ;
	// Condi��o de igualdade para conex�o com banco de dados
	$rs_teste   = '' ; //' WHERE id="'. $var_id .'"' ;
	// Outros particulares
	$default['_campo2']		= 'descricao' ;
	$default['_titcampo2']	= 'Descri&ccedil;&atilde;o' ;

//*** Inclus�es:
	// Template: Valida��o de vari�veis
	require ( $template['valvars'] ) ;
//*** Conex�o com o banco de dados - Dados de pagina��o
	// Sele��o de registros da tabela
	$rs_sql = "SELECT tbsegurancausuarios.id, tbsegurancausuarios.status, tbsegurancausuarios.nome, ".
			  "tbsegurancausuarios.idgrupo, tbsegurancagrupos.grupo FROM ".
			  "tbsegurancagrupos INNER JOIN tbsegurancausuarios ON tbsegurancausuarios.idgrupo = ".
			  "tbsegurancagrupos.id WHERE tbsegurancausuarios.id <> 0" ;
	// Filtragem de busca
	if ( $var_busca != '' )
	{
  		$rs_busca = ' AND ' . $default['busca'] . ' LIKE "%' . $var_busca . '%"' ;
	}
	// Atribui��o do comando
	$rs_sql    .= $rs_teste . $rs_busca ;
	// Execu��o do comando
	$rs_query   = mysql_query ( $rs_sql , $conexao['conexao'] ) ;
	// N�mero de registros encontrados
	$rs_linhas  = mysql_num_rows ( $rs_query ) ;
	// Grava o n�mero de registros encontrados
	$var_registro = $rs_linhas ;
	// Grava o n�mero de p�ginas por itens
	$var_totalpaginas = ceil ( $rs_linhas / $var_itens ) ;
	// Verifica o n�mero da p�gina
	if (( $var_pagina == '' ) or ( intval ( $var_pagina ) < 1 ))
	{
	  	// Reseta o n�mero da p�gina
		$var_pagina = 1 ;
		// Reseta o marcador de registro
		$num_inicio = 0 ;
	}
	else
	{
		if ( intval ( $var_pagina ) > $rs_linhas )
		{
		  	// Seta a p�gina como a �ltima
			$var_pagina = $rs_linhas ;
			// Seta o marcador de registros para os �ltimos n itens
			$num_inicio = ( $var_pagina - 1 )* $var_itens ;
		}
		else
		{
		  	// Seta o marcador de registro para os itens da p�gina atual
			$num_inicio = ( $var_pagina - 1 )* $var_itens ;
		}
	}

//*** Conex�o com o banco de dados - Dados para impress�o
	// Sele��o de registros da tabela
	$rs_sql = "SELECT tbsegurancausuarios.id, tbsegurancausuarios.status, tbsegurancausuarios.nome, ".
			  "tbsegurancausuarios.idgrupo, tbsegurancagrupos.grupo FROM ".
			  "tbsegurancagrupos INNER JOIN tbsegurancausuarios ON tbsegurancausuarios.idgrupo = ".
			  "tbsegurancagrupos.id WHERE tbsegurancausuarios.id <> 0" ;
	// Filtragem de busca
	if ( $var_busca != '' )
	{
  		$rs_busca = ' AND ' . $default['busca'] . ' LIKE "%' . $var_busca . '%"' ;
	}
	// Ordena��o de dados
	if ( $var_ordem != '' )
	{
		$rs_ordem = ' ORDER BY '. $var_ordem ;
	}
	// Limite de dados na tela
	$rs_maximo  = ' LIMIT '. $num_inicio .', '. $var_itens ;
	// Atribui��o do comando
	$rs_sql    .= $rs_teste . $rs_busca . $rs_ordem . $rs_maximo ;
	// Execu��o do comando
	$rs_query   = mysql_query ( $rs_sql , $conexao['conexao'] ) ;
	// N�mero de registros encontrados
	$rs_linhas  = mysql_num_rows ( $rs_query ) ;

	// Template: Cabe�alho do HTML
	require ( $template['headers'] ) ;
?>
	<script language="JavaScript" type="text/javascript">
	//Valida��o do Formul�rio
	function fVerificaForm(form,evento){
		if (form.busca.value==""){
			alert("Aten��o!\nO campo BUSCA deve ser preenchido.");
			form.busca.focus();
			return false;}
	}
	//Valida��o de Exclus�o
	function jValidaExclusao(jURL)
	{
		jMsg = "Deseja realmente excluir o registro?";
		input_box=confirm(jMsg);
		if (input_box==true)
		{
			// Output when OK is clicked
			location.href = jURL;
		}
	}
	</script>
<?php
//*** Inclus�es:
	// Menu da aplica��o
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
    	<td colspan="4" align="center">
			<font color="#333333" size="2" face="Trebuchet MS"><a href="formcadastro.php?acao=I&amp;pagina=<?php print $var_pagina ; ?>&amp;ordem=<?php print str_replace ( " ", "%20", $var_ordem ) ; ?>&amp;busca=<?php print $var_busca ; ?>&amp;itens=<?php print $var_itens ; ?>">Novo Usu&aacute;rio</a></font>
		</td>
	</tr>
    <tr bgcolor="#F7F7F7">
		<td width="120" align="center"><a href="?pagina=<?php print $var_pagina ; ?>&amp;ordem=id%20desc&amp;busca=<?php print $var_busca ; ?>&amp;itens=<?php print $var_itens ; ?>"><img src="<?php print $folders['icones'] ; ?>ico_ordem_decres.gif" alt="Ordenar de Z a A" border="0" align="right" /></a><a href="?pagina=<?php print $num_pagina ; ?>&amp;ordem=id&amp;busca=<?php print $var_busca ; ?>&amp;itens=<?php print $var_item ; ?>"><img src="<?php print $folders['icones'] ; ?>ico_ordem_cres.gif" alt="Ordenar de A a Z" align="right" border="0" /></a><strong>C&oacute;digo</font></strong></td>
		<td width="150" align="center" bgcolor="#F7F7F7"><a href="?pagina=<?php print $var_pagina ; ?>&amp;ordem=grupo%20desc&amp;busca=<?php print $var_busca ; ?>&amp;itens=<?php print $var_itens ; ?>"><img src="<?php print $folders['icones'] ; ?>ico_ordem_decres.gif" alt="Ordenar de Z a A" border="0" align="right" /></a><a href="?pagina=<?php print $num_pagina ; ?>&amp;ordem=grupo&amp;busca=<?php print $var_busca ; ?>&amp;itens=<?php print $var_item ; ?>"><img src="<?php print $folders['icones'] ; ?>ico_ordem_cres.gif" alt="Ordenar de A a Z" align="right" border="0" /></a><strong>Grupo</font></strong></td>
		<td align="center" bgcolor="#F7F7F7"><a href="?pagina=<?php print $var_pagina ; ?>&amp;ordem=grupo%20desc&amp;busca=<?php print $var_busca ; ?>&amp;itens=<?php print $var_itens ; ?>"><img src="<?php print $folders['icones'] ; ?>ico_ordem_decres.gif" alt="Ordenar de Z a A" border="0" align="right" /></a><a href="?pagina=<?php print $num_pagina ; ?>&amp;ordem=grupo&amp;busca=<?php print $var_busca ; ?>&amp;itens=<?php print $var_item ; ?>"><img src="<?php print $folders['icones'] ; ?>ico_ordem_cres.gif" alt="Ordenar de A a Z" align="right" border="0" /></a><strong>Usu&aacute;rio</font></strong></td>
		<td colspan="4" align="center"><strong>A&ccedil;&atilde;o</font></strong></td>
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
		<td align="center"><font color="#333333" size="2" face="Trebuchet MS"><?php print $rs_dados['nome'] ; ?></font></td>
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
	// Pagina��o
	print fun_paginacao ( $var_pagina , $var_totalpaginas , 'txt_col' , 2 , $var_itens , $var_ordem , $var_busca ) ;
?>
		</td>
	</tr>
</table>
</form>
<?php
//*** Inclus�es:
	// Rodap� da aplica��o
	require ( $include['footer'] ) ;
?>