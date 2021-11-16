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
	$default['filtro']		= 'assunto' ;
	// Nome do campo ordenado para visualização
	$default['ordem']		= 'id DESC' ;
    // verifica se a busca foi alterada
    if ( trim ( str_replace ( "'" , "" , $_REQUEST['seleciona_busca'] )) != '' )
    {
        $default['busca'] = trim ( str_replace ( "'" , "" , $_REQUEST['seleciona_busca'] )) ;
    }
    else
    {
    	// Nome do campo de busca dentro da tabela/db
    	$default['busca']		= 'assunto' ;
    }
	// Título do documento
	$default['titulo']		= 'Mat&eacute;rias' ;
	// Quantidade singular de registros cadastrados por extenso
	$default['registro']	= 'mat&eacute;ria est&aacute; cadastrada no sistema.' ;
	// Quantidade plural de registros cadastrados por extenso
	$default['campos']		= 'mat&eacute;rias est&atilde;o cadastradas no sistema.' ;
	// Condição de igualdade para conexão com banco de dados
	$rs_teste   = '' ; //' WHERE id="'. $var_id .'"' ;
	// Outros particulares
	$default['_campo2']		= 'descricao' ;
	$default['_titcampo2']	= 'Descri&ccedil;&atilde;o' ;

//*** Inclusões:
	// Template: Validação de variáveis
	require ( $template['valvars'] ) ;
//*** Conexão com o banco de dados - Dados de paginação
	// Seleção de registros da tabela
	$rs_sql = "SELECT 
				tblettera.assunto, tblettera.datacadastro, tblettera.id as idmateria, ".
			  	"tbletterasecoes.id, tblettera.status, tbletterasecoes.secao
			  FROM
			  	tbletterasecoes
			  INNER JOIN
			  	tblettera 
			  ON 
			  	tbletterasecoes.id = tblettera.idsecao
				where idsecao !='3'" ;
	// Filtragem de busca
	if ( $var_busca != '' )
	{
  		$rs_busca = ' WHERE ' . $default['busca'] . ' LIKE "%' . $var_busca . '%"' ;
	}
	// Atribuição do comando
	$rs_sql    .= $rs_teste . $rs_busca ;
	// Execução do comando
	$rs_query   = mysql_query ( $rs_sql , $conexao['conexao'] ) ;
	// Número de registros encontrados
	$rs_linhas  = mysql_num_rows ( $rs_query ) ;
	// Grava o número de registros encontrados
	$var_registro = $rs_linhas ;
	// Grava o número de páginas por itens
	$var_totalpaginas = ceil ( $rs_linhas / $var_itens ) ;
	// Verifica o número da página
	if (( $var_pagina == '' ) or ( intval ( $var_pagina ) < 1 ))
	{
	  	// Reseta o número da página
		$var_pagina = 1 ;
		// Reseta o marcador de registro
		$num_inicio = 0 ;
	}
	else
	{
		if ( intval ( $var_pagina ) > $rs_linhas )
		{
		  	// Seta a página como a última
			$var_pagina = $rs_linhas ;
			// Seta o marcador de registros para os últimos n itens
			$num_inicio = ( $var_pagina - 1 )* $var_itens ;
		}
		else
		{
		  	// Seta o marcador de registro para os itens da página atual
			$num_inicio = ( $var_pagina - 1 )* $var_itens ;
		}
	}

//*** Conexão com o banco de dados - Dados para impressão
	// Seleção de registros da tabela
	$rs_sql = "SELECT tblettera.assunto, tblettera.datacadastro, tblettera.id as idmateria, ".
			  "tbletterasecoes.id, tblettera.status, tbletterasecoes.secao FROM tbletterasecoes INNER JOIN ".
			  "tblettera ON tbletterasecoes.id = tblettera.idsecao where idsecao !='3'" ;
	// Filtragem de busca
	if ( $var_busca != '' )
	{
  		$rs_busca = ' WHERE ' . $default['busca'] . ' LIKE "%' . $var_busca . '%"' ;
	}
	// Ordenação de dados
	if ( $var_ordem != '' )
	{
		$rs_ordem = ' ORDER BY '. $var_ordem ;
	}
	// Limite de dados na tela
	$rs_maximo  = ' LIMIT '. $num_inicio .', '. $var_itens ;
	// Atribuição do comando
	$rs_sql    .= $rs_teste . $rs_busca . $rs_ordem . $rs_maximo ;
	// Execução do comando

	$rs_query   = mysql_query ( $rs_sql , $conexao['conexao'] ) ;
	// Número de registros encontrados
	$rs_linhas  = mysql_num_rows ( $rs_query ) ;

	// Template: Cabeçalho do HTML
	require ( $template['headers'] ) ;
?>
	<script language="JavaScript" type="text/javascript">
	//Validação do Formulário
	function fVerificaForm(form,evento){
		if (form.busca.value==""){
			alert("Atenção!\nO campo BUSCA deve ser preenchido.");
			form.busca.focus();
			return false;}
	}
	//Validação de Exclusão
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
//*** Inclusões:
	// Menu da aplicação
	require ( $include['menu'] ) ;
?>
<form action="index.php" name="formItens" id="formItens">
<table width="760" border="0" align="center" cellpadding="3" cellspacing="1" bgcolor="#CCCCCC">
	<tr>
		<th colspan="10">Cadastro de <?php print $default['titulo'] ; ?></th>
	</tr>
  <tr bgcolor="#EBEBEB">
      <td align="center">
      	<input type="hidden" name="pagina" id="pagina" value="<?php print $var_pagina ; ?>" />
      	<input type="hidden" name="ordem" id="ordem" value="<?php print $var_ordem ; ?>" />
	  	<input type="text" name="itens" id="itens" value="<?php print $var_itens ; ?>" size="2" maxlength="2" style="font: xx-small Trebuchet MS;" />
      	<input style="border: 0px;" type="image" src="<?php print $folders['icones'] ; ?>ico_seta.gif" alt="Itens" />
	  </td>
      <td colspan="3" align="center" bgcolor="#EBEBEB"><a href="index.php"><img src="<?php print $folders['icones'] ; ?>ico_lista.gif" alt="Listar todos os registros" title="Listar todos os registros" hspace="5" border="0" align="right" /></a>
        <input style="border: 0px;" type="image" src="<?php print $folders['icones'] ; ?>ico_buscar.gif" alt="Buscar" title="Buscar" align="right" />
        Buscar: <input name="busca" type="text" id="busca" value="<?php print $var_busca ; ?>" size="24" maxlength="24" />
			<select name="seleciona_busca">
				<option value="manchete" <?php ( $default['busca'] == 'tblettera.assunto' ) ? print 'selected="selected"' : false ; ?>>Assunto</option>
				<option value="secao" <?php ( $default['busca'] == 'secao' ) ? print 'selected="selected"' : false ; ?>>Se&ccedil;&atilde;o</option>
				<option value="tblettera.id" <?php ( $default['busca'] == 'tblettera.id' ) ? print 'selected="selected"' : false ; ?>>Código</option>
			</select>
      </td>
    	<td colspan="6" align="center">
			<a href="formcadastro.php?acao=I&amp;pagina=<?php print $var_pagina ; ?>&amp;ordem=<?php print str_replace ( " ", "%20", $var_ordem ) ; ?>&amp;busca=<?php print $var_busca ; ?>&amp;itens=<?php print $var_itens ; ?>">Nova Mat&eacute;ria</a>
		</td>
	</tr>
    <tr bgcolor="#F7F7F7">
		<td width="80" align="center"><a href="?pagina=<?php print $var_pagina ; ?>&amp;ordem=id%20desc&amp;busca=<?php print $var_busca ; ?>&amp;itens=<?php print $var_itens ; ?>"><img src="<?php print $folders['icones'] ; ?>ico_ordem_decres.gif" alt="Ordenar de Z a A" border="0" align="right" /></a><a href="?pagina=<?php print $var_pagina ; ?>&amp;ordem=id&amp;busca=<?php print $var_busca ; ?>&amp;itens=<?php print $var_itens ; ?>"><img src="<?php print $folders['icones'] ; ?>ico_ordem_cres.gif" alt="Ordenar de A a Z" align="right" border="0" /></a><strong>C&oacute;digo</strong></td>
		<td width="80" align="center" bgcolor="#F7F7F7"><a href="?pagina=<?php print $var_pagina ; ?>&amp;ordem=secao%20desc&amp;busca=<?php print $var_busca ; ?>&amp;itens=<?php print $var_itens ; ?>"><img src="<?php print $folders['icones'] ; ?>ico_ordem_decres.gif" alt="Ordenar de Z a A" border="0" align="right" /></a><a href="?pagina=<?php print $var_pagina ; ?>&amp;ordem=secao&amp;busca=<?php print $var_busca ; ?>&amp;itens=<?php print $var_itens ; ?>"><img src="<?php print $folders['icones'] ; ?>ico_ordem_cres.gif" alt="Ordenar de A a Z" align="right" border="0" /></a><strong>Seção</strong></td>
		
      <td align="center" bgcolor="#F7F7F7"><a href="?pagina=<?php print $var_pagina ; ?>&amp;ordem=assunto%20desc&amp;busca=<?php print $var_busca ; ?>&amp;itens=<?php print $var_itens ; ?>"><img src="<?php print $folders['icones'] ; ?>ico_ordem_decres.gif" alt="Ordenar de Z a A" border="0" align="right" /></a><a href="?pagina=<?php print $var_pagina ; ?>&amp;ordem=assunto&amp;busca=<?php print $var_busca ; ?>&amp;itens=<?php print $var_itens ; ?>"><img src="<?php print $folders['icones'] ; ?>ico_ordem_cres.gif" alt="Ordenar de A a Z" align="right" border="0" /></a><strong>Assunto</strong></td>
		<td width="140" align="center" bgcolor="#F7F7F7"><a href="?pagina=<?php print $var_pagina ; ?>&amp;ordem=datacadastro%20desc&amp;busca=<?php print $var_busca ; ?>&amp;itens=<?php print $var_itens ; ?>"><img src="<?php print $folders['icones'] ; ?>ico_ordem_decres.gif" alt="Ordenar de Z a A" border="0" align="right" /></a><a href="?pagina=<?php print $var_pagina ; ?>&amp;ordem=datacadastro&amp;busca=<?php print $var_busca ; ?>&amp;itens=<?php print $var_itens ; ?>"><img src="<?php print $folders['icones'] ; ?>ico_ordem_cres.gif" alt="Ordenar de A a Z" align="right" border="0" /></a><strong>Data Cadastro</strong></td>
		<td colspan="4" align="center"><strong>A&ccedil;&atilde;o</strong></td>
    </tr>
<?php
//*** Listing registers
	if ( $rs_linhas > 0 )
	{
		for ( $cont_i = 0 ; $cont_i < $rs_linhas ; $cont_i ++ )
		{

//*** Covers the table registers with the array
			$rs_dados = mysql_fetch_array ( $rs_query ) ;
                        $var_datacadastro = fun_tratamento_data ( $rs_dados['datacadastro'] , 'L' ) ;

//*** Verify if was actived
			if ( trim ( strtoupper ( $rs_dados['status'] )) == "A" )
			{
				$var_status = $folders['icones'] ."ico_ativo_on.gif" ;
				$var_texto_status = 'Ativo' ;
			}
			else
			{
				$var_status = $folders['icones'] ."ico_ativo_off.gif" ;
				$var_texto_status = 'Inativo' ;
			}
?>
    <tr bgcolor="#FFFFFF" onMouseOver="this.bgColor='#ededed';" onMouseOut="this.bgColor='#ffffff';">
		<td align="center"><?php print $rs_dados['idmateria'] ; ?></td>
		<td align="center"><?php print $rs_dados['secao'] ; ?></td>
		<td align="center"><?php print $rs_dados['assunto'] ; ?></td>
		<td align="center"><?php print $var_datacadastro ; ?></td>
		<td width="20" align="center"><a href="mudastatus.php?id=<?php print $rs_dados['idmateria'] ; ?>&amp;status=<?php print $rs_dados['status'] ; ?>&acao=A"><img src="<?php print $var_status ; ?>" alt="<?php print $var_texto_status ; ?>" title="<?php print $var_texto_status ; ?>" border="0" /></a></td>
		<td width="20" align="center"><a href="formcadastro.php?pagina=<?php print $var_pagina ; ?>&amp;id=<?php print $rs_dados['idmateria'] ; ?>&amp;acao=A&amp;ordem=<?php print str_replace ( " ", "%20", $var_ordem ) ; ?>&amp;busca=<?php print $var_busca ; ?>&amp;itens=<?php print $var_itens ; ?>"><img src="<?php print $folders['icones'] ; ?>ico_alterar.gif" alt="Alterar" border="0" title="Alterar" /></a></td>
	    <td width="20" align="center"><a href="javascript:jValidaExclusao('processacadastro.php?id=<?php print $rs_dados['idmateria'] ; ?>&amp;pagina=<?php print $var_pagina ; ?>&amp;acao=E&amp;ordem=<?php print str_replace ( " ", "%20", $var_ordem ) ; ?>&amp;busca=<?php print $var_busca ; ?>&amp;itens=<?php print $var_itens ; ?>');"><img src="<?php print $folders['icones'] ; ?>ico_excluir.gif" alt="Excluir" title="Excluir" border="0" /></a></td>
		<td width="20" align="center"><a href="formcadastro.php?pagina=<?php print $var_pagina ; ?>&amp;id=<?php print $rs_dados['idmateria'] ; ?>&amp;acao=C&amp;ordem=<?php print str_replace ( " ", "%20", $var_ordem ) ; ?>&amp;busca=<?php print $var_busca ; ?>&amp;itens=<?php print $var_itens ; ?>"><img src="<?php print $folders['icones'] ; ?>ico_consultar.gif" alt="Consultar" title="Consultar" border="0" /></a></td>
    </tr>
<?php
		}
	}
?>
	<tr align="left" bgcolor="#F7F7F7">
		<td colspan="10">
			<font size="2" face="Trebuchet MS"><strong><?php print $var_registro ; ?></strong>&nbsp;<?php $var_registro > 1 ? print $default['campos'] : print $default['registro'] ; ?></font>
		</td>
	</tr>
	<tr align="left" bgcolor="#FFFFFF">
		<td colspan="10" align=right>
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